// 前台用户模块
const Login          = resolve => require(['./components/Account/Login.vue'], resolve);
const refresh        = resolve => require(['./components/refresh.vue'], resolve);
const Home           = resolve => require(['./components/Home.vue'], resolve);
const menuList       = resolve => require(['./components/Administrative/system/menu/list.vue'], resolve);
const menuAdd        = resolve => require(['./components/Administrative/system/menu/add.vue'], resolve);
const menuEdit       = resolve => require(['./components/Administrative/system/menu/edit.vue'], resolve);
const systemConfig   = resolve => require(['./components/Administrative/system/config/add.vue'], resolve);
const ruleList       = resolve => require(['./components/Administrative/system/rule/list.vue'], resolve);
const ruleAdd        = resolve => require(['./components/Administrative/system/rule/add.vue'], resolve);
const ruleEdit       = resolve => require(['./components/Administrative/system/rule/edit.vue'], resolve);
const positionList   = resolve => require(['./components/Administrative/structures/position/list.vue'], resolve);
const positionAdd    = resolve => require(['./components/Administrative/structures/position/add.vue'], resolve);
const positionEdit   = resolve => require(['./components/Administrative/structures/position/edit.vue'], resolve);
const structuresList = resolve => require(['./components/Administrative/structures/structures/list.vue'], resolve);
const structuresAdd  = resolve => require(['./components/Administrative/structures/structures/add.vue'], resolve);
const structuresEdit = resolve => require(['./components/Administrative/structures/structures/edit.vue'], resolve);
const groupsList     = resolve => require(['./components/Administrative/structures/groups/list.vue'], resolve);
const groupsAdd      = resolve => require(['./components/Administrative/structures/groups/add.vue'], resolve);
const groupsEdit     = resolve => require(['./components/Administrative/structures/groups/edit.vue'], resolve);
const usersList      = resolve => require(['./components/Administrative/personnel/users/list.vue'], resolve);
const usersAdd       = resolve => require(['./components/Administrative/personnel/users/add.vue'], resolve);
const usersEdit      = resolve => require(['./components/Administrative/personnel/users/edit.vue'], resolve);
// 资产管理
// const loanlist    = resolve => require(['./components/Assets/loan/loanlist.vue'], resolve);
// const loanadd     = resolve => require(['./components/Assets/loan/add.vue'], resolve);
// const overduelist = resolve => require(['./components/Assets/loan/overduelist.vue'], resolve);
// const loansearch  = resolve => require(['./components/Assets/loan/loansearch.vue'], resolve);
// 报表
const reportday = resolve => require(['./components/Assets/report/reportday.vue'], resolve);
const reportmonth = resolve => require(['./components/Assets/report/reportmonth.vue'], resolve);
// 后台首页
const adminIndex = resolve => require(['./components/Index/admin/index.vue'], resolve);

/**
 * meta参数解析
 * hideLeft: 是否隐藏左侧菜单，单页菜单为true
 * module: 菜单所属模块
 * menu: 所属菜单，用于判断三级菜单是否显示高亮，如菜单列表、添加菜单、编辑菜单都是'menu'，用户列表、添加用户、编辑用户都是'user'，如此类推
 */

const routes = [
  { path: '/', component: Login, name: 'Login' },
  {
    path: '/home',
    component: Home,
    children: [
      { path: '/refresh', component: refresh, name: 'refresh' }
    ]
  },
  {
    path: '/home',
    component: Home,
    children: [
      { path: 'menu/list', component: menuList, name: 'menuList', meta: { hideLeft: false, module: 'Administrative', menu: 'menu' }},
      { path: 'menu/add', component: menuAdd, name: 'menuAdd', meta: { hideLeft: false, module: 'Administrative', menu: 'menu' }},
      { path: 'menu/edit/:id', component: menuEdit, name: 'menuEdit', meta: { hideLeft: false, module: 'Administrative', menu: 'menu' }}
    ]
  },
  {
    path: '/home',
    component: Home,
    children: [
      { path: 'config/add', component: systemConfig, name: 'systemConfig', meta: { hideLeft: false, module: 'Administrative', menu: 'systemConfig' }}
    ]
  },
  {
    path: '/home',
    component: Home,
    children: [
      { path: 'rule/list', component: ruleList, name: 'ruleList', meta: { hideLeft: false, module: 'Administrative', menu: 'rule' }},
      { path: 'rule/add', component: ruleAdd, name: 'ruleAdd', meta: { hideLeft: false, module: 'Administrative', menu: 'rule' }},
      { path: 'rule/edit/:id', component: ruleEdit, name: 'ruleEdit', meta: { hideLeft: false, module: 'Administrative', menu: 'rule' }}
    ]
  },
  {
    path: '/home',
    component: Home,
    children: [
      { path: 'position/list', component: positionList, name: 'positionList', meta: { hideLeft: false, module: 'Administrative', menu: 'position' }},
      { path: 'position/add', component: positionAdd, name: 'positionAdd', meta: { hideLeft: false, module: 'Administrative', menu: 'position' }},
      { path: 'position/edit/:id', component: positionEdit, name: 'positionEdit', meta: { hideLeft: false, module: 'Administrative', menu: 'position' }}
    ]
  },
  {
    path: '/home',
    component: Home,
    children: [
      { path: 'structures/list', component: structuresList, name: 'structuresList', meta: { hideLeft: false, module: 'Administrative', menu: 'structures' }},
      { path: 'structures/add', component: structuresAdd, name: 'structuresAdd', meta: { hideLeft: false, module: 'Administrative', menu: 'structures' }},
      { path: 'structures/edit/:id', component: structuresEdit, name: 'structuresEdit', meta: { hideLeft: false, module: 'Administrative', menu: 'structures' }}
    ]
  },
  {
    path: '/home',
    component: Home,
    children: [
      { path: 'groups/list', component: groupsList, name: 'groupsList', meta: { hideLeft: false, module: 'Administrative', menu: 'groups' }},
      { path: 'groups/add', component: groupsAdd, name: 'groupsAdd', meta: { hideLeft: false, module: 'Administrative', menu: 'groups' }},
      { path: 'groups/edit/:id', component: groupsEdit, name: 'groupsEdit', meta: { hideLeft: false, module: 'Administrative', menu: 'groups' }}
    ]
  },
  {
    path: '/home',
    component: Home,
    children: [
      { path: 'users/list', component: usersList, name: 'usersList', meta: { hideLeft: false, module: 'Administrative', menu: 'users' }},
      { path: 'users/add', component: usersAdd, name: 'usersAdd', meta: { hideLeft: false, module: 'Administrative', menu: 'users' }},
      { path: 'users/edit/:id', component: usersEdit, name: 'usersEdit', meta: { hideLeft: false, module: 'Administrative', menu: 'users' }}
    ]
  },
  {
    path: '/Index',
    component: Home,
    children: [
      { path: 'admin/index', component: adminIndex, name: 'adminIndex', meta: { hideLeft: false, module: 'Adminindex', menu: 'adminindex' }}
    ]
  },
  // {
  //   path: '/loan',
  //   component: Home,
  //   children: [
  //     { path: 'loan/list', component: loanlist, name: 'loanlist', meta: { hideLeft: false, module: 'loan', menu: 'list' }},
  //     { path: 'loan/add', component: loanadd, name: 'loanadd', meta: { hideLeft: false, module: 'loan', menu: 'add' }},
  //     { path: 'loan/search', component: loansearch, name: 'loansearch', meta: { hideLeft: false, module: 'loan', menu: 'search' }},
  //     { path: 'loan/overdue', component: overduelist, name: 'overduelist', meta: { hideLeft: false, module: 'loan', menu: 'overdue' }},
  //     { path: 'report/day', component: reportday, name: 'reportday', meta: { hideLeft: false, module: 'loan', menu: 'reportday' }},
  //     { path: 'report/month', component: reportmonth, name: 'reportmonth', meta: { hideLeft: false, module: 'loan', menu: 'reportmonth' }}
  //   ]
  // }, 
]
export default routes
