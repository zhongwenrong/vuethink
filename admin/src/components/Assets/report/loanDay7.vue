<template>
    <div>
        <el-card style="margin-bottom: 30px;" v-if="post_id !== 2" shadow="never">
            <el-form :inline="true" :model="condition" class="demo-form-inline delbtm">
                <el-select v-model="condition.structure_id" filterable placeholder="请选择组" clearable>
                    <el-option value="0" label="全部"></el-option>
                    <el-option v-for="item in groupList.list" :key="item.id" :label="item.name" :value="item.id">
                    </el-option>
                </el-select>
                <el-select v-model="condition.uid" filterable placeholder="请选择组员" clearable>
                    <el-option value="0" label="全部"></el-option>
                    <el-option v-for="item in groupMemberList.list" :key="item.id" :label="item.realname"
                               :value="item.id">
                    </el-option>
                </el-select>
                <el-button icon="el-icon-search" @click="getReportList" type="primary">查询</el-button>
            </el-form>
        </el-card>
        <el-card shadow="never">
            <el-table :data="reportList.list" stripe style="width: 100%">
                <el-table-column label="序号" prop="id" align="center"></el-table-column>
                <el-table-column label="日期" prop="time" width="120" align="center"></el-table-column>
                <el-table-column label="应还金额" :render-header="renderHeader" prop="total_amount_all"
                                 align="center"></el-table-column>
                <el-table-column label="本金" :render-header="renderHeader" prop="loan_amount_all"
                                 align="center"></el-table-column>
                <el-table-column label="服务费" :render-header="renderHeader" prop="service_amount_all"
                                 align="center"></el-table-column>
                <!--<el-table-column label="借款单数" prop="loan_count" align="center"></el-table-column>-->
            </el-table>
            <el-pagination layout="total,prev, pager, next" class="fr" :total="reportList.dataCount" :pageSize="15"
                           @current-change="getDataByPage">
            </el-pagination>
        </el-card>
    </div>
</template>
<script>
  import http from 'src/assets/js/http'

  export default {
    data () {
      return {
        condition: {
          type: 1, //1用于请求天数据 2为月数据
          page: 1,
          limit: 15,
          structure_id: '',
          uid: '',
        },
        post_id: JSON.parse(localStorage.getItem('userInfo')).data.post_id,
        reportList: {},
        groupList: {},
        groupMemberList: {},
      }
    },
    watch: {
      'condition.structure_id': function () {
        this.getGroupMember()
      },
    },
    methods: {
      getReportList () {
        this.apiGet('/admin/report/loanDay7', {params: this.condition}).then((res) => {
          if (res.code === 200) {
            this.$set(this, 'reportList', res.data)
          } else {
            _g.toastMsg('error', res.error)
          }
        }).catch((err) => {
          _g.toastMsg('error', err)
        })
      },
      getDataByPage (page) {
        this.$set(this.condition, 'page', page)
        this.getReportList()
      },
      getGroup () {
        this.apiGet('/admin/Structures/getGroup').then((res) => {
          if (res.code === 200) {
            this.$set(this, 'groupList', res.data)
          } else {
            _g.toastMsg('error', res.error)
          }
        }).catch((err) => {
          _g.toastMsg('error', err)
        })
      },
      getGroupMember () {
        this.apiGet('/admin/users', {params: {structure_id: this.condition.structure_id}}).then((res) => {
          if (res.code === 200) {
            this.$set(this, 'groupMemberList', res.data)
          } else {
            _g.toastMsg('error', res.error)
          }
        }).catch((err) => {
          _g.toastMsg('error', err)
        })
      },
      renderHeader (h, {column, $index}) {
        let data = {
          '应还金额': '应还金额 = 本金 + 服务费 ',
          '服务费': '当天放款的服务费',
          '本金': '当天放款金额的本金',
        }
        if (column.label) {
          return h('span', {}, [
            h('span', {}, column.label),
            h('el-popover',
              {props: {placement: 'top-start', width: '200', trigger: 'hover', content: data[column.label]}}, [
                h('i',
                  {slot: 'reference', class: 'el-icon-question', style: 'color:gray;font-size:16px;margin-left:10px;'},
                  ''),
              ]),
          ])
        }
      },
    },
    mounted () {
      this.getReportList()
      _g.closeGlobalLoading()
      if (this.post_id !== 2) {
        this.getGroup()
      }
    },
    mixins: [http],
  }
</script>
