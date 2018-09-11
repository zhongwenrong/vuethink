<template>
	<div>
		<div class="m-b-20 ovf-hd">
      <p style='font-size: 20px;margin: 0;margin-bottom: 15px;'>系统账号</p>
			<div class="fr">
				<router-link class="btn-link-large add-btn" to="add">
					<i class="el-icon-plus"></i>&nbsp;&nbsp;添加账号
				</router-link>
			</div>
			<div class="fl">
				<el-input class="w-240" placeholder="请输入登录名" v-model="keywords"></el-input>
			</div>
			<!-- <div class="fl m-l-30">
          <el-date-picker
            class="w-200"
            v-model="value"
            type="date"
            placeholder="选择添加时间">
          </el-date-picker>
			</div> -->
      <el-button class="fl m-l-30" :loading="load" slot="append" icon="el-icon-search" @click="search()">搜索</el-button>
		</div>
		<el-table
		:data="tableData"
		style="width: 100%"
    stripe
    border
    class="hset"
    @selection-change="selectItem"
	  >
    <el-table-column
			type="selection"
      align="center"
			width="50">
			</el-table-column>
    	<el-table-column
      align="center"
			prop="id"
			label="序号">
			</el-table-column>
      <el-table-column
      align="center"
			prop="realname"
			label="姓名">
			</el-table-column>
      <el-table-column
      align="center"
			prop="username"
			label="登录名">
			</el-table-column>
      <el-table-column
      align="center"
			prop="phone"
			label="手机">
			</el-table-column>

      <el-table-column
      align="center"
			label="状态">
      <template scope="scope">
        <div>{{scope.row.status | status}}</div>
      </template>
			</el-table-column>

      <el-table-column
      align="center"
			prop="create_time"
			label="添加时间">
			</el-table-column>

			<el-table-column
      align="center"
			label="操作"
			>
        <template scope="scope">
          <div>
            <el-dropdown trigger="click" type="mini">
              <el-button type="primary" size="mini">
                操作<i class="el-icon-arrow-down el-icon--right"></i>
              </el-button>
              <el-dropdown-menu slot="dropdown">
                <!-- <el-dropdown-item style="text-align:center;" @click.native="lookmore(scope.row.id)">查看</el-dropdown-item> -->
                <el-dropdown-item style="text-align:center;"  @click.native="tranfData(scope.row)">编辑</el-dropdown-item>
                <el-dropdown-item style="text-align:center;" @click.native="resetPassword(scope.row.id)">重置密码</el-dropdown-item>
              </el-dropdown-menu>
            </el-dropdown>
          </div>
        </template>
			</el-table-column>
		</el-table>
		<div class="pos-rel p-t-20">
      <btnGroup :selectedData="multipleSelection" :type="'users'"></btnGroup>
			<div class="block pages">
				<el-pagination
				@current-change="handleCurrentChange"
				layout="prev, pager, next"
				:page-size="limit"
				:current-page="currentPage"
				:total="dataCount">
				</el-pagination>
			</div>
		</div>

    <el-dialog
      title="编辑账号"
      :visible.sync="dialogVisible"
      width="20%"
      class="bianji"
      >
      <div style="text-align:center;">
        <el-form :model="xiugai" ref="xiugai" label-width="100px" class="demo-ruleForm">
          <el-form-item label="登录名"  >
            <el-input class="w-200" type="text" v-model="xiugai.username" placeholder="请输入登录名"></el-input>
          </el-form-item>
          <el-form-item label="真实姓名">
            <el-input class="w-200" type="text" v-model="xiugai.realname" placeholder="请输入真实姓名"></el-input>
          </el-form-item>
          <el-form-item label="手机号"  prop="phone" :rules="[{ type: 'number', message: '手机号必须为数字值'}]">
            <el-input class="w-200" type="phone" v-model.number="xiugai.phone" placeholder="请输入手机号"></el-input>
          </el-form-item>
         
        </el-form>
      </div>
      <span slot="footer" class="dialog-footer">
        <el-button @click="dialogVisible = false">取 消</el-button>
        <el-button type="primary" @click="edituser">确 定</el-button>
      </span>
    </el-dialog>

	</div>
</template>

<script>
  import http from '../../../../assets/js/http'
  import btnGroup from '../../../Common/btn-group.vue'

  export default {
    data() {
      return {
        load:false,
        value:null,
        xiugai:{
          uid:'',
          username:'',
          realname:'',
          phone:'',
          structure_id:'',
        },
        dialogVisible:false,
        tableData: [],
        dataCount: 0,
        currentPage: 1,
        keywords: '',
        limit: 15,
        multipleSelection:[],
      }
    },
    components:{
        btnGroup
    },
    methods: {
      tranfData(item){
        this.xiugai.username = item.username
        this.xiugai.realname = item.realname
        this.xiugai.phone = item.phone
        this.xiugai.uid = item.id
        this.dialogVisible = true
      },
      // 编辑提交
      edituser(){
        this.apiPost('admin/Users/edit', this.xiugai).then((res) => {
          this.handelResponse(res, (data) => {
            _g.toastMsg('success', res.data)
            this.getAllUsers()
            this.dialogVisible = false
          })
        })
      },
      // 重置密码
      resetPassword(id){
        const data = {
         uid:id
        }
        this.apiPost('admin/users/resetPassword', data).then((res) => {
          this.handelResponse(res, (data) => {
            _g.toastMsg('success', res.data)
          })
        })
      },
      //多值选择
      selectItem(val) {
        this.multipleSelection = val
      },
      // 查看
      lookmore(id) {
        this.$router.push({name: 'usersEditgroup', params: { id: id}})
      },
      // 点击查询
      search() {
        this.load = true
        this.currentPage = 1
        this.getAllUsers()
      },
      // 分页
      handleCurrentChange(page) {
        this.currentPage = page
        this.getAllUsers()
      },
      // 数据获取
      getAllUsers() {
        this.loading = true
        const data = {
          params: {
            keywords: this.keywords,
            page: this.currentPage,
            limit: this.limit
          }
        }
        this.apiGet('admin/users/getPlatformUserList', data).then((res) => {
           if(res.code == 200){
            this.load = false
          }else{
            this.load = false
          }
          this.handelResponse(res, (data) => {
            this.tableData = data.list
            this.dataCount = data.dataCount
          })
        })
      },
      init() {
        this.getAllUsers()
      }
    },
    created() {
      this.init()
    },
    watch: {
      '$route' (to, from) {
        this.init()
      }
    },
    mixins: [http]
  }
</script>

<style>
  .bianji .el-dialog__body{padding: 15px 20px;}
  .bianji .el-dialog__footer{padding: 0px 20px 15px;}
</style>
