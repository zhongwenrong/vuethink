<template>
  <div style="min-width:1500px;min-height:600px;">
    <!-- 容器 -->
    <el-container>
      <!-- 左侧 -->
      <el-aside width="300px">
        <div class="leftdiv">
          <span> 账号管理</span>
          <el-dropdown trigger="click" class="fr m-r-10" style="cursor: pointer;">
            <span class="el-dropdown-link">
              <i class="el-icon-more"></i>
            </span>
            <el-dropdown-menu slot="dropdown">
              <el-dropdown-item @click.native="dialogVisible = true">创建组别</el-dropdown-item>
            </el-dropdown-menu>
          </el-dropdown>
        </div>
        <el-input class="w-240 m-l-20" v-model.trim="keywords" placeholder="搜索组别">
          <el-button slot="append"  icon="el-icon-search" @click="searchGroup"></el-button>
        </el-input>
        <div class="m-t-30">
          <!-- 组别 -->
          <div v-for="(item,index) in group" class="items">
            <div class="errorbgset" :class="{bgset:index == actived}" @click="showchild(item.id,index)">
                <i class="el-icon-document" style="color:#16B89F;margin-right:10px;"></i> {{item.remark}}
                <!-- 下拉菜单 -->
                <el-dropdown trigger="click" class="fr m-r-10" style="cursor: pointer;">
                  <span class="el-dropdown-link">
                    <i class="fr el-icon-edit"></i>
                  </span>
                  <el-dropdown-menu slot="dropdown">
                    <el-dropdown-item @click.native="usegroup(item.id)">启用</el-dropdown-item>
                    <el-dropdown-item @click.native="limitgroup(item.id)">禁用</el-dropdown-item>
                  </el-dropdown-menu>
                </el-dropdown>
            </div>
          </div>
        </div>
      </el-aside>
      
      <!-- 右侧 -->
      <el-main>
        <div>
          <div class="m-b-10 ovf-hd">
          <p class="fl" style='font-size: 20px;margin: 0;margin-bottom: 15px;'>账号列表</p>
          <div class="fr" v-show="showadd">
            <router-link class="btn-link-large add-btn" :to="{ name: 'usersAddchild2', params: { id: pid ,structure_id: id}}">
              <i class="el-icon-plus"></i>&nbsp;&nbsp;添加账号
            </router-link>
          </div>
        </div> 
        <!-- 组员账户 -->
        <!-- <p class="fl" style='font-size: 20px;margin: 0;margin-bottom: 15px;margin-top:30px;width:100%;'>组员账号</p> -->
        <el-input class="w-240 m-b-20" v-model.trim="keywords2" placeholder="姓名/手机/登录名">
          <el-button slot="append"  icon="el-icon-search" @click="searchUsers"></el-button>
        </el-input>
        <el-table
        :data="tableData"
        style="width: 100%"
        stripe
        border
        height='500px'
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
          prop="phone"
          label="手机">
          </el-table-column>
          <el-table-column
          align="center"
          prop="username"
          label="登录名">
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
          prop="post_name"
          label="职位">
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
                    <el-dropdown-item style="text-align:center;" @click.native="tranfData(scope.row)">编辑</el-dropdown-item>
                    <el-dropdown-item style="text-align:center;" @click.native="resetPassword(scope.row.id)">重置密码</el-dropdown-item>
                  </el-dropdown-menu>
                </el-dropdown>
              </div>
            </template>
          </el-table-column>
        </el-table>
        <div class="pos-rel p-t-20" >
          <btnGroup v-show="showadd" :selectedData="multipleSelection" :type="'users'" :group="group" @chang-page="showchange"></btnGroup>
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
        </div>
      </el-main>
    </el-container>
    <!-- 创建组别弹窗 -->
    <el-dialog
      title="创建组别"
      :visible.sync="dialogVisible"
      width="20%"
      class="bianji"
      >
      <div style="text-align:center;">
        <el-form ref="form" :model="form" :rules="rules" label-width="130px">
          <el-form-item label="组名" prop="remark">
            <el-input v-model.trim="form.remark" class="h-40 w-200"></el-input>
          </el-form-item>
          <el-form-item label="用户名" prop="username">
            <el-input v-model.trim="form.username" class="h-40 w-200" :maxlength="12"></el-input>
          </el-form-item>
          <el-form-item label="密码" prop="password">
            <el-input v-model.trim="form.password" class="h-40 w-200"></el-input>
          </el-form-item>
          <el-form-item label="真实姓名" prop="realname">
            <el-input v-model.trim="form.realname" class="h-40 w-200"></el-input>
          </el-form-item>
          <el-form-item label="手机号" prop="phone">
            <el-input v-model.trim="form.phone" class="h-40 w-200"></el-input>
          </el-form-item>
          
        </el-form>
      </div>
      <span slot="footer" class="dialog-footer">
        <el-button @click="dialogVisible = false">取 消</el-button>
        <el-button type="primary" @click="createGroup(form)">确 定</el-button>
      </span>
    </el-dialog>

    <el-dialog
      title="编辑账号"
      :visible.sync="dialogVisible2"
      width="20%"
      class="bianji"
      >
      <div style="text-align:center;">
        <el-form :model="xiugai" ref="xiugai" label-width="100px" class="demo-ruleForm">
          <el-form-item label="登录名"  >
            <el-input class="w-200" type="text" v-model="xiugai.username" placeholder="请输入登录名"></el-input>
          </el-form-item>
          <el-form-item label="真实姓名"  >
            <el-input class="w-200" type="text" v-model="xiugai.realname" placeholder="请输入真实姓名"></el-input>
          </el-form-item>
          <el-form-item label="手机号"  prop="phone" :rules="[{ type: 'number', message: '手机号必须为数字值'}]">
            <el-input class="w-200" type="phone" v-model.number="xiugai.phone" placeholder="请输入手机号"></el-input>
          </el-form-item>
         
        </el-form>
      </div>
      <span slot="footer" class="dialog-footer">
        <el-button @click="dialogVisible2 = false">取 消</el-button>
        <el-button type="primary" @click="edituser">确 定</el-button>
      </span>
    </el-dialog>

    
  </div>
</template>
<script>
  import http from '../../../../assets/js/http'
  import btnGroup from '../../../Common/btn-movement-group.vue'

  export default {
    data() {
      return { 
        multipleSelection:[],
        dialogVisible:false,
        xiugai:{
          uid:'',
          username:'',
          realname:'',
          phone:''
        },
        dialogVisible2:false,
        id:null,
        showadd:false,
        group:[],
        load:false,
        tableData: [],
        dataCount: 0,
        currentPage: 1,
        keywords: '',
        keywords2: '',
        limit: 15,
        pid:null,
        actived: '',
        form:{
          username:'',      
          password:'',      
          remark:'',  
          realname:'',  
          phone:'',
          structure_id:null   
        },
        rules: {
          remark: [
            { required: true, message: '请输入组名' }
          ],
          realname: [
            { required: true, message: '请输入真实姓名' }
          ],
          password: [
            { required: true, message: '请输入密码' }
          ],
          username: [
            { required: true, message: '请输入用户名' }
          ],
          phone: [
            { required: true, message: '请选输入手机号' }
          ],
         
        }
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
        this.dialogVisible2 = true
      },
      // 编辑提交
      edituser(){
        this.apiPost('admin/Users/edit', this.xiugai).then((res) => {
          this.handelResponse(res, (data) => {
            _g.toastMsg('success', res.data)
            this.getAllUsers()
            this.dialogVisible2 = false
          })
        })
      },
      showchange(data){
        if(data == 1){
          this.getAllUsers()
        }
      },
      //多值选择
      selectItem(val) {
        this.multipleSelection = val
      },
      // 创建组别
      createGroup(form) {
        this.$refs.form.validate((pass) => {
          if (pass) {
            this.isLoading = !this.isLoading
            this.apiPost('admin/Users', this.form).then((res) => {
              if(res.code==400){
                this.isLoading = !this.isLoading
              }
              this.handelResponse(res, (data) => {
                _g.toastMsg('success', '添加成功')
                setTimeout(() => {
                  this.dialogVisible = false
                }, 1000);
              })
            })
          }
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
      //启用组
      usegroup(id){
        const data = {
          ids:[id],
          status : 1
        }
        this.apiPost('admin/users/enables', data).then((res) => {
          this.handelResponse(res, (data) => {
            _g.toastMsg('success', res.data)
            setTimeout(() => {
             this.getAllUsers()
            }, 1000)
            })
        })
      },
      //禁用组
      limitgroup(id){
        const data = {
          ids:[id],
          status : 0
        }
        this.apiPost('admin/users/enables', data).then((res) => {
          this.handelResponse(res, (data) => {
            _g.toastMsg('success', res.data)
            setTimeout(() => {
              this.getAllUsers()
            },1000)
            })
        })
      },
      // 点击查询
      search() {
        this.load = true
        this.currentPage = 1
        this.getAllGroup()
      },
      // 点击展示子列表
      showchild(id,index){
        this.showadd = true
        this.pid = id
        this.actived = index
        this.getAllUsers()
      },
      // 分页
      handleCurrentChange(page) {
        this.currentPage = page
        this.getAllUsers()
      },
      // 组搜索
      searchGroup(){
        this.showadd = false
        this.tableData = []
        this.groupzuzhang = []
        this.getAllGroup()
      },
      // 组员搜索
      searchUsers(){
        this.currentPage = 1
        this.getAllUsers()
      },
      getAllUsers() {
        const data = {
          params: {
            type:2,
            keywords: this.keywords2,
            page: this.currentPage,
            limit: this.limit,
            structure_id:this.id,
            pid:this.pid
          }
        }
        this.apiGet('admin/Users', data).then((res) => {
          this.handelResponse(res, (data) => {
            this.tableData = data.list
            this.dataCount = data.dataCount
          })
        })
      },
      getAllGroup() {
        const data = {
          params: {
            keywords: this.keywords,
            page: 1,
            limit: this.limit,
            structure_id:this.id,
          }
        }
        this.apiGet('admin/Users', data).then((res) => {
           if(res.code == 200){
            this.load = false
          }else{
            this.load = false
          }
          this.handelResponse(res, (data) => {
            this.group = data.list
           
          })
        })
      }
    },
     watch: {
      '$route' (to, from) {
        this.getAllGroup()
      }
    },
    created() {
      this.id = this.$route.params.id
      this.form.structure_id = this.$route.params.id
      this.getAllGroup()
      setTimeout(() => {
        this.showadd = true
        this.pid = this.group[0].id
        this.getAllUsers()
      }, 1000);
    },
    mixins: [http]
  }
</script>

<style scoped>
  .leftdiv{padding: 20px 20px;}
  .items{padding: 10px 20px;cursor: pointer;}
  .el-aside {
    height: 750px;
    color: #333;
    border-right: 1px solid #cccccc;
  }
  .el-main {
    color: #333;
  }
  .bgset{
    background: #F1F5FC;
  }
  .errorbgset{
    padding: 10px 10px; 
  }
</style>
