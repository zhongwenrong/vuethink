<template>
  <div style="min-width:989px;background:white;box-shadow:0 0 5px #F3F3F3;">
    <!-- 头部图片部分 -->
      <div class="userimg">
        <span class="imgset"></span>
        <span class="setmore">
          <span v-show="!editrealname" @click="showeditname">{{realname}}</span>
          <input v-show="editrealname" v-focus="focusState" v-model="realname" placeholder="请输入内容" :maxlength="8" @blur="updateReal" style="width:225px;font-size:24px;background-color: #fff;background-image: none;border-radius: 4px;border: 1px solid #bfcbd9;padding: 3px 10px;"></input>
          <img @click="showeditname" src="../../../assets/images/bi.png" style="width:28px;margin-left:20px; vertical-align: middle;">
        </span> 
      </div>
    <!-- 头部图片部分END -->

    <!-- 分页tab -->
      <el-tabs v-model="activeName" style="width:90%;min-height:700px;margin:0 auto; background:white;">
        <el-tab-pane label="签订合同" name="hetong">
          <div style="width:100%;" v-show="showreset">
                <p style="margin-left:20px"><span style='display:inline-block;width:80px;'>姓名：</span> <el-input v-model="htname" style="width:200px;" placeholder="请输入姓名（必须是中文）" ></el-input> </p>
                <p style="margin-left:20px"><span style='display:inline-block;width:80px;'>手机号：</span> <el-input v-model="htphone" style="width:200px;" placeholder="请输入手机号"></el-input> </p>
                <p style="margin-left:20px"><span style='display:inline-block;width:80px;'>身份证号：</span> <el-input v-model="htid_card" style="width:200px;" placeholder="请输身份证号"></el-input> </p>
                <el-button style="margin-left:120px;margin-top:20px;" type="primary" @click="htinfoset(1)">提交</el-button>
          </div>

          <div style="width:100%;" v-show="showreset2">
                <p style="margin-left:20px;margin-top:40px;"><span style='display:inline-block;width:80px;'>姓名：</span> {{htname}} </p>
                <p style="margin-left:20px;margin-top:40px;"><span style='display:inline-block;width:80px;'>手机号：</span> {{htphone}} </p>
                <p style="margin-left:20px;margin-top:40px;"><span style='display:inline-block;width:80px;'>身份证号：</span> {{htid_card}} </p>
                <el-button style="margin-left:60px;margin-top:40px;" type="primary"  @click="suremore">点击签订合同</el-button>
                <p style="margin-left:60px;margin-top:40px;">信息不对？ <span style="color:#20a0ff;cursor:pointer;" @click="htinfoset(2)">去修改</span></p>
                <form id='zqwssubmit' name='zqwssubmit' :action='htfrom.fromurl'  method='post' >
                    <input type='hidden' name='zqid' :value='htfrom.zqid'/>
                    <input type='hidden' name='no' :value='htfrom.no'/>
                    <input type='hidden' name='user_code' :value='htfrom.user_code'/>
                    <input type='hidden' name='sign_type' :value='htfrom.sign_type'/>
                    <input type='hidden' name='return_url' :value='htfrom.return_url'/>
                    <input type='hidden' name='notify_url' :value='htfrom.notify_url'/>
                    <input type='hidden' name='sign_val' :value='htfrom.sign_val'/>
                    <input type='submit' value='确认' style='display:none;'>
		            </form>
          </div>

          <div style="width:100%;margin-top:40px;" v-show="lasthetong">
              <el-button type="primary" @click="downloadht" :loading="isLoadinght">查看合同</el-button>
          </div>
        </el-tab-pane>
        <!-- 交易密码 -->
        <el-tab-pane label="交易密码" name="first" :disabled="allowclick">
            <div style="width:100%;">
            <p style="padding:10px 0;"> 
              <span style="margin-left: 20px;" >交易密码</span>   
              <el-switch style="margin-left: 30px;" v-model="value" on-text="" off-text="" @change='aabb()'></el-switch> 
            </p>
            <p style="padding:10px 0;"> 
              <span style="margin-left: 20px;" v-if="this.value==true" >设置密码</span>   
              <el-input style="margin-left: 30px;" type="password"  class="w-200" v-model="password" :maxlength='6' placeholder="请输入密码（要求全是数字）"  v-if="this.value==true" ></el-input> 
            </p>
            <p style="padding:10px 0;"> 
              <span style="margin-left: 20px;" v-if="this.value==true">确定密码</span>   
              <el-input style="margin-left: 30px;" type="password"  class="w-200" v-model="checkpassword" :maxlength='6' placeholder="请再次输入密码" v-if="this.value==true" ></el-input>
            </p>
            <el-button v-if="this.value==true" style="width:100px;height:40px;border-radius:0;margin-left:100px;margin-top:20px;"  type="primary" @click='updateSys'>确定</el-button>
            </div>
        </el-tab-pane>
        <!-- 交易密码END --> 

        <!-- H5设置 -->
        <el-tab-pane label="H5设置" name="second" v-if="allowclick == false">
          <span slot="label">
              <el-dropdown trigger="click"  @command="handleCommand">
                <span class="el-dropdown-link" style="display:block;">
                    H5设置<i class="el-icon-caret-bottom el-icon--right"></i>
                </span>
                <el-dropdown-menu slot="dropdown">
                  <el-dropdown-item command="1">基本信息（默认）</el-dropdown-item>
                  <el-dropdown-item command="3">认证信息</el-dropdown-item>
                </el-dropdown-menu>
              </el-dropdown>
          </span>

          <div v-if="h5tab=='1'">
              <p  style="margin-left: 20px;">基本信息</p>
            <el-form :model="form" label-position="left" label-width="100px"  style="margin-left: 8px;">
              <el-form-item label="手机" style="margin-left:13px;">
                <el-radio-group v-model="form.phone">
                  <el-radio label="1" >需要</el-radio>
                  <el-radio label="2" >不需要</el-radio>
                </el-radio-group>
              </el-form-item>

              <el-form-item label="姓名" style="margin-left:13px;">
                <el-radio-group v-model="form.name">
                  <el-radio label="1" >需要</el-radio>
                  <el-radio label="2" >不需要</el-radio>
                </el-radio-group>
              </el-form-item>

              <el-form-item label="芝麻分" style="margin-left:13px;">
                <el-radio-group v-model="form.zhima">
                  <el-radio label="1" >需要</el-radio>
                  <el-radio label="2" >不需要</el-radio>
                </el-radio-group>
              </el-form-item>

              <el-form-item label="身份证号" style="margin-left:13px;">
                <el-radio-group v-model="form.IDcard">
                  <el-radio label="1" >需要</el-radio>
                  <el-radio label="2" >不需要</el-radio>
                </el-radio-group>
              </el-form-item>

              <el-form-item label="QQ" style="margin-left:13px;">
                <el-radio-group v-model="form.qq">
                  <el-radio label="1" >需要</el-radio>
                  <el-radio label="2" >不需要</el-radio>
                </el-radio-group>
              </el-form-item>

              <el-form-item label="微信" style="margin-left:13px;">
                <el-radio-group v-model="form.WeChat">
                  <el-radio label="1" >需要</el-radio>
                  <el-radio label="2" >不需要</el-radio>
                </el-radio-group>
              </el-form-item>

              <el-form-item label="所在地区" style="margin-left:13px;">
                <el-radio-group v-model="form.province">
                  <el-radio label="1" >需要</el-radio>
                  <el-radio label="2" >不需要</el-radio>
                </el-radio-group>
              </el-form-item>

              <el-form-item label="详细地址" style="margin-left:13px;">
                <el-radio-group v-model="form.detail_address">
                  <el-radio label="1" >需要</el-radio>
                  <el-radio label="2" >不需要</el-radio>
                </el-radio-group>
              </el-form-item>

              <el-form-item label="公司名称" style="margin-left:13px;">
                <el-radio-group v-model="form.company_name">
                  <el-radio label="1" >需要</el-radio>
                  <el-radio label="2" >不需要</el-radio>
                </el-radio-group>
              </el-form-item>

              <el-form-item label="公司地址" style="margin-left:13px;">
                <el-radio-group v-model="form.company_address">
                  <el-radio label="1" >需要</el-radio>
                  <el-radio label="2" >不需要</el-radio>
                </el-radio-group>
              </el-form-item>

              <el-form-item label="公司电话" style="margin-left:13px;">
                <el-radio-group v-model="form.company_phone">
                  <el-radio label="1" >需要</el-radio>
                  <el-radio label="2" >不需要</el-radio>
                </el-radio-group>
              </el-form-item>

              <el-form-item label="月收入" style="margin-left:13px;">
                <el-radio-group v-model="form.wages">
                  <el-radio label="1" >需要</el-radio>
                  <el-radio label="2" >不需要</el-radio>
                </el-radio-group>
              </el-form-item>
          
              <el-form-item>
                <el-button style="width:80px;height:40px;border-radius:0;" type="primary" @click='add()'>确定</el-button>
                <el-button style="width:80px;height:40px;border-radius:0;margin-left:30px;" >重置</el-button>
              </el-form-item>
            </el-form>
          </div>


          <div v-else>
             <p  style="margin-left: 20px;">认证信息</p>
            <el-form  :model="form3" label-position="left" label-width="100px"  style="margin-left: 8px;">
              <el-form-item label="身份证正面" style="margin-left:13px;">
                <el-radio-group v-model="form3.IDcard_positive">
                  <el-radio label="1" >需要</el-radio>
                  <el-radio label="2" >不需要</el-radio>
                </el-radio-group>
              </el-form-item>

              <el-form-item label="身份证反面" style="margin-left:13px;">
                <el-radio-group v-model="form3.IDcard_back">
                  <el-radio label="1" >需要</el-radio>
                  <el-radio label="2" >不需要</el-radio>
                </el-radio-group>
              </el-form-item>

              <el-form-item label="身份证手持" style="margin-left:13px;">
                <el-radio-group v-model="form3.IDcard_Handheld">
                  <el-radio label="1" >需要</el-radio>
                  <el-radio label="2" >不需要</el-radio>
                </el-radio-group>
              </el-form-item>

              <el-form-item label="运营商认证" style="margin-left:13px;">
                <el-radio-group v-model="form3.operator">
                  <el-radio label="1" >需要</el-radio>
                  <el-radio label="2" >不需要</el-radio>
                </el-radio-group>
              </el-form-item>

              <el-form-item>
                <el-button style="width:80px;height:40px;border-radius:0;" type="primary" @click='add3()'>确定</el-button>
                <el-button style="width:80px;height:40px;border-radius:0;margin-left:30px;" >重置</el-button>
              </el-form-item>
            </el-form>
          </div>

        </el-tab-pane>
        <!-- H5设置END -->
        <!-- 电销设置 -->
        <!-- <el-tab-pane label="电销设置" name="third" > -->



        <!-- 订单上限设置 -->
         <el-tab-pane label="流量设置" name="third" :disabled="allowclick">
            <div style="width:100%;">
            <el-form :model="form4" label-position="left" label-width="150px"  style="margin-left: 8px;">
            <!-- <p style="padding:10px 0;"> 
              <span style="margin-left: 20px;" v-if="this.value==true" >设置密码</span>   
              <el-input style="margin-left: 30px;" type="password"  class="w-200" v-model="password" :maxlength='6' placeholder="请输入密码（要求全是数字）" ></el-input> 
            </p> -->
<!--             <el-form-item label="订单设置"  style="margin-left:13px;" prop="t_value">
              <el-switch v-model="form4.t_value" on-text="" off-text="" @change='aacc()'></el-switch> 
            </el-form-item> -->
            <div style="margin:40px 0;">
              <span style="display: block;float: left;margin-left:13px;font-size:14px;color: #48576a;width:150px;">今日预定订单</span><span style="font-size:15px;color: #48576a;">{{form4.intro_limit}}单</span>
            </div>
            <div >
            <el-form-item label="明日预定订单"  style="margin-left:13px;" prop="INTRODUCE_LIMIT" >
              <el-input v-model="form4.INTRODUCE_LIMIT" class="h-40 w-200"></el-input>
             </el-form-item>
            </div>
            <div style="margin:40px 0;">
              <span style="margin-left:13px;color: #48576a;font-weight: bold;">只能提前预定次日流量，当天修改无效，最迟修改时间为当天18:00前</span>
            </div>
            <el-form-item style="margin-top:50px;">
                  <el-button style="width:80px;height:40px;border-radius:0;" type="primary"  :loading="showload" @click='add4()'>确定</el-button>
                  <el-button style="width:80px;height:40px;border-radius:0;margin-left:30px;" >重置</el-button>
              </el-form-item>
            </el-form>
          </div>
          
        </el-tab-pane>
        <!-- 订单上限设置END -->


        <!-- 添加QQ -->
        <el-tab-pane label="添加QQ" name="fours" :disabled="allowclick">
            <div style="width:100%;">
                <p style="margin-left:20px">添加QQ</p>
                <p style="margin-left:20px"><span style='color:#9E9E9E;'>微信1：</span> <el-input v-model="qq3" style="width:200px;" ></el-input> </p>
                <p style="margin-left:20px"><span style='color:#9E9E9E;'>微信2：</span> <el-input v-model="qq4" style="width:200px;" ></el-input> </p>
                <p style="margin-left:20px"><span style='color:#9E9E9E;'>QQ1：&nbsp;&nbsp;</span> <el-input v-model="qq1" style="width:200px;" ></el-input> </p>
                <p style="margin-left:20px"><span style='color:#9E9E9E;'>QQ2：&nbsp;&nbsp;</span> <el-input v-model="qq2" style="width:200px;" ></el-input> </p>
                <el-button style="width:80px;height:40px;border-radius:0;margin-left:120px;margin-top:20px;" type="primary" @click='add5()'>确定</el-button>
            </div>
        </el-tab-pane>
        <!-- 添加QQEND -->

        <el-tab-pane label="认证配置" name="fifth" :disabled="allowclick">
          <div>
              <p  style="margin-left: 20px;">基本信息</p>
            <el-form :model="form5" label-position="left" label-width="100px"  style="margin-left: 8px;">
              <el-form-item label="基本信息" style="margin-left:13px;">
                <el-radio-group v-model="form5.BASE_STAUES">
                  <el-radio label="1" >需要</el-radio>
                  <el-radio label="2" >不需要</el-radio>
                </el-radio-group>
              </el-form-item>

              <el-form-item label="身份认证" style="margin-left:13px;">
                <el-radio-group v-model="form5.IDCARD_STAUES">
                  <el-radio label="1" >需要</el-radio>
                  <el-radio label="2" >不需要</el-radio>
                </el-radio-group>
              </el-form-item>

              <el-form-item label="运营商认证" style="margin-left:13px;">
                <el-radio-group v-model="form5.OPERATE_STAUES">
                  <el-radio label="1" >需要</el-radio>
                  <el-radio label="2" >不需要</el-radio>
                </el-radio-group>
              </el-form-item>

              <el-form-item label="通讯录认证" style="margin-left:13px;">
                <el-radio-group v-model="form5.MESSAGE_STAUES">
                  <el-radio label="1" >需要</el-radio>
                  <el-radio label="2" >不需要</el-radio>
                </el-radio-group>
              </el-form-item>

              <el-form-item label="无忧负债" style="margin-left:13px;">
                <el-radio-group v-model="form5.WY_STAUES">
                  <el-radio label="1" >需要</el-radio>
                  <el-radio label="2" >不需要</el-radio>
                </el-radio-group>
              </el-form-item>

              <el-form-item label="今借到负债" style="margin-left:13px;">
                <el-radio-group v-model="form5.JJD_STAUES">
                  <el-radio label="1" >需要</el-radio>
                  <el-radio label="2" >不需要</el-radio>
                </el-radio-group>
              </el-form-item>
          
              <el-form-item>
                <el-button style="width:80px;height:40px;border-radius:0;" type="primary" @click='add6()'>确定</el-button>
                <el-button style="width:80px;height:40px;border-radius:0;margin-left:30px;" >重置</el-button>
              </el-form-item>
            </el-form>
          </div>
          
         
        </el-tab-pane>
        <!-- 电销设置END -->

        <!-- 逾期费 -->
        <el-tab-pane label="逾期费设置" name="sixth" :disabled="allowclick">
            <div style="width:100%;">
               <el-form :model="form6" label-position="left" label-width="150px"  style="margin-left: 8px;" v-if="overdue_type==1">
                <div >
                <el-form-item label="逾期费率（日）"  style="margin-left:13px;margin-top:40px" prop="overdue_limit" >
                  <el-input v-model="form6.overdue_limit" class="h-40 w-150"></el-input>
                 </el-form-item>
                </div>
                <div style="margin:40px 0;">
                  <span style="margin-left:13px;color: #48576a;font-weight: bold;">逾期费 = 应还金额 x 逾期费率（日）x 天数</span>
                </div>
                <div style="margin:20px 0;">
                  <span style="margin-left:13px;color: #48576a;font-weight: bold;">例：逾期费 = 1000 x 0.05（日）x 7 = 350</span>
                </div>
                <el-form-item style="margin-top:50px;">
                      <el-button style="width:80px;height:40px;border-radius:0;" type="primary"  :loading="showload" @click='add7()'>确定</el-button>
                      <el-button style="width:80px;height:40px;border-radius:0;margin-left:30px;" >重置</el-button>
                  </el-form-item>
                </el-form>
                <el-form :model="form6" label-position="left" label-width="150px"  style="margin-left: 8px;" v-else>
                <div >
                <el-form-item label="逾期费（日）"  style="margin-left:13px;margin-top:40px" prop="overdue_limit" >
                  <el-input v-model="form6.overdue_limit" class="h-40 w-150"></el-input> &nbsp;&nbsp;元 
                 </el-form-item>
                </div>
                <div style="margin:50px 0;">
                  <span style="margin-left:13px;color: #48576a;font-weight: bold;">逾期费 = 逾期费（日） x 天数</span>
                </div>
                <el-form-item style="margin-top:50px;">
                      <el-button style="width:80px;height:40px;border-radius:0;" type="primary"  :loading="showload" @click='add7()'>确定</el-button>
                      <el-button style="width:80px;height:40px;border-radius:0;margin-left:30px;" >重置</el-button>
                  </el-form-item>
                </el-form>
            </div>
        </el-tab-pane>
        <!-- 逾期费END -->
      </el-tabs>
    </div>
</template>
<script>
  import http from '../../../assets/js/http'

  export default {
    data () {
      return {
        activeName:'first',
        value:'',
        h5tab:'1',
        rt:'',
        form: {
          phone: '',
          name: '',
          zhima: '',
          IDcard: '',
          qq: '',
          WeChat: '',
          province: '',
          detail_address: '',
          company_name: '',
          company_address: '',
          company_phone: '',
          wages: ''
          
        },
         form3: {
          IDcard_positive: '',
          IDcard_back: '',
          IDcard_Handheld: '',
          operator: ''
        },
         form4: {
          INTRODUCE_LIMIT: '',
          intro_limit:''
        },
         form5: {
          BASE_STAUES: '',
          MESSAGE_STAUES: '',
          OPERATE_STAUES: '',
          IDCARD_STAUES: '',
          WY_STAUES: '',
          JJD_STAUES: ''
        },
        overdue_type: '',
        form6: {
          
          overdue_limit: '',
        },
        password:'',
        checkpassword:'',
        realname:'未设置',
        realname2:'未设置',
        editrealname:false,
        focusState:false,
        qq1:'',
        qq2:'',
        qq3:'',
        qq4:'',
        showload: false,
        htname:'',
        htphone:'',
        htid_card:'',
        showreset:true,
        showreset2:false,
        lasthetong:false,
        allowclick:true,
        htfrom:{
          fromurl:'',
          zqid:'',
          no:'',
          user_code:'',
          sign_type:'',
          return_url:'',
          notify_url:'',
          sign_val:'',
        },
        isLoadinght:false,
      }
    },
    mounted(){
       _g.closeGlobalLoading();
       if(Lockr.get('contract')==0){
         this.activeName = 'hetong'
         this.lasthetong=false
       }else{
         this.showreset=false
         this.showreset2=false
         this.lasthetong=true
         this.allowclick = false
       }
    },
    beforeRouteLeave (to, from , next) {
        if(to.path == '/Index/admin/index'||to.path == '/'){
          next()
        }else{
          if (Lockr.get('contract') == 0) {
            _g.closeGlobalLoading();
            _g.toastMsg('error', '请输先签订合同！')
            router.push('/Index/admin/userplace')
          } else {
            next()
          }
        }
    },
    methods: {
      showreset2div(){
          this.apiGet('admin/Userinfo/read').then((res) => {
            let data = res.data
            if(res.code==200){
                 if(Lockr.get('contract')==0){
                    if(data.realname!=''&&data.phone!=''&&data.idNumber!=''){
                      this.showreset=false
                      this.showreset2=true
                      this.htname = data.realname
                      this.htphone = data.phone
                      this.htid_card = data.idNumber
                  }else{
                      this.showreset=true
                      this.showreset2=false
                  }
                }else{
                      this.showreset=false
                      this.showreset2=false
                      this.lasthetong=true
                }
            }else{
                this.showreset=true
                this.showreset2=false
                this.lasthetong=false
                this.activeName = 'hetong'
            }
        })
      },
      suremore(){
        this.apiGet('admin/contract/addUser').then((data) => {
            this.showreset = false;
            this.showreset2 = false; 
            this.lasthetong = true;
            this.htfrom.fromurl = data.url
            this.htfrom.zqid = data.list.zqid
            this.htfrom.no = data.list.no
            this.htfrom.user_code = data.list.user_code
            this.htfrom.sign_type = data.list.sign_type
            this.htfrom.return_url = data.list.return_url
            this.htfrom.notify_url = data.list.notify_url
            this.htfrom.sign_val = data.list.sign_val
            setTimeout(() => {
              document.forms['zqwssubmit'].submit()
            },1000);
        })
      },
      htinfoset(val){
        if(val==1){
          if(this.htname==''){
            _g.toastMsg('warning', '请输入姓名')
            return
          }
          if(this.htphone==''){
            _g.toastMsg('warning', '请输入手机号')
            return
          }
          if(this.htid_card==''){
            _g.toastMsg('warning', '请输入身份证号')
            return
          }
          let htdata = {
            realname:this.htname,
            phone:this.htphone,
            idNumber:this.htid_card,
          }
          this.apiPost('admin/Userinfo/update', htdata).then((res) => {
              this.handelResponse(res, (data) => {
                this.showreset = !this.showreset
                this.showreset2 = !this.showreset2
                 _g.toastMsg('success', data)
              }, () => {
                _g.toastMsg('error', res.error)
              })
        })
        }
        if(val==2){
            this.showreset = !this.showreset; 
            this.showreset2 = !this.showreset2; 
        }
      },
      downloadht(){
        this.isLoadinght = !this.isLoadinght
        this.apiGet('admin/contract/download').then((res) => {
            // window.location.href = res
            window.open(res)
            this.isLoadinght = !this.isLoadinght
        })
      },
      showeditname(){
        this.editrealname = true
        setTimeout(()=>{
          this.focusState = true
        },20)
      },
      updateReal(){
        if (this.realname == this.realname2) {
          this.editrealname = false
          this.focusState = false
          return
        }
        const data = {
          realname: this.realname
        }
        this.apiPost('admin/CompanyConfig/updateReal', data).then((res) => {
              this.handelResponse(res, (data) => {
                _g.toastMsg('success', '修改成功')
                this.isLoading = !this.isLoading
                this.getAllList()
              }, () => {
                this.isLoading = !this.isLoading
              })
        })
        this.editrealname = false
        this.focusState = false
      },
      aabb(){
        this.isLoading = !this.isLoading
            this.apiPost('admin/CompanyConfig/aabb', this.value).then((res) => {
              this.handelResponse(res, (data) => {
                _g.toastMsg('success', '关闭成功')
                this.isLoading = !this.isLoading
              }, () => {
                this.isLoading = !this.isLoading
              })
            })
      },
      // aacc(){
      //   this.isLoading = !this.isLoading
      //       this.apiPost('admin/CompanyConfig/aabb', this.form4).then((res) => {
      //         this.handelResponse(res, (data) => {
      //           _g.toastMsg('success', '关闭成功')
      //           // this.isLoading = !this.isLoading
      //           // this.form4.INTRODUCE_LIMIT = 0;
      //         }, () => {
      //           // this.isLoading = !this.isLoading
      //           this.form4.INTRODUCE_LIMIT = 0;
      //           if(!this.form4.t_value){
      //             this.getSys()
      //           }
      //         })
      //       })
      // },
      add() {
            this.isLoading = !this.isLoading
            this.apiPost('admin/CompanyConfig/update', this.form).then((res) => {
              this.handelResponse(res, (data) => {
                _g.toastMsg('success', '提交成功')
                this.isLoading = !this.isLoading
              }, () => {
                this.isLoading = !this.isLoading
              })
            })
      },
      add3() {
            this.isLoading = !this.isLoading
            this.apiPost('admin/CompanyConfig/update', this.form3).then((res) => {
              this.handelResponse(res, (data) => {
                _g.toastMsg('success', '提交成功')
                this.isLoading = !this.isLoading
              }, () => {
                this.isLoading = !this.isLoading
              })
            })
      },
      add4() {
            _g.openGlobalLoading()
            this.apiPost('admin/CompanyConfig/updateTem', this.form4).then((res) => {
            _g.closeGlobalLoading()
              this.handelResponse(res, (data) => {
                _g.toastMsg('success', '提交成功')
                // this.isLoading = !this.isLoading
              }, () => {
                this.getSys()
              })
            })
      },
      add5() {
            const data = {
              qq1:this.qq1,
              qq2:this.qq2,
              qq3:this.qq3,
              qq4:this.qq4
            }
            this.apiPost('admin/CompanyConfig/updateQQ',data).then((res) => {
              this.handelResponse(res, (data) => {
                _g.toastMsg('success', '提交成功')
                this.isLoading = !this.isLoading
              }, () => {
                this.isLoading = !this.isLoading
              })
            })
      },
      add6() {
            this.isLoading = !this.isLoading
            this.apiPost('admin/CompanyConfig/updateTem', this.form5).then((res) => {
              this.handelResponse(res, (data) => {
                _g.toastMsg('success', '提交成功')
                this.isLoading = !this.isLoading
              }, () => {
                this.isLoading = !this.isLoading
              })
            })
      },
      add7() {
            this.isLoading = !this.isLoading
            this.apiPost('admin/CompanyConfig/updateTem', this.form6).then((res) => {
              this.handelResponse(res, (data) => {
                _g.toastMsg('success', '提交成功')
                this.isLoading = !this.isLoading
              }, () => {
                this.isLoading = !this.isLoading
              })
            })
      },
      getAllList() {
        this.loading = true
        const data = {
          params: {

          }
        }
        this.apiPost('admin/CompanyConfig/getConfigs', data).then((res) => {
          this.handelResponse(res, (data) => {
            this.form.phone = data.phone,
            this.form.name = data.name,
            this.form.zhima = data.zhima,
            this.form.IDcard = data.IDcard,
            this.form.qq = data.qq,
            this.form.WeChat = data.WeChat,
            this.form.province = data.province,
            this.form.detail_address = data.detail_address,
            this.form.company_name = data.company_name,
            this.form.company_address = data.company_address,
            this.form.company_phone = data.company_phone,
            this.form.wages = data.wages,
            this.form3.IDcard_positive = data.IDcard_positive,
            this.form3.IDcard_back = data.IDcard_back,
            this.form3.IDcard_Handheld = data.IDcard_Handheld,
            this.form3.operator = data.operator
            if (data.realname) {
              this.realname = data.realname
              this.realname2 = data.realname
            }
          })
        })
      },
      getList() {
        this.loading = true
        const data = {
          params: {

          }
        }
        this.apiPost('admin/CompanyConfig/getSysList', data).then((res) => {
          this.handelResponse(res, (data) => {
            this.value = data
            // console.log(this.value)
          })
        })
      },
      getQQ() {
        this.loading = true
        const data = {
          params: {

          }
        }
        this.apiPost('admin/CompanyConfig/getQQ', data).then((res) => {
          this.handelResponse(res, (data) => {
            this.qq1 = data[0],
            this.qq2 = data[1],
            this.qq3 = data[2],
            this.qq4 = data[3]
            // console.log(this.value)
          })
        })
      },
      getSys() {
        this.loading = true
        const data = {
          params: {

          }
        }
        this.apiPost('admin/CompanyConfig/getSys', data).then((res) => {
          this.handelResponse(res, (data) => {
            this.form5.BASE_STAUES = data.BASE_STAUES,
            this.form5.MESSAGE_STAUES = data.MESSAGE_STAUES,
            this.form5.OPERATE_STAUES = data.OPERATE_STAUES,
            this.form5.IDCARD_STAUES = data.IDCARD_STAUES,
            this.form5.WY_STAUES = data.WY_STAUES,
            this.form4.intro_limit = data.intro_limit,
            this.form4.INTRODUCE_LIMIT = data.INTRODUCE_LIMIT,
            this.form5.JJD_STAUES = data.JJD_STAUES,
            this.overdue_type = data.OVERDUE_TYPE,
            this.form6.overdue_limit = data.OVERDUE_LIMIT
          })
        })
      },
      handleCommand(command) {
        this.h5tab = command
      },
      init() {
        this.getAllList(),
        this.getList(),
        this.getSys(),
        this.getQQ(),
        this.showreset2div()
      },
      updateSys(){
        if(this.value){
          if (this.password == "") {
            _g.toastMsg('warning', "交易密码不能为空！")
            return
          }
          if (this.checkpassword == "") {
            _g.toastMsg('warning', "确认密码不能为空！")
            return
          }
          if(this.password.length !==6 || this.checkpassword.length !== 6){
            _g.toastMsg('warning', "密码长度必须是6位数！")
            return
          }
          if(isNaN(this.password) || isNaN(this.checkpassword)){
            _g.toastMsg('warning', "密码必须是数字！")
            return
          }
          if(this.password !== this.checkpassword){
            _g.toastMsg('warning', "两次密码输入不一致！")
            return
          }
        }
        
        const data = {
          password: this.password,
          checkpassword:this.checkpassword,
          value: this.value
        }
        this.apiPost('admin/CompanyConfig/updateSys', data).then((res) => {
          this.handelResponse(res, (data) => {
            _g.toastMsg('success', "交易密码设置成功！")
            this.password = ''
            this.checkpassword = ''
          })
        })
      }
    },
    created() {
      this.init()
    },
    directives: {
      focus: {
        update: function (el, {value}) {
          if (value) {
            el.focus()
          }
        }
      }
    },
    mixins: [http]
  }
</script>

<style scoped>
.userimg{width: 90%;margin: 0px auto; padding: 50px 0; }
.imgset{display: inline-block;width: 100px;height: 100px; background: url('../../../assets/images/bg1.jpg') no-repeat;background-size: 100% 100%; border-radius:50%;overflow: hidden;}
.setmore{cursor: pointer; display: inline-block;vertical-align: middle;margin-top:-90px; margin-left: 50px;font-size: 28px;}
.el-form-item__label {text-align: left !important;}
</style>
