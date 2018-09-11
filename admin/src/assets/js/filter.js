import Vue from 'vue'
export default (function () {
  Vue.filter('status', function (value) {
    if (value == 1) {
      return '启用'
    } else if (value == 0) {
      return '禁用'
    } else {
      return '未知状态'
    }
  })
  Vue.filter('status', function (value) {
    switch (value) {
      case -1:
        return '删除'
      case 0:
        return '禁用'
      case 1:
        return '正常'
      default:
        return '非法状态'
    }
  })
  Vue.filter('lend_rate', function (value) {
    let rate = ''
    if (value > 0) {
      rate = value + '%'
    } else {
      rate = value
    }
    return rate
  })
  Vue.filter('interest', function (value) {
    let rest = ''
    if (value > 0) {
      rest = value + '%'
    } else {
      rest = value
    }
    return rest
  })
  Vue.filter('tx', function (value) {
    switch (value) {
      case -1:
        return '关闭提现'
      case 0:
        return '未处理'
      case 1:
        return '提现完成'
      default:
        return '非法状态'
    }
  })
  Vue.filter('score_action', function (value) {
    switch (value) {
      case -1:
        return '关闭提现'
      case 0:
        return '减少'
      case 1:
        return '增加'
      default:
        return '非法状态'
    }
  })
  Vue.filter('rules', function (value) {
    return value
  })
  Vue.filter('fileLink', function (value) {
    const link = window.imgUrl + value
    return link
  })
  Vue.filter('toolType', function (value) {
    let type = ''
    if (value == 1) {
      type = '系统工具'
    } else if (value == 2) {
      type = '说明知道'
    }
    return type
  })
  Vue.filter('numToString', function (value) {
    const string = value.toString()
    return string
  })
  Vue.filter('projectState', function (value) {
    let string = ''
    switch (value) {
      case '1':
        string = '售前项目'
        break
      case '2':
        string = '服务中项目'
        break
      case '3':
        string = '已结束项目'
        break
    }
    return string
  })
  Vue.filter('time', function (value) {
    let day = moment.unix(value)
    let date = moment(day).format('YYYY/MM/DD H:mm')
    return date
  })
  Vue.filter('date', function (value) {
    let day = moment.unix(value)
    let date = moment(day).format('YYYY/MM/DD')
    return date
  })
  Vue.filter('abstract', function (value) {
    let abstract = ''
    if (value.length > 70) {
      abstract = value.substr(0, 70) + '...'
    } else {
      abstract = value
    }
    return abstract
  })
  Vue.filter('posStatus', function (value) {
    let status = ''
    switch (value) {
      case 1:
        status = '在职'
        break
      case 2:
        status = '待入职'
        break
      case 3:
        status = '离职'
        break
    }
    return status
  })
  Vue.filter('template', function (value) {
    let template = ''
    if (value == '') {
      template = '上传'
    } else {
      template = '上传更新'
    }
    return template
  })
})()
