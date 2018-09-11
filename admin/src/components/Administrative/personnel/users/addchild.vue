<template>
	<div class="m-l-50 m-t-30 w-500">
      <el-form ref="form" :model="form" :rules="rules" label-width="130px">
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
              <el-input v-model.number="form.phone" class="h-40 w-200"></el-input>
            </el-form-item>
            <el-form-item label="备注">
              <el-input v-model.trim="form.remark" class="h-40 w-200"></el-input>
            </el-form-item>

            <div style="text-align:center;">
              <el-button type="primary" @click="add(form)" :loading="isLoading">提交</el-button>
              <el-button @click="goback()">返回</el-button>
            </div>
		    </el-form>
	</div>
</template>
<script>
  import http from '../../../../assets/js/http'
  import fomrMixin from '../../../../assets/js/form_com'

  export default {
    data() {
      var validatePass = (rule, value, callback) => {
        let  reg = /^[a-zA-Z0-9_-]{4,16}$/
        if (!reg.test(value)) {
          callback(new Error('请输入数字或英文字母组成的密码！'));
        } else{
          callback()
        }
      };
      return {
        isLoading:false,
        form:{	
          username:'',			
          password:'',			
          remark:'',	
          realname:'',	
          phone:'',	
          structure_id: null	
        },
        rules: {
          realname: [
            { required: true, message: '请输入真实姓名' }
          ],
          username: [
            { required: true, message: '请输入用户名' }
          ],
          password: [
            { required: true, message: '请输入用户密码' },
            { min: 6, message: '请输入用户密码至少6个字符', trigger: 'blur' },
            { validator: validatePass, trigger: 'blur' }
          ],
          phone: [
            { required: true, message: '请选输入手机号' },
            { type: 'number', message: '手机号必须为数字'}
          ],
        }
      }
    },
    methods: {
      add(form) {
        this.$refs.form.validate((pass) => {
          if (pass) {
            this.isLoading = !this.isLoading
            this.apiPost('admin/Users', this.form).then((res) => {
              if(res.code!=200){
                this.isLoading = !this.isLoading
              }
              this.handelResponse(res, (data) => {
                _g.toastMsg('success', '添加成功')
                setTimeout(() => {
                  this.goback()
                }, 1500)
              })
            })
          }
        })
      }
    },
    created() {
      _g.closeGlobalLoading()
      this.form.structure_id = this.$route.params.id
    },
    mixins: [http,fomrMixin]
  }
</script>