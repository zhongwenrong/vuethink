<template>
    <el-row class="panel m-w-1280">
        <el-container class="containerDiv">
            <el-aside width="auto" v-show="!showLeftMenu">
                <div v-show="!showLeftMenu" class="HomeLogo-div" ref="LogoWidth">
                    <img src="../assets/images/hometitle.png" ref="logoimg" class="HomeLogo-img">
                    <transition name="slide-fade">
                        <span v-if="!isCollapse" class="p-l-10 HomeLogo-title">{{title}}</span>
                    </transition>
                </div>
                <leftMenu :isCollapse="isCollapse" :menuData="menuData" :menu="menu" :menus="menus" ref="leftMenu"></leftMenu>
            </el-aside>
            <el-container>
                <el-header height="80px">
                    <div class="fl p-l-15" v-show="!showLeftMenu">
                        <el-button @click="change_isCollapse" :icon="isCollapse ? 'el-icon-rank' : 'el-icon-menu'" class="openmeunbtn"></el-button>
                    </div>
                    <div class="fl p-l-20">
                        <el-breadcrumb separator-class="el-icon-arrow-right" class="mbmenu-div">
                            <div v-for="item in menuData">
                                <template v-if="menuData.length <= 1">
                                    <el-breadcrumb-item>{{item.title}}</el-breadcrumb-item>
                                    <el-breadcrumb-item v-for="m in item.child" v-if="m.url == breadcrumb_url">{{m.title}}</el-breadcrumb-item>
                                </template>
                                <template v-else> 
                                    <el-breadcrumb-item v-for="m in item.child" v-if="m.url == breadcrumb_url">{{m.title}}</el-breadcrumb-item>
                                </template>
                            </div>
                        </el-breadcrumb>
                    </div>
                    <div class="fl">
                        <el-dropdown trigger="click" @command="handleMenu" class="user-menu">
                            <span class="el-dropdown-link c-gra">
                            <span class="p-r-15">{{username}}</span>
                            <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                            <el-dropdown-menu slot="dropdown">
                                <el-dropdown-item command="userplace" v-if="fid==0">个人中心</el-dropdown-item>
                                <el-dropdown-item command="changePwd">修改密码</el-dropdown-item>
                                <el-dropdown-item command="logout">退出</el-dropdown-item>
                            </el-dropdown-menu>
                        </el-dropdown>
                    </div>
                </el-header>
                <el-main>
                    <el-col :span="24" class="homemainbg" :class="{'hide-leftMenu': hasChildMenu}">
                        <transition name="fade" mode="out-in" appear>
                            <router-view v-loading="showLoading"></router-view>
                        </transition>
                    </el-col>
                </el-main>
            </el-container>
        </el-container>

        <!-- 修改密码弹窗 -->
        <el-dialog title="修改密码" :visible.sync="dialogVisible" width="30%" :before-close="handleClose">
            <div class="ovf-auto">
                <el-form ref="form" :model="form" :rules="rules" label-width="80px">
                    <el-form-item label="旧密码" prop="old_pwd">
                        <el-input v-model.trim="form.old_pwd"></el-input>
                    </el-form-item>
                    <el-form-item label="新密码" prop="new_pwd">
                        <el-input v-model.trim="form.new_pwd"></el-input>
                    </el-form-item>
                </el-form>
            </div>
            <div class="p-t-20">
                <el-button type="primary" :disabled="disable" @click="submit()">提交</el-button>
            </div>
        </el-dialog>
    </el-row>
</template>
<script>
import leftMenu from './Common/leftMenu.vue'
import changePwd from './Account/changePwd.vue'
import http from '../assets/js/http'

export default {
    data() {
        return {
            isCollapse: false,
            username: '',
            topMenu: [],
            childMenu: [],
            menuData: [],
            hasChildMenu: false,
            menu: null,
            menus: null,
            module: null,
            img: '',
            title: '',
            logo_type: null,
            dialogVisible: false,
            form: {
                auth_key: '',
                old_pwd: '',
                new_pwd: ''
            },
            fid: '',
            breadcrumb_url: ''
        }
    },
    methods: {
        jumpmessage() {
            router.push('/Index/message/message')
        },
        change_isCollapse() {
            this.isCollapse = !this.isCollapse
            if (this.isCollapse == true) {
                this.$refs.LogoWidth.style.width = `64px`
                this.$refs.logoimg.style.height = `35%`
            } else {
                this.$refs.LogoWidth.style.width = `220px`
                this.$refs.logoimg.style.height = `40%`
            }
        },
        logout() {
            this.$confirm('确认退出吗?', '提示', {
                confirmButtonText: '确定',
                cancelButtonText: '取消'
            }).then(() => {
                _g.openGlobalLoading()
                let data = {
                    authkey: Lockr.get('authKey'),
                    sessionId: Lockr.get('sessionId')
                }
                this.apiPost('admin/base/logout', data).then((res) => {
                    _g.closeGlobalLoading()
                    this.handelResponse(res, (data) => {
                        Lockr.rm('menus')
                        Lockr.rm('authKey')
                        Lockr.rm('rememberKey')
                        Lockr.rm('authList')
                        Lockr.rm('userInfo')
                        Lockr.rm('sessionId')
                        Cookies.remove('rememberPwd')
                        _g.toastMsg('success', '退出成功')
                        setTimeout(() => {
                            router.replace('/')
                        }, 1500)
                    })
                })
            }).catch(() => {

            })
        },
        submit() {
            this.apiPost('admin/base/setInfo', this.form).then((res) => {
                _g.closeGlobalLoading()
                this.handelResponse(res, (data) => {
                    _g.toastMsg('success', '修改成功')
                    Lockr.rm('authKey')
                    Lockr.rm('authList')
                    Lockr.rm('sessionId')
                    setTimeout(() => {
                        this.dialogVisible = false
                    }, 1000)
                })
            })
        },
        switchTopMenu(item) {
            if (!item.child) {
                router.push(item.url)
            } else {
                router.push(item.child[0].child[0].url)
            }
        },
        handleMenu(val) {
            switch (val) {
                case 'logout':
                    this.logout()
                    break
                case 'changePwd':
                    this.dialogVisible = true
                    break
                case 'userplace':
                    router.push('/Index/admin/userplace');
                    break
            }
        },
        getTitleAndLogo() {
            this.apiPost('admin/base/getConfigs').then((res) => {
                this.handelResponse(res, (data) => {
                    Lockr.set('contract', data.CONTRACT)
                    Lockr.set('secondtrial', data.SECONDTRIAL)
                    Lockr.set('organizegroup', data.ORGANIZE_GROUP)
                    document.title = data.SYSTEM_NAME
                    this.logo_type = data.LOGO_TYPE
                    this.title = data.NAME
                    this.img = data.SYSTEM_LOGO
                    localStorage.setItem('fusShow', data.SECONDTRIAL)
                })
            })
        },
        getUsername() {
            this.username = Lockr.get('userInfo').username
        }
    },
    created() {
        this.form.auth_key = Lockr.get('authKey')
        this.getTitleAndLogo()
        let authKey = Lockr.get('authKey')
        let sessionId = Lockr.get('sessionId')
        if (!authKey || !sessionId) {
            _g.toastMsg('warning', '您尚未登录')
            setTimeout(() => {
                router.replace('/')
            }, 1500)
            return
        }
        this.getUsername()
        let menus = Lockr.get('menus')
        // console.log(menus)
        this.menus = Lockr.get('menus')
        this.menu = this.$route.meta.menu
        this.module = this.$route.meta.module
        this.topMenu = menus
        this.breadcrumb_url = this.$route.path
        _(menus).forEach((res) => {
            if (res.module == this.module) {
                this.menuData = res.child
                res.selected = true
            } else {
                res.selected = false
            }
        })
    },
    computed: {
        routerShow() {
            return store.state.routerShow
        },
        showLeftMenu() {
            this.hasChildMenu = store.state.showLeftMenu
            return store.state.showLeftMenu
        }
    },
    components: {
        leftMenu,
        changePwd
    },
    watch: {
        '$route' (to, from) {
            _(this.topMenu).forEach((res) => {
                if (res.module == to.meta.module) {
                    res.selected = true
                    if (!to.meta.hideLeft) {
                        this.menu = to.meta.menu
                        this.menuData = res.child
                        this.breadcrumb_url = to.path
                    }
                } else {
                    res.selected = false
                }
            })
        }
    },
    mounted() {
        this.fid = Lockr.get('userInfo').fid
    },
    mixins: [http]
}
</script>
<style scoped>
.panel {
    position: absolute;
    top: 0px;
    bottom: 0px;
    width: 100%;
    background: white;
}

.containerDiv {
    height: 100%;
}

.HomeLogo-div {
    width: 220px;
    height: 80px;
    line-height: 80px;
    float: left;
    text-align: center;
    background: #1f2e54;
}

.HomeLogo-img {
    width: auto;
    height: 40%;
    padding-top: 24px;
    vertical-align: top;
}

.HomeLogo-title {
    display: inline-block;
    height: 100%;
    vertical-align: top;
    color: white;
    font-weight: bold;
    font-size: 20px;
}

.slide-fade-enter-active {
    transition: all .3s ease;
}

.slide-fade-leave-active {
    transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}

.slide-fade-enter,
.slide-fade-leave-to {
    transform: translateX(10px);
    opacity: 0;
}

.el-header {
    background-color: white;
    color: #333;
    line-height: 80px;
    padding: 0;
}

.openmeunbtn {
    font-size: 24px;
    padding: 6px;
    border: 0;
    color: #C0CCDA;
}

.openmeunbtn:focus,
.openmeunbtn:hover {
    color: #3a8ee6;
    border-color: #3a8ee6;
}

.mbmenu-div {
    margin-top: 30px;
    color: black;
    font-size: 16px;
}

.user-menu {
    height: 80px;
}

.c-gra {
    cursor: pointer;
    font-size: 25px;
}

.el-aside {
    background-color: #1f2e54
}

.el-main {
    background-color: #f1f2f7;
}

.homemainbg {
    padding: 15px;
    background-color: #fff;
}
</style>