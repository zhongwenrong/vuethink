<template>
    <div>
        <el-form :model="form" ref="form" label-position="left" label-width="0px" class="demo-ruleForm card-box loginform">
            <div class="longinDiv">
                <div class="login-title">
                    <img src="../../assets/images/title.png">
                    <p class="titlename">{{systemName}}</p>
                </div>
                <el-form-item prop="username" class="setconfig">
                    <el-input type="text" v-model="form.username" auto-complete="off" autocomplete="off" placeholder="账号"></el-input>
                </el-form-item>
                <el-form-item prop="password" class="setconfig1">
                    <el-input type="password" v-model="form.password" auto-complete="off" autocomplete="off" placeholder="密码"></el-input>
                </el-form-item>
                <el-form-item class="Btnform">
                    <el-button class="longinbtn" :loading="loading" @click.native.prevent="handleSubmit2('form')">登录</el-button>
                </el-form-item>
            </div>
        </el-form>
    </div>
</template>
<script>
import $ from 'jquery'
import http from '../../assets/js/http'
export default {
    data() {
        return {
            title: '',
            systemName: '',
            loading: false,
            form: {
                username: '',
                password: '',
                verifyCode: ''
            },
            requireVerify: false,
            verifyUrl: '',
            verifyImg: window.HOST + '/admin/base/getVerify',
            rules2: {
                username: [
                    { required: true, message: '请输入账号', trigger: 'blur' }
                ],
                password: [
                    { required: true, message: '请输入密码', trigger: 'blur' }
                ],
                verifyCode: [
                    { required: false, message: '请输入验证码', trigger: 'blur' }
                ]
            },
            checked: false
        }
    },
    methods: {
        refreshVerify() {
            this.verifyUrl = ''
            setTimeout(() => {
                this.verifyUrl = this.verifyImg + '?v=' + moment().unix()
            }, 300)
        },
        handleSubmit2(form) {
            if (this.loading) return
            this.$refs.form.validate((valid) => {
                if (valid) {
                    this.loading = !this.loading
                    let data = {}
                    if (this.requireVerify) {
                        data.username = this.form.username
                        data.password = this.form.password
                        data.verifyCode = this.form.verifyCode
                    } else {
                        data.username = this.form.username
                        data.password = this.form.password
                    }
                    if (this.checked) {
                        data.isRemember = 1
                    } else {
                        data.isRemember = 0
                    }
                    this.apiPost('admin/base/login', data).then((res) => {
                        if (res.code != 200) {
                            this.loading = !this.loading
                            this.handleError(res)
                        } else {
                            this.refreshVerify()
                            if (this.checked) {
                                Cookies.set('rememberPwd', true, { expires: 1 })
                            }
                            this.resetCommonData(res.data)
                            _g.toastMsg('success', '登录成功')
                        }
                    })
                } else {
                    return false
                }
            })
        },
        checkIsRememberPwd() {
            if (Cookies.get('rememberPwd')) {
                let data = {
                    rememberKey: Lockr.get('rememberKey')
                }
                this.apiPost('admin/base/relogin', data).then((res) => {
                    this.handelResponse(res, (data) => {
                        this.resetCommonData(data)
                    })
                })
            }
        }
    },
    created() {
        this.checkIsRememberPwd()
        this.apiPost('admin/base/getConfigs').then((res) => {
            this.handelResponse(res, (data) => {
                Lockr.set('contract', data.CONTRACT)
                document.title = data.SYSTEM_NAME
                this.systemName = data.SYSTEM_NAME
                if (parseInt(data.IDENTIFYING_CODE)) {
                    this.requireVerify = true
                    this.rules2.verifyCode[0].required = true
                }
            })
        })
        this.verifyUrl = this.verifyImg
    },
    mounted() {
        $('input').addClass('setinput');
        window.addEventListener('keyup', (e) => {
            if (e.keyCode === 13) {
                this.handleSubmit2('form')
            }
        })
    },
    mixins: [http]
}
</script>
<style scoped>
.card-box {
    border: none !important;
    background: transparent;
    margin-top: 0 !important;
}

.loginform {
    position: absolute;
    z-index: 1000;
    width: 100%;
    top: 20%;
    left: 0;
}

.longinDiv {
    margin: auto;
    width: 300px;
}

.login-title {
    width: 100%;
    height: 150px;
    text-align: center;
}

.login-title img {
    height: 40%;
    margin-top: 20px;
}

.titlename {
    color: white;
    font-size: 23px;
    font-weight: bold;
    padding: 0;
    margin: 0;
    margin-top: 10px;
}

.setconfig,
.setconfig1 {
    height: 45px;
    border: none;
    margin-bottom: 1px;
}

.Btnform {
    width: 100%;
}

.longinbtn {
    margin-top: 20px;
    width: 100%;
    height: 45px;
    color: white;
    background: #16B89F;
    border: none;
}
</style>