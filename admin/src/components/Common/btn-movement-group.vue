<template>
  <div>
    <el-button :loading="enableLoading" size="small" @click="changeAttrInBtnGroup(1)">启用</el-button>
    <el-button :loading="disableLoading" size="small" @click="changeAttrInBtnGroup(0)">禁用</el-button>
    <el-button :loading="deleteLoading" size="small" @click="deleteDatasInBtnGroup(-1)">删除</el-button>
    <el-button  size="small" @click="dialogVisible = true">迁移用户</el-button>
    <el-dialog
      title="迁移用户"
      :visible.sync="dialogVisible"
      width="20%"
      class="bianji"
      >
      <div style="text-align:center;">
        <el-select v-model="groupId" placeholder="请选择">
          <el-option
            v-for="item in group"
            :key="item.id"
            :label="item.name"
            :value="item.id">
          </el-option>
        </el-select>
      </div>
      <span slot="footer" class="dialog-footer">
        <el-button @click="dialogVisible = false">取 消</el-button>
        <el-button type="primary" @click="transferUserGroup">确 定</el-button>
      </span>
    </el-dialog>
  </div>
</template>

<script>
  import http from '../../assets/js/http'
  export default {
    props: ['selectedData', 'type','group'],
    data() {
      return {
        dialogVisible:false,
        enableLoading: false,
        deleteLoading: false,
        disableLoading: false,
        groupId:''
      }
    },
    methods: {
      getUrl() {
        return 'admin/' + this.type
      },
      getSelectedIds() {
        let array = []
        _(this.selectedData).forEach((res) => {
          array.push(res.id)
        })
        return array
      },
      changeAttrInBtnGroup(cate) {
        if (!this.selectedData.length) {
          _g.toastMsg('warning', '请勾选数据')
          return
        }
        let word = ''
        if (cate === 1) {
          word = '启用'
          this.enableLoading = !this.enableLoading
        } else if (cate === 1) {
          this.disableLoading = !this.disableLoading
          word = '禁用'
        }
        let url = this.getUrl() + '/enables'
        let data = {
          ids: this.getSelectedIds(),
          status: cate
        }
        this.apiPost(url, data).then((res) => {
          this.handelResponse(res, (data) => {
            if (cate == 1) {
              this.enableLoading = !this.enableLoading
            } else {
              this.disableLoading = !this.disableLoading
            }
            _g.toastMsg('success', word + '成功')
            setTimeout(() => {
              this.refreshPage()
            }, 1000)
          }, () => {
            if (cate == 1) {
              this.enableLoading = !this.enableLoading
            } else {
              this.disableLoading = !this.disableLoading
            }
          })
        })
      },
      // 移动用户
      transferUserGroup(){
         const data = {
          ids : this.getSelectedIds(),
          structure_id: this.groupId
         }
         this.apiPost('admin/users/move', data).then((res) => {
          this.handelResponse(res, (data) => {
            _g.toastMsg('success', data)
            this.dialogVisible = false
            setTimeout(() => {
              this.refreshPage()
            }, 1000)
          }, () => {
          })
        })
      },
      refreshPage(){
        this.$emit("chang-page",1)
      },
      deleteDatasInBtnGroup() {
        if (!this.selectedData.length) {
          _g.toastMsg('warning', '请勾选数据')
          return
        }
        this.deleteLoading = !this.deleteLoading
        let url = this.getUrl() + '/enables'
        let data = {
          ids: this.getSelectedIds(),
          status: -1
        }
        this.apiPost(url, data).then((res) => {
          this.handelResponse(res, (data) => {
            this.deleteLoading = !this.deleteLoading
            _g.toastMsg('success', res.data)
            setTimeout(() => {
              this.refreshPage()
            }, 1500)
          }, () => {
            this.deleteLoading = !this.deleteLoading
          })
        })
      }
    },
    computed: {
      enableShow() {
        return _g.getHasRule(this.type + '-enables')
      },
      deletesShow() {
        return _g.getHasRule(this.type + '-deletes')
      }
    },
    mixins: [http]
  }
</script>