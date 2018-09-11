<template>
    <div class="Left_Menu_ListDiv">
        <el-menu :default-active="defaultactive" class="el-menu-vertical-demo" :unique-opened="true" :collapse="isCollapse" background-color="#1f2e54" text-color="#fff" active-backgorund-color="#ffd04b">
            <div v-for="(res,index) in menus">
                <div v-for="(secMenu,sindex) in res.child">
                    <el-submenu :index="secMenu.title">
                        <template slot="title">
                            <i class="icon iconfont iconset" :class="secMenu.icon"></i>
                            <span slot="title">{{secMenu.title}}</span>
                        </template>
                        <el-menu-item v-for="(item,iindex) in secMenu.child" :index="item.menu" @click="routerChange(item)">{{item.title}}</el-menu-item>
                    </el-submenu>
                </div>
            </div>
        </el-menu>
    </div>
</template>
<script>
import $ from 'jquery'
export default {
    props: ['isCollapse', 'menuData', 'menu', 'menus'],

    data() {
        return {
            defaultactive: 'adminindex'
        }
    },
    mounted() {
        this.defaultactive = this.menu
    },
    methods: {
        routerChange(item) {
            // 与当前页面路由相等则刷新页面
            if (item.url != this.$route.path) {
                router.push(item.url)
            } else {
                _g.shallowRefresh(this.$route.name)
            }
            this.defaultactive = item.menu
        }
    }
}
</script>
<style scoped>
.el-menu-vertical-demo:not(.el-menu--collapse) {
    width: 220px;
    min-height: 400px;
}

.el-menu {
    border-right: 0;
}

.Left_Menu_ListDiv {
    margin-top: 80px;
}

.Left_Menu_ListDiv .el-submenu .el-menu-item {
    padding-left: 65px !important;
}

.Left_Menu_ListDiv .el-menu--collapse .el-menu-item span,
.Left_Menu_ListDiv .el-menu--collapse .el-submenu .el-submenu__title span {
    height: 0;
    width: 0;
    overflow: hidden;
    visibility: hidden;
    display: inline-block;
}

.Left_Menu_ListDiv .el-menu-item.is-active,
.el-menu--vertical .el-menu-item.is-active {
    color: #ffffff;
    background-color: #16b89f !important;
}

.iconset {
    color: #FFF;
    vertical-align: middle;
    margin-right: 15px;
    width: 24px;
    text-align: center;
    font-size: 18px;
    speak: none;
    font-style: normal;
    font-weight: 400;
    font-variant: normal;
    text-transform: none;
    line-height: 1;
    vertical-align: baseline;
    display: inline-block;
    -webkit-font-smoothing: antialiased;
}
</style>
<style>
/*公共样式，仅供左侧导航使用*/

.Left_Menu_ListDiv .el-menu-item .el-submenu__icon-arrow,
.Left_Menu_ListDiv .el-submenu .el-submenu__title .el-submenu__icon-arrow {
    display: none;
}
</style>