<template>
	<div class="m-l-50 m-t-30 w-500">
		<el-form ref="form" :model="form" :rules="rules" label-width="110px">
			<el-form-item label="标题" prop="title">
				<el-input v-model.trim="form.title" class="h-40 w-200"></el-input>
			</el-form-item>
			<el-form-item label="绑定权限标识" prop="rule_name">
				<el-input v-model.trim="form.rule_name" class="h-40 fl w-200" :disabled="true"></el-input>
				<el-button class="fl m-l-30" @click="dialogVisible = true">查找</el-button>
			</el-form-item>
			<el-form-item label="菜单类型" prop="menu_type">
				<el-radio-group v-model="form.menu_type">
					<el-radio disabled label="1">普通三级菜单</el-radio>
					<el-radio disabled label="2">单页菜单</el-radio>
					<el-radio disabled label="3">外链</el-radio>
				</el-radio-group>
			</el-form-item>
			<el-form-item label="上级菜单" prop="pid">
				<el-select disabled v-model="form.pid" placeholder="请选择活动区域" class="w-200">
					<el-option v-for="item in options" :label="item.title" :value="item.id"></el-option>
				</el-select>
			</el-form-item>
			<el-form-item label="路径">
				<el-input v-model.trim="form.url" class="h-40 w-200"></el-input>
			</el-form-item>
			<el-form-item label="模块" prop="module">
				<el-input v-model.trim="form.module" class="h-40 w-200"></el-input>
			</el-form-item>
			<el-form-item label="所属菜单">
				<el-input v-model.trim="form.menu" class="h-40 w-200"></el-input>
			</el-form-item>
			<el-form-item label="排序">
				<el-input v-model="form.sort" class="h-40 w-200"></el-input>
			</el-form-item>
			<el-form-item>
				<el-button type="primary" @click="edit('form')" :loading="isLoading">提交</el-button>
				<el-button @click="goback()">返回</el-button>
			</el-form-item>
		</el-form>

    <!-- <el-dialog title="提示" v-model="dialogVisible" size="tiny">
      <span>这是一段信息</span>
      <span slot="footer" class="dialog-footer">
        <el-button @click="dialogVisible = false">取 消</el-button>
        <el-button type="primary" @click="dialogVisible = false">确 定</el-button>
      </span>
    </el-dialog> -->
    
    <el-dialog  :visible.sync="dialogVisible"  custom-class="w-900 h-480 ovf-auto" title="节点列表">
      <div class="pos-rel h-60">
        <el-input placeholder="请输入内容" v-model="keyword" class="search-btn w-300">
          <el-button slot="append" icon="el-icon-search" @click="searchMsg()"></el-button>
        </el-input>
      </div>
      <div>
       <el-table
        :data="tableData"
        stripe
        style="width: 100%">
          <!-- <el-table-column
          prop="else"
          label="类型"
          >
          </el-table-column> -->
          <el-table-column
          prop="title"
          align="center"
          label="规则名称">
          </el-table-column>
          <el-table-column
          prop="name"
          align="center"
          label="规则标识"
         >
          </el-table-column>
          <el-table-column
          label="操作"
          align="center"
          >
          <template scope="scope">
            <div>
              <el-button size="small" @click="selectRule(scope.row)">选择</el-button>
            </div>
          </template>
          </el-table-column>
        </el-table>
      </div>
    </el-dialog>


		<!-- <ruleList v-model="dialogVisible" ref="ruleList"></ruleList> -->
	</div>
</template>

<script>
  import ruleList from './rule.vue'
  import http from '../../../../assets/js/http'
  import fomrMixin from '../../../../assets/js/form_com'

  export default {
    data() {
      return {
        keyword: '',
        load: false,
        tableData: [],
        dialogVisible: false,
        loading: false,
        id: null,
        form: {
          title: '',
          rule_name: '',
          rule_id: null,
          pid: '',
          menu_type: '',
          url: '',
          module: '',
          menu: '',
          sort: ''
        },
        options: [{ id: 0, title: '无' }],
        rules: {
          title: [
            { required: true, message: '请输入菜单标题' }
          ],
          rule_name: [
            { required: true, message: '请绑定权限标识' }
          ],
          menu_type: [
            { required: true, message: '请选择菜单类型' }
          ],
          module: [
            { required: true, message: '请填写菜单模块' }
          ],
          pid: [
            { type: 'number', required: true, message: '请选择上级菜单' }
          ]
        }
      }
    },
    methods: {
      edit(form) {
        this.$refs.form.validate((pass) => {
          if (pass) {
            this.isLoading = !this.isLoading
            this.apiPut('admin/menus/', this.id, this.form).then((res) => {
              this.handelResponse(res, (data) => {
                _g.toastMsg('success', '编辑成功')
                setTimeout(() => {
                  this.goback()
                }, 1500)
              }, () => {
                this.isLoading = !this.isLoading
              })
            })
          }
        })
      },
      openRule() {
        this.$refs.ruleList.open()
      },
      goback() {
        router.go(-1)
      },
      getMenus() {
        this.apiGet('admin/menus').then((res) => {
          this.handelResponse(res, (data) => {
            let array = []
            _(data).forEach((res) => {
              if (res.level != 3 && res.menu_type == 1) {
                array.push(res)
              }
            })
            this.options = this.options.concat(array)
          })
        })
      },
      selectRule(item) {
        this.form.rule_name = item.else
        this.form.rule_id = item.id
        setTimeout(() => {
          this.dialogVisible = false
        }, 10)
      },
      getRules() {
        this.apiGet('admin/rules').then((res) => {
          this.handelResponse(res, (data) => {
            this.tableDataShow = _(data).forEach((ret) => {
              ret.showInput = false
            })
            this.tableData = this.tableDataShow
          })
        })
      }
    },
    created() {
      this.getMenus()
      this.id = this.$route.params.id
      this.apiGet('admin/menus/' + this.id).then((res) => {
        this.handelResponse(res, (data) => {
          data.menu_type = data.menu_type.toString()
          this.form = data
        })
      })
      let data = store.state.rules
      if (data && data.length) {
        this.tableDataShow = _(data).forEach((res) => {
          res.showInput = false
        })
        this.tableData = this.tableDataShow
      } else {
        this.getRules()
      }
    },
    components: {
      ruleList
    },
    mixins: [http, fomrMixin]
  }
</script>