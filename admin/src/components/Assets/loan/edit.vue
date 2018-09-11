<template>
    <div>
        <el-card shadow="never" class="no-pd">
            <div class="el-card__header m-b-20 bgf8">
                <div class="clearfix">
                    <span>借款信息</span>
                </div>
            </div>
            <el-form ref="basicForm" :model="basic" :inline="true" :rules="rules" label-width="200px">
                <el-row :gutter="24">
                    <el-col :span="12" class="list-item" v-for="(item,index) in basic">
                        <el-form-item :label='item.title' :prop="`${index}.value`">
                            <el-input v-model.number="item.value" v-if="item.type === 'input_number'"
                                      class="w-200"></el-input>
                            <el-input v-model="item.value" v-if="item.type === 'input'" class="w-200"></el-input>
                            <el-radio-group v-model.number="item.value" v-if="item.type === 'radio'" size="medium">
                                <el-radio :label="i.label" v-for="(i,index) in item.list">{{i.title}}</el-radio>
                            </el-radio-group>
                        </el-form-item>
                    </el-col>
                </el-row>
            </el-form>
            <div class="el-card__header m-b-20 bgf8">
                <div class="clearfix">
                    <span>借款信息</span>
                </div>
            </div>
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
                                            value-format="yyyy-MM-dd HH:mm:ss"
                                            :disabled="item.disabled"></el-date-picker>
                            <el-select v-model="item.value" :placeholder="item.title" :disabled="item.disabled"
                                       class="w-200" v-if="item.type === 'select'">
                                <el-option v-for="option in item.options" :label="option.title"
                                           :value="option.value"></el-option>
                            </el-select>
                            <p v-if="item.type === 'text'" class="w-200" style="height: 40px;margin: 0;">
                                {{item.value}}</p>
                        </el-form-item>
                    </el-col>
                </el-row>
            </el-form>
        </el-card>
        <div style="margin-top:30px;display: flex;justify-content: center;">
            <el-button @click="$router.push('/loan/loan/list')">取消</el-button>
            <el-button type="primary" @click="submit">提交</el-button>
        </div>
    </div>
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
        isAdd: this.$route.params.type === 'add',
        basic: {
          name: {
            type: 'input', value: '', title: '名字', rule: [
              {required: true, message: '名字不能为空', trigger: 'blur'},
              {min: 2, max: 30, message: '姓名长度为2到30位', trigger: 'blur'}],
          },
          city: {
            type: 'input', value: '', title: '所在城市', rule: [
              {required: true, message: '所在城市不能为空', trigger: 'blur'}],
          },
          phone: {
            type: 'input_number', value: '', title: '手机号', rule: [
              {type: 'number', required: true, message: '手机号必须为数字', trigger: 'blur'},
              {pattern: /^1\d{10}$/, message: '请输入正确的手机格式', trigger: 'blur'}],
          },
          is_marriage: {
            type: 'radio', value: 0, title: '婚姻状况',
            list: [{label: 0, title: '未知'}, {label: 1, title: '已婚'}, {label: 2, title: '未婚'}],
            // rule: [
            //     { type: 'number', required: true, message: '婚姻状况不能为空', trigger: 'blur' }]
          },
          id_card: {
            type: 'input', value: '', title: '身份证', rule: [
              {required: true, message: '身份证号码不能为空', trigger: 'blur'}],
          },
          address: {
            type: 'input', value: '', title: '户籍地址',
            rule: [
              {required: true, message: '户籍地址不能为空', trigger: 'blur'}],
          },
          age: {
            type: 'input_number', value: '', title: '年龄', rule: [
              {type: 'number', required: true, message: '年龄必须为数字', trigger: 'blur'}],
          },
          home_address: {
            type: 'input', value: '', title: '家庭地址',
            // rule: [
            //     { required: true, message: '家庭地址不能为空', trigger: 'blur' }]
          },
          gender: {
            type: 'radio', value: 1, title: '性别',
            list: [{label: 1, title: '男'}, {label: 2, title: '女'}],
            rule: [
              {required: true, message: '性别不能为空', trigger: 'blur'},
              {type: 'number', min: 1, max: 2, message: '请选择正确的性别'},
            ],
          },
          company_name: {
            type: 'input', value: '', title: '单位名称',
            // rule: [
            //     { required: true, message: '单位名称不能为空', trigger: 'blur' }]
          },
          zhima: {
            type: 'input_number', value: '', title: '芝麻分', rule: [
              {type: 'number', required: true, message: '芝麻分必须为数字', trigger: 'blur'}],
          },
          company_address: {
            type: 'input', value: '', title: '公司地址',
            // rule: [
            //     { required: true, message: '户籍地址不能为空', trigger: 'blur' }]
          },
        },
        loanForm: {
          begin_time: {
            type: 'date', value: '', title: '放款日期', rule: [
              {type: 'string', required: true, message: '请选择放款日期', trigger: 'change'}], default_time: '00:00"00',
          },
          uncleared: {
            type: 'input_number', value: 0, title: '未还总额', disabled: true,
            // rule: [
            //     { required: true, message: '逾期天数不能为空' },
            //     { type: 'number', message: '逾期天数必须为数字' }]
          },
          loan_cycle: {
            type: 'input_number', value: '', title: '期限（天)', rule: [
              {required: true, message: '期限不能为空'},
              {type: 'number', min: 1, max: 365, message: '期限必须为（1-365）天的数字'},
            ],
          },
          status: {
            type: 'select',
            value: 1,
            title: '订单状态',
            disabled: true,
            options: [
              {value: 1, title: '未还款'},
              {value: 2, title: '全部还款'},
              {value: 3, title: '逾期还款'},
              {value: 4, title: '分期还款中(部分还)'},
              {value: 5, title: '分期已还清'},
              {value: 6, title: '续期'}],
          },
          end_time: {
            type: 'date', value: '', title: '约定还款日期', disabled: true, rule: [
              {type: 'string', required: true, message: '请选择约定放款日期', trigger: 'change'}],
            default_time: '23:59:59',
          },
          is_collection: {
            type: 'select',
            value: 0,
            title: '是否催收还款',
            disabled: true,
            options: [{value: 0, title: '否'}, {value: 1, title: '是'}],
          },
          loan_account: {
            type: 'select', value: '', title: '放款方式', options: [],
          },
          repayment_amount: {
            type: 'input_number', value: 0, title: '已还总额', disabled: true,
            // rule: [
            //     { required: true, message: '逾期天数不能为空' },
            //     { type: 'number', message: '逾期天数必须为数字' }]
          },
          service_amount: {
            type: 'input_number', value: '', title: '服务费', rule: [
              {required: true, message: '服务费不能为空'},
              {type: 'number', message: '服务费必须为数字'}],
          },
          amount: {
            type: 'input_number', value: '0.00', title: '本期还款金额', disabled: true,
            // rule: [
            //     { required: true, message: '本期还款金额不能为空' },
            //     { type: 'number', message: '本期还款金额必须为数字' }]
          },
          loan_amount: {
            type: 'input_number', value: '', title: '实际放款金额', rule: [
              {required: true, message: '实际放款金额不能为空'},
              {type: 'number', message: '实际放款金额必须为数字'}],
          },
          emtry_user_name: {
            type: 'text', value: JSON.parse(localStorage.getItem('userInfo')).data.realname, title: '录入人',
          },
          total_amount: {
            type: 'input_number', value: 0, title: '应还金额', disabled: true,
            // rule: [
            //     { required: true, message: '应还金额不能为空' },
            //     { type: 'number', message: '应还金额必须为数字' }]
          },
          create_time: {
            type: 'text', value: nowDate, title: '录入时间',
          },
        },
      }
    },
    computed: {
      submitForm () {
        let tempArr = {}
        for (let i in this.basic) {
          tempArr[i] = this.basic[i].value
        }
        for (let i in this.loanForm) {
          tempArr[i] = this.loanForm[i].value
        }
        //删除不需要上传的字段
        delete tempArr.is_collection
        delete tempArr.repayment_amount
        delete tempArr.status
        delete tempArr.create_time
        delete tempArr.emtry_user_name
        return tempArr
      },
      rules () {
        let tempArr = {}
        for (let i in this.basic) {
          tempArr[`${i}.value`] = this.basic[i].rule
        }
        for (let i in this.loanForm) {
          tempArr[`${i}.value`] = this.loanForm[i].rule
        }
        return tempArr
      },
      validateStatus () {
        let status = [false, false]
        this.$refs.loanForm.validate((valid) => {
          if (valid) {
            status[0] = true
          } else {
            return false
          }
        })
        this.$refs.basicForm.validate((valid) => {
          if (valid) {
            status[1] = true
          } else {
            return false
          }
        })
        return status
      },
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
      'basic.id_card.value': function (val, old) {
        if (val.length === 18) {//身份证18位时 根据身份证自动填入年龄和性别
          let year = [val[6], val[7], val[8], val[9]].join('')
          let sex = val[-2] % 2 === 0 ? 2 : 1
          let tempDate = new Date()
          let age = tempDate.getFullYear() - year
          this.$set(this.basic.age, 'value', age)
          this.$set(this.basic.gender, 'value', sex)
        }
      },
      'loanForm.service_amount.value': function (val) {
        if (typeof val !== 'number') {
          this.$set(this.loanForm.service_amount, 'value', parseFloat(val))
        }
      },
      'loanForm.loan_amount.value': function (val) {
        if (typeof val !== 'number') {
          this.$set(this.loanForm.loan_amount, 'value', parseFloat(val))
        }
      },
      'loanForm.total_amount.value': function (val) {
        if (typeof val !== 'number') {
          this.$set(this.loanForm.total_amount, 'value', parseFloat(val))
        }
      },
      'loanForm.uncleared.value': function (val) {
        if (val < 0) {
          this.$set(this.loanForm.uncleared, 'value', 0)
        }
      },
    },
    mounted () {
      _g.closeGlobalLoading()
      this.getLoanList()
      if (!this.isAdd) {
        this.getLoan()
      }
    },
    methods: {
      addLoan () {
        this.apiPost('/admin/loan', this.submitForm).then((res) => {
          if (res.code === 200) {
            this.$message.success(res.data)
            this.$router.push('/loan/loan/list')
          } else {
            this.$message.error(res.error)
          }
        }).catch((err) => {
          this.$message.error(err)
        })
      },
      getLoan () {
        this.apiGet(`/admin/loan/${this.$route.query.id}`).then((res) => {
          if (res.code === 200) {
            for (let i in res.data) {
              if (this.basic.hasOwnProperty(i)) {
                this.$set(this.basic[i], 'value', res.data[i])
              }
              if (this.loanForm.hasOwnProperty(i)) {
                this.$set(this.loanForm[i], 'value', res.data[i])
              }
            }
            this.$set(this.basic.phone, 'value', parseInt(this.basic.phone.value))
          } else {
            this.$message.error(res.error)
          }
        }).catch((err) => {
          this.$message.error(err)
        })
      },
      editLoan () {
        this.apiPut(`/admin/loan/`, this.$route.query.id, this.submitForm).then((res) => {
          if (res.code === 200) {
            this.$message.success(res.data)
            this.$router.push('/loan/loan/list')
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
      submit () { //提交 编辑调用编辑方法  新增调用新增
        if (this.validateStatus[0] && this.validateStatus[1]) {
          if (this.isAdd) {
            this.addLoan()
          } else {
            this.editLoan()
          }
        } else {
          this.$message.error('请先完成信息录入')
        }
      },
    },
    created () {
    },
    components: {},
    mixins: [http],
  }
</script>
<style lang="less" scoped>
    .maskColor {
        display: inline-block;
        width: 6px;
        height: 18px;
    }

    .delbtm .el-form-item {
        margin-bottom: 0;
    }
</style>