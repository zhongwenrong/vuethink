<template>
	<div>
		<div class="m-b-20 ovf-hd">
      <p style='font-size: 20px;margin: 0;margin-bottom: 15px;'>登录日志</p>

			<div class="fl">
				<el-input class="w-240" placeholder="请输入登录名" v-model.trim="keywords"></el-input>
			</div>

      <el-button class="fl m-l-30" :loading="load" slot="append" icon="el-icon-search" @click="search()">搜索</el-button>
		</div>
		<el-table
		:data="tableData"
		style="width: 100%"
    stripe
    border
    class="hset"
	  >
    	<el-table-column
      align="center"
			prop="id"
			label="序号">
			</el-table-column>
      
      <el-table-column
      align="center"
			prop="username"
			label="登录名">
			</el-table-column>

      <el-table-column
      align="center"
			prop="realname"
			label="姓名">
			</el-table-column>

      <el-table-column
      align="center"
			prop="create_time"
			label="登录时间">
			</el-table-column>

      <el-table-column
      align="center"
      prop="address"
			label="地址">
			</el-table-column>

      <el-table-column
      align="center"
      prop="ip"
			label="登录IP">
			</el-table-column>
		</el-table>
		<div class="pos-rel p-t-20" style='text-align:right;'>
			<div class="block">
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
</template>

<script>
  import http from '../../assets/js/http'

  export default {
    data() {
      return {  
        load:false,
        tableData: [],
        dataCount: 0,
        currentPage: 1,
        keywords: '',
        limit: 15,
      }
    },
    methods: {
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
        this.apiGet('admin/log', data).then((res) => {
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
