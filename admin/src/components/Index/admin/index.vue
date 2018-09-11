<template>
  <div>
    <div style="margin-top: 50px">
      <el-row :gutter="20">
        <el-col :span="6"><div class="grid-content bg-purple">昨日新增用户：{{ adduser }} 人</div></el-col>
        <el-col :span="6" :offset="6"><div class="grid-content bg-purple">昨日新增商家：{{addbusiness}} 家</div></el-col>
      </el-row>
      <el-row :gutter="20">
        <el-col :span="6"><div class="grid-content bg-purple">总用户注册量：{{ userAll }} 人</div></el-col>
        <el-col :span="6" :offset="6"><div class="grid-content bg-purple">总商家量：{{businessAll}} 家</div></el-col>
      </el-row>
    </div>
    <div style="margin-top: 100px" >
      <div class="block">
        <span class="demonstration">时间</span>
        <el-date-picker
          v-model="keywordss"
          type="daterange"
          format="yyyy-MM-dd"
          placeholder="选择日期">
        </el-date-picker>
        <el-button slot="append" icon="search" @click="search()"></el-button>
        <div style="margin-top: 10px"  >
            <el-row :gutter="20">
            <el-col :span="6"><div class="grid-content bg-purple">
            用户量：{{ regtotal }} 人 <br/>
            商家量：{{btotal}} 家
            </div></el-col>
          </el-row>
        </div>
      </div style="margin-top: 5px">
      <div id="myChart" :style= "{width: '100%', height: '500px' }"></div>
    </div>
  </div>
</template>

<style>
  .el-row {
    margin-bottom: 20px;
    &:last-child {
      margin-bottom: 0;
    }
  }
  .el-col {
    border-radius: 4px;
  }
  .bg-purple-dark {
    background: #99a9bf;
  }
  .bg-purple {
    background: #d3dce6;
  }
  .bg-purple-light {
    background: #e5e9f2;
  }
  .grid-content {
    border-radius: 4px;
    min-height: 36px;
  }
  .row-bg {
    padding: 10px 0;
    background-color: #f9fafc;
  }
</style>
 
<script>
  import http from '../../../assets/js/http'
  import echarts from 'echarts'

  export default {
    data () {
      return {
        msg: '',
        time: [],
        count: [],
        tableData: [],
        keywordss: '',
        regtotal: '',
        btotal: ''
      }
    },
    mounted () {
      // alert(this.keywords)
      this.drawLine()
    },
    methods: {
      search() {
        this.getAllUsers()
      },
      getAllUsers() {
        this.loading = true
        const data = {
          params: {
            keywords: this.keywordss
          }
        }
        this.apiGet('admin/index', data).then((res) => {
          this.handelResponse(res, (data) => {
            // console.log(data.list.time)
            // console.log(data.list.count)
            this.regtotal = data.regtotal
            this.btotal = data.btotal
            this.addbusiness = data.addbusiness
            this.adduser = data.adduser
            this.userAll = data.userAll
            this.businessAll = data.businessAll
            this.drawLine(data.list.time, data.list.count, data.blist.count, data.blist.count)
          })
        })
      },
      getKeywords() {
        let data = this.$route.query
        if (data) {
          if (data.keywords) {
            this.keywords = data.keywords
          } else {
            this.keywords = ''
          }
        }
      },
      // timetrans(date2) {
      //   var date = new Date( date2*1000)
      //   var Y = date.getFullYear() + '-'
      //   var M = (date.getMonth()+1 < 10 ? '0'+(date.getMonth()+1) : date.getMonth()+1) + '-'
      //   var D = (date.getDate() < 10 ? '0' + (date.getDate()) : date.getDate()) + ' '
      //   var h = (date.getHours() < 10 ? '0' + date.getHours() : date.getHours()) + ':'
      //   var m = (date.getMinutes() <10 ? '0' + date.getMinutes() : date.getMinutes()) + ':'
      //   var s = (date.getSeconds() <10 ? '0' + date.getSeconds() : date.getSeconds())
      //   return Y+M+D+h+m+s
      // },
      drawLine (time, count, btime, bcount) {
        // 基于准备好的dom，初始化echarts实例
        var _this = this
        let myChart = echarts.init(document.getElementById('myChart'))
        // 绘制图表
        myChart.setOption({
          title: { text: '每日注册用户流量图' },
          tooltip: {
            trigger: 'axis'
          },
          grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
          },
          legend: {
            data: ['用户注册量', '商家量']
          },
          xAxis: {
            type: 'category',
            axisLabel: {
              interval: 0
            },
            data: time
          },
          yAxis: {
            type: 'value'
          },
          series: [{
            itemStyle: { normal: { label: { show: true }}},
            name: '用户注册量',
            type: 'line',
            data: count
          },
          {
            itemStyle: { normal: { label: { show: true }}},
            name: '商家量',
            type: 'line',
            data: bcount
          }
          ]
        })
      },
      init() {
        this.getAllUsers()
      }
    },
    created() {
      this.init()
    },
    mixins: [http]
  }
</script>