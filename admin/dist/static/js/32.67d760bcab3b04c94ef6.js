webpackJsonp([32,34],{6:function(t,e,n){"use strict";function o(t){var e,n;this.promise=new t(function(t,o){if(void 0!==e||void 0!==n)throw TypeError("Bad Promise constructor");e=t,n=o}),this.resolve=r(e),this.reject=r(n)}var r=n(11);t.exports.f=function(t){return new o(t)}},13:function(t,e,n){var o=n(10),r=n(2)("toStringTag"),i="Arguments"==o(function(){return arguments}()),a=function(t,e){try{return t[e]}catch(t){}};t.exports=function(t){var e,n,s;return void 0===t?"Undefined":null===t?"Null":"string"==typeof(n=a(e=Object(t),r))?n:i?o(e):"Object"==(s=o(e))&&"function"==typeof e.callee?"Arguments":s}},14:function(t,e){t.exports=function(t){try{return{e:!1,v:t()}}catch(t){return{e:!0,v:t}}}},15:function(t,e,n){var o=n(5),r=n(20),i=n(6);t.exports=function(t,e){if(o(t),r(e)&&e.constructor===t)return e;var n=i.f(t),a=n.resolve;return a(e),n.promise}},16:function(t,e,n){var o=n(5),r=n(11),i=n(2)("species");t.exports=function(t,e){var n,a=o(t).constructor;return void 0===a||void 0==(n=o(a)[i])?e:r(n)}},17:function(t,e,n){var o,r,i,a=n(12),s=n(27),c=n(47),u=n(46),f=n(3),l=f.process,v=f.setImmediate,d=f.clearImmediate,h=f.MessageChannel,p=f.Dispatch,m=0,g={},_="onreadystatechange",y=function(){var t=+this;if(g.hasOwnProperty(t)){var e=g[t];delete g[t],e()}},b=function(t){y.call(t.data)};v&&d||(v=function(t){for(var e=[],n=1;arguments.length>n;)e.push(arguments[n++]);return g[++m]=function(){s("function"==typeof t?t:Function(t),e)},o(m),m},d=function(t){delete g[t]},"process"==n(10)(l)?o=function(t){l.nextTick(a(y,t,1))}:p&&p.now?o=function(t){p.now(a(y,t,1))}:h?(r=new h,i=r.port2,r.port1.onmessage=b,o=a(i.postMessage,i,1)):f.addEventListener&&"function"==typeof postMessage&&!f.importScripts?(o=function(t){f.postMessage(t+"","*")},f.addEventListener("message",b,!1)):o=_ in u("script")?function(t){c.appendChild(u("script"))[_]=function(){c.removeChild(this),y.call(t)}}:function(t){setTimeout(a(y,t,1),0)}),t.exports={set:v,clear:d}},19:function(t,e,n){"use strict";function o(t){return t&&t.__esModule?t:{default:t}}Object.defineProperty(e,"__esModule",{value:!0});var r=n(21),i=o(r),a={methods:{apiGet:function(t,e){return new i.default(function(n,o){axios.get(t,e).then(function(t){n(t.data)},function(t){o(t),_g.closeGlobalLoading(),bus.$message({message:"请求超时，请检查网络",type:"warning"})})})},apiPost:function(t,e){return new i.default(function(n,o){axios.post(t,e).then(function(t){n(t.data)}).catch(function(t){console.log("f",t),n(t),bus.$message({message:"请求超时，请检查网络",type:"warning"})})})},apiPostForExport:function(t,e){return axios.post(t,e,{responseType:"arraybuffer"})},apiDelete:function(t,e){return new i.default(function(n,o){axios.delete(t+e).then(function(t){n(t.data)},function(t){o(t),_g.closeGlobalLoading(),bus.$message({message:"请求超时，请检查网络",type:"warning"})})})},apiPut:function(t,e,n){return new i.default(function(o,r){axios.put(t+e,n).then(function(t){o(t.data)},function(t){_g.closeGlobalLoading(),bus.$message({message:"请求超时，请检查网络",type:"warning"}),r(t)})})},handelResponse:function(t,e,n){_g.closeGlobalLoading(),200==t.code?e(t.data):("function"==typeof n&&n(),this.handleError(t))},handleError:function(t){var e=this;if(t.code)switch(t.code){case 101:if(console.log("cookie = ",Cookies.get("rememberPwd")),Cookies.get("rememberPwd")){var n={rememberKey:Lockr.get("rememberKey")};this.reAjax("admin/base/relogin",n).then(function(t){e.handelResponse(t,function(t){e.resetCommonData(t)})})}else _g.toastMsg("error",t.error),setTimeout(function(){router.replace("/")},1500);break;case 103:_g.toastMsg("error",t.error),setTimeout(function(){router.replace("/")},1500);break;default:_g.toastMsg("error",t.error)}else console.log("default error")},resetCommonData:function(t){var e=this;_(t.menusList).forEach(function(t,e){0==e?t.selected=!0:t.selected=!1}),Lockr.set("menus",t.menusList),Lockr.set("authKey",t.authKey),Lockr.set("rememberKey",t.rememberKey),Lockr.set("authList",t.authList),Lockr.set("userInfo",t.userInfo),Lockr.set("sessionId",t.sessionId),window.axios.defaults.headers.authKey=Lockr.get("authKey");var n="";n=t.menusList[0].url?t.menusList[0].url:t.menusList[0].child[0].child[0].url,setTimeout(function(){var t=e.$route.path;n!=t?router.replace(n):_g.shallowRefresh(e.$route.name)},1e3)},reAjax:function(t,e){return new i.default(function(n,o){axios.post(t,e).then(function(t){n(t.data)},function(t){o(t),bus.$message({message:"请求超时，请检查网络",type:"warning"})})})}},computed:{showLoading:function(){return store.state.globalLoading}}};e.default=a},21:function(t,e,n){t.exports={default:n(24),__esModule:!0}},24:function(t,e,n){n(49),n(50),n(51),n(36),n(37),n(38),t.exports=n(4).Promise},25:function(t,e){t.exports=function(t,e,n,o){if(!(t instanceof e)||void 0!==o&&o in t)throw TypeError(n+": incorrect invocation!");return t}},26:function(t,e,n){var o=n(12),r=n(29),i=n(28),a=n(5),s=n(48),c=n(35),u={},f={},e=t.exports=function(t,e,n,l,v){var d,h,p,m,g=v?function(){return t}:c(t),_=o(n,l,e?2:1),y=0;if("function"!=typeof g)throw TypeError(t+" is not iterable!");if(i(g)){for(d=s(t.length);d>y;y++)if(m=e?_(a(h=t[y])[0],h[1]):_(t[y]),m===u||m===f)return m}else for(p=g.call(t);!(h=p.next()).done;)if(m=r(p,_,h.value,e),m===u||m===f)return m};e.BREAK=u,e.RETURN=f},27:function(t,e){t.exports=function(t,e,n){var o=void 0===n;switch(e.length){case 0:return o?t():t.call(n);case 1:return o?t(e[0]):t.call(n,e[0]);case 2:return o?t(e[0],e[1]):t.call(n,e[0],e[1]);case 3:return o?t(e[0],e[1],e[2]):t.call(n,e[0],e[1],e[2]);case 4:return o?t(e[0],e[1],e[2],e[3]):t.call(n,e[0],e[1],e[2],e[3])}return t.apply(n,e)}},28:function(t,e,n){var o=n(22),r=n(2)("iterator"),i=Array.prototype;t.exports=function(t){return void 0!==t&&(o.Array===t||i[r]===t)}},29:function(t,e,n){var o=n(5);t.exports=function(t,e,n,r){try{return r?e(o(n)[0],n[1]):e(n)}catch(e){var i=t.return;throw void 0!==i&&o(i.call(t)),e}}},30:function(t,e,n){var o=n(2)("iterator"),r=!1;try{var i=[7][o]();i.return=function(){r=!0},Array.from(i,function(){throw 2})}catch(t){}t.exports=function(t,e){if(!e&&!r)return!1;var n=!1;try{var i=[7],a=i[o]();a.next=function(){return{done:n=!0}},i[o]=function(){return a},t(i)}catch(t){}return n}},31:function(t,e,n){var o=n(3),r=n(17).set,i=o.MutationObserver||o.WebKitMutationObserver,a=o.process,s=o.Promise,c="process"==n(10)(a);t.exports=function(){var t,e,n,u=function(){var o,r;for(c&&(o=a.domain)&&o.exit();t;){r=t.fn,t=t.next;try{r()}catch(o){throw t?n():e=void 0,o}}e=void 0,o&&o.enter()};if(c)n=function(){a.nextTick(u)};else if(!i||o.navigator&&o.navigator.standalone)if(s&&s.resolve){var f=s.resolve(void 0);n=function(){f.then(u)}}else n=function(){r.call(o,u)};else{var l=!0,v=document.createTextNode("");new i(u).observe(v,{characterData:!0}),n=function(){v.data=l=!l}}return function(o){var r={fn:o,next:void 0};e&&(e.next=r),t||(t=r,n()),e=r}}},32:function(t,e,n){var o=n(41);t.exports=function(t,e,n){for(var r in e)n&&t[r]?t[r]=e[r]:o(t,r,e[r]);return t}},33:function(t,e,n){"use strict";var o=n(3),r=n(4),i=n(42),a=n(40),s=n(2)("species");t.exports=function(t){var e="function"==typeof r[t]?r[t]:o[t];a&&e&&!e[s]&&i.f(e,s,{configurable:!0,get:function(){return this}})}},34:function(t,e,n){var o=n(3),r=o.navigator;t.exports=r&&r.userAgent||""},35:function(t,e,n){var o=n(13),r=n(2)("iterator"),i=n(22);t.exports=n(4).getIteratorMethod=function(t){if(void 0!=t)return t[r]||t["@@iterator"]||i[o(t)]}},36:function(t,e,n){"use strict";var o,r,i,a,s=n(43),c=n(3),u=n(12),f=n(13),l=n(9),v=n(20),d=n(11),h=n(25),p=n(26),m=n(16),g=n(17).set,_=n(31)(),y=n(6),b=n(14),x=n(34),w=n(15),k="Promise",L=c.TypeError,P=c.process,j=P&&P.versions,M=j&&j.v8||"",D=c[k],$="process"==f(P),E=function(){},T=r=y.f,F=!!function(){try{var t=D.resolve(1),e=(t.constructor={})[n(2)("species")]=function(t){t(E,E)};return($||"function"==typeof PromiseRejectionEvent)&&t.then(E)instanceof e&&0!==M.indexOf("6.6")&&x.indexOf("Chrome/66")===-1}catch(t){}}(),R=function(t){var e;return!(!v(t)||"function"!=typeof(e=t.then))&&e},C=function(t,e){if(!t._n){t._n=!0;var n=t._c;_(function(){for(var o=t._v,r=1==t._s,i=0,a=function(e){var n,i,a,s=r?e.ok:e.fail,c=e.resolve,u=e.reject,f=e.domain;try{s?(r||(2==t._h&&K(t),t._h=1),s===!0?n=o:(f&&f.enter(),n=s(o),f&&(f.exit(),a=!0)),n===e.promise?u(L("Promise-chain cycle")):(i=R(n))?i.call(n,c,u):c(n)):u(o)}catch(t){f&&!a&&f.exit(),u(t)}};n.length>i;)a(n[i++]);t._c=[],t._n=!1,e&&!t._h&&A(t)})}},A=function(t){g.call(c,function(){var e,n,o,r=t._v,i=I(t);if(i&&(e=b(function(){$?P.emit("unhandledRejection",r,t):(n=c.onunhandledrejection)?n({promise:t,reason:r}):(o=c.console)&&o.error&&o.error("Unhandled promise rejection",r)}),t._h=$||I(t)?2:1),t._a=void 0,i&&e.e)throw e.v})},I=function(t){return 1!==t._h&&0===(t._a||t._c).length},K=function(t){g.call(c,function(){var e;$?P.emit("rejectionHandled",t):(e=c.onrejectionhandled)&&e({promise:t,reason:t._v})})},O=function(t){var e=this;e._d||(e._d=!0,e=e._w||e,e._v=t,e._s=2,e._a||(e._a=e._c.slice()),C(e,!0))},B=function(t){var e,n=this;if(!n._d){n._d=!0,n=n._w||n;try{if(n===t)throw L("Promise can't be resolved itself");(e=R(t))?_(function(){var o={_w:n,_d:!1};try{e.call(t,u(B,o,1),u(O,o,1))}catch(t){O.call(o,t)}}):(n._v=t,n._s=1,C(n,!1))}catch(t){O.call({_w:n,_d:!1},t)}}};F||(D=function(t){h(this,D,k,"_h"),d(t),o.call(this);try{t(u(B,this,1),u(O,this,1))}catch(t){O.call(this,t)}},o=function(t){this._c=[],this._a=void 0,this._s=0,this._d=!1,this._v=void 0,this._h=0,this._n=!1},o.prototype=n(32)(D.prototype,{then:function(t,e){var n=T(m(this,D));return n.ok="function"!=typeof t||t,n.fail="function"==typeof e&&e,n.domain=$?P.domain:void 0,this._c.push(n),this._a&&this._a.push(n),this._s&&C(this,!1),n.promise},catch:function(t){return this.then(void 0,t)}}),i=function(){var t=new o;this.promise=t,this.resolve=u(B,t,1),this.reject=u(O,t,1)},y.f=T=function(t){return t===D||t===a?new i(t):r(t)}),l(l.G+l.W+l.F*!F,{Promise:D}),n(44)(D,k),n(33)(k),a=n(4)[k],l(l.S+l.F*!F,k,{reject:function(t){var e=T(this),n=e.reject;return n(t),e.promise}}),l(l.S+l.F*(s||!F),k,{resolve:function(t){return w(s&&this===a?D:this,t)}}),l(l.S+l.F*!(F&&n(30)(function(t){D.all(t).catch(E)})),k,{all:function(t){var e=this,n=T(e),o=n.resolve,r=n.reject,i=b(function(){var n=[],i=0,a=1;p(t,!1,function(t){var s=i++,c=!1;n.push(void 0),a++,e.resolve(t).then(function(t){c||(c=!0,n[s]=t,--a||o(n))},r)}),--a||o(n)});return i.e&&r(i.v),n.promise},race:function(t){var e=this,n=T(e),o=n.reject,r=b(function(){p(t,!1,function(t){e.resolve(t).then(n.resolve,o)})});return r.e&&o(r.v),n.promise}})},37:function(t,e,n){"use strict";var o=n(9),r=n(4),i=n(3),a=n(16),s=n(15);o(o.P+o.R,"Promise",{finally:function(t){var e=a(this,r.Promise||i.Promise),n="function"==typeof t;return this.then(n?function(n){return s(e,t()).then(function(){return n})}:t,n?function(n){return s(e,t()).then(function(){throw n})}:t)}})},38:function(t,e,n){"use strict";var o=n(9),r=n(6),i=n(14);o(o.S,"Promise",{try:function(t){var e=r.f(this),n=i(t);return(n.e?e.reject:e.resolve)(n.v),e.promise}})},597:function(t,e,n){"use strict";function o(t){return t&&t.__esModule?t:{default:t}}Object.defineProperty(e,"__esModule",{value:!0});var r=n(19),i=o(r);e.default={data:function(){return{loading:!1,formData:{is_open:{name:"is_open",title:"启用",value:1,type:"switch",disabled:!1},type:{name:"type",title:"类型",value:"",type:"select",options:[{value:1,title:"微信"},{value:2,title:"支付宝"},{value:3,title:"银行卡"},{value:4,title:"借贷宝"},{value:5,title:"钱脉"},{value:6,title:"今借到"},{value:7,title:"无忧"},{value:8,title:"米房"}],disabled:!1},bank:{name:"bank",title:"银行",value:"无",type:"text",disabled:!0},account:{name:"account",title:"账户",value:"",type:"text",disabled:!1},account_name:{name:"account_name",title:"账户名",value:"",type:"text",disabled:!1}}}},computed:{isBank:function(){return(16===this.formData.account.value.length||19===this.formData.account.value.length)&&3===this.formData.type.value},submitForm:function(){var t={};for(var e in this.formData)t[e]=this.formData[e].value;return t}},watch:{"formData.type.value":function(t){3===t?(this.$set(this.formData.bank,"disabled",!1),this.$set(this.formData.bank,"value","")):this.$set(this.formData.bank,"disabled",!0)},isBank:function(t){t&&this.getBankInfo()}},methods:{getBankInfo:function(){var t=this;this.apiPost("/admin/getBankInfo",{bank_id:this.submitForm.account}).then(function(e){200===e.code?t.$set(t.formData.bank,"value",e.data.bankName):_g.toastMsg("error",e.error)}).catch(function(t){_g.toastMsg("error",t)})},submit:function(){var t=this;this.apiPost("/admin/addLoanAccount",this.submitForm).then(function(e){200===e.code?(_g.toastMsg("success",e.data),t.$router.push("/loan/config/loanaccount")):_g.toastMsg("error",e.error)}).catch(function(t){_g.toastMsg("error",t)})}},mounted:function(){_g.closeGlobalLoading()},mixins:[i.default]}},1194:function(t,e,n){var o,r;o=n(597);var i=n(1235);r=o=o||{},"object"!=typeof o.default&&"function"!=typeof o.default||(r=o=o.default),"function"==typeof r&&(r=r.options),r.render=i.render,r.staticRenderFns=i.staticRenderFns,t.exports=o},1235:function(t,e){t.exports={render:function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"m-l-50 m-t-30 w-900"},[n("el-form",{ref:"form",attrs:{model:t.form,rules:t.rules,"label-width":"130px"}},[t._l(t.formData,function(e,o){return n("el-form-item",{attrs:{label:e.title,prop:t.name}},["switch"===e.type?n("el-switch",{attrs:{"active-color":"#13ce66","inactive-color":"#ff4949","active-value":1,"inactive-value":0},model:{value:e.value,callback:function(n){t.$set(e,"value",n)},expression:"item.value"}}):t._e(),t._v(" "),"text"===e.type?n("el-input",{staticClass:"h-40 w-200",attrs:{disabled:e.disabled},model:{value:e.value,callback:function(n){t.$set(e,"value","string"==typeof n?n.trim():n)},expression:"item.value"}}):t._e(),t._v(" "),"select"===e.type?n("el-select",{staticClass:"w-200",attrs:{placeholder:e.title},model:{value:e.value,callback:function(n){t.$set(e,"value",n)},expression:"item.value"}},t._l(e.options,function(t){return n("el-option",{attrs:{label:t.title,value:t.value}})})):t._e()],1)}),t._v(" "),n("el-form-item",[n("el-button",{attrs:{type:"primary",loading:t.isLoading},on:{click:function(e){t.submit()}}},[t._v("提交")]),t._v(" "),n("el-button",{on:{click:function(e){t.$router.go(-1)}}},[t._v("返回")])],1)],2)],1)},staticRenderFns:[]}}});
//# sourceMappingURL=32.67d760bcab3b04c94ef6.js.map