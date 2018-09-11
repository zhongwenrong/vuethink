<template>
    <el-dialog title="续借" :visible.sync="isShow" :before-close="handleClose">
        <el-form ref="loanForm" :model="loanForm" :inline="true" :rules="rules" label-width="200px">
            <el-row :gutter="24">
                <el-col :span="12" class="list-item" v-for="(item,index) in loanForm">
                    <el-form-item :label='item.title' :prop="`${index}.value`">
                        <el-input v-model.number="item.value" v-if="item.type === 'input_number'" class="w-200"
                                  :disabled="item.disabled"></el-input>
                        <el-input v-model="item.value" v-if="item.type === 'input'" class="w-200"
                                  :disabled="item.disabled"></el-input>
                        <el-date-picker type="datetime" v-if="item.type === 'date'" placeholder="选择日期"
                                        v-model="item.value" class="w-200" :default-time="item.default_time"
                                        value-format="yyyy-MM-dd HH:mm:ss" :disabled="item.disabled"></el-date-picker>
                        <el-select v-model="item.value" :placeholder="item.title" :disabled="item.disabled"
                                   class="w-200" v-if="item.type === 'select'">
                            <el-option v-for="option in item.options" :label="option.title"
                                       :value="option.value"></el-option>
                        </el-select>
                        <p v-if="item.type === 'text'" class="w-200" style="height: 40px;margin: 0;">{{item.value}}</p>
                    </el-form-item>
                </el-col>
            </el-row>
        </el-form>
        <div slot="footer">
            <!-- <el-button type="error" @click="$parent.isShowDialog.renew = false">取消</el-button> -->
            <el-button type="success" @click="addLoan">提交</el-button>
        </div>
    </el-dialog>
</template>
<script>
  import http from '../../../assets/js/http'

  export default {
    data () {
      let nowDate = new Date()
      nowDate = `${nowDate.getFullYear()}-${nowDate.getMonth() +
      1}-${nowDate.getDate()} ${nowDate.getHours()}:${nowDate.getMinutes()}:${nowDate.getSeconds() < 10 ? '0' +
        nowDate.getSeconds() : nowDate.getSeconds()}`
      return {
        loanForm: {
          begin_time: {
            type: 'date', value: '', title: '放款日期', rule: [
              {type: 'string', required: true, message: '请选择放款日期', trigger: 'change'}], default_time: '00:00"00',
          },
          loan_cycle: {
            type: 'input_number', value: '', title: '期限（天)', rule: [
              {required: true, message: '期限不能为空'},
              {type: 'number', message: '期限必须为数字'}],
          },
          end_time: {
            type: 'date', value: '', title: '约定还款日期', disabled: true, rule: [
              {type: 'string', required: true, message: '请选择约定放款日期', trigger: 'change'}],
            default_time: '23:59:59',
          },
          loan_account: {
            type: 'select', value: '', title: '放款方式', options: [],
          },
          service_amount: {
            type: 'input_number', value: '', title: '服务费', rule: [
              {required: true, message: '服务费不能为空'},
              {type: 'number', message: '服务费必须为数字'}],
          },
          loan_amount: {
            type: 'input_number', value: '', title: '实际放款金额', rule: [
              {required: true, message: '实际放款金额不能为空'},
              {type: 'number', message: '实际放款金额必须为数字'}],
          },
          total_amount: {
            type: 'input_number', value: 0, title: '应还金额', disabled: true,
          },
        },
      }
    },
    props: ['isShow', 'basic'],
    computed: {
      submitForm () {
        let tempArr = {}
        for (let i in this.loanForm) {
          tempArr[i] = this.loanForm[i].value
        }
        // for (let i in this.basic) {
        //     if (this.basic[i]) {
        //         tempArr[i] = this.basic[i]
        //     }
        // }
        return tempArr
      },
      rules () {
        let tempArr = {}
        for (let i in this.loanForm) {
          tempArr[`${i}.value`] = this.loanForm[i].rule
        }
        return tempArr
      },
      // validateStatus() {
      //     let status = [false]
      //     this.$refs.loanForm.validate((valid) => {
      //         if (valid) {
      //             status[0] = true
      //         } else {
      //             return false
      //         }
      //     });
      //     return status
      // },
      totalLoan () { // 获取放款金额和服务费的值
        return [this.loanForm.loan_amount.value, this.loanForm.service_amount.value]
      },
      loanDate () {
        return [this.loanForm.begin_time.value, this.loanForm.loan_cycle.value]
      },
    },
    watch: {
      'totalLoan': function (val) { // 监听放款金额和服务费的值变化
        this.$set(this.loanForm.total_amount, 'value', val[0] + val[1])  //设置应还金额 = 实际放款 + 服务费
        this.$set(this.loanForm.uncleared, 'value',
          this.loanForm.total_amount.value - this.loanForm.repayment_amount.value)  //设置未还金额 = 总 - 已还
      },
      'loanDate': function (val) { //设置约定还款时间为期限的最后一秒
        let t = new Date(val[0])
        t.setDate(t.getDate() + val[1] - 1)
        t.setHours(23)
        t.setMinutes(59)
        t.setSeconds(59)
        let temp = `${t.getFullYear()}-${t.getMonth() +
        1}-${t.getDate()} ${t.getHours()}:${t.getMinutes()}:${t.getSeconds()}`
        this.$set(this.loanForm.end_time, 'value', temp)
      },
    },
    mounted () {
      _g.closeGlobalLoading()
      this.getLoanList()
    },
    methods: {
      addLoan () {
        this.apiPost('/admin/loan', {...this.submitForm, ...this.basic,is_renew:1}).then((res) => {
          if (res.code === 200) {
            this.$message.success(res.data)
            this.$parent.isShowDialog.renew = false
          } else {
            this.$message.error(res.error)
          }
        }).catch((err) => {
          this.$message.error(err)
        })
      },
      getLoanList () {  //获取放款方式列表
        this.apiGet(`/admin/getLoanAccount?page=1&limit=30`).then((res) => {
          if (res.code === 200) {
            for (let i in res.data.list) {
              this.loanForm.loan_account.options.push({value: res.data.list[i].id, title: res.data.list[i].name})
            }
          } else {
            this.$message.error(res.error)
          }
        }).catch((err) => {
          this.$message.error(err)
        })
      },
      handleClose () {
        this.$parent.isShowDialog.renew = false//控制父组件
        this.$parent.activeAction.actionName = ''//控制父组件
      },
    },
    created () {
    },
    components: {},
    mixins: [http],
  }
</script>
