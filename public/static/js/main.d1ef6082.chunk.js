(this["webpackJsonpreact-learn"]=this["webpackJsonpreact-learn"]||[]).push([[0],{31:function(e,t,a){e.exports=a(64)},36:function(e,t,a){},37:function(e,t,a){},60:function(e,t,a){},61:function(e,t,a){},62:function(e,t,a){},63:function(e,t,a){},64:function(e,t,a){"use strict";a.r(t);var n=a(0),r=a.n(n),o=a(28),c=a.n(o),l=(a(36),a(3)),s=a(4),i=a(6),m=a(5),u=a(7),p=a(1),g=(a(37),a(13)),h=a.n(g),d=function(e){Object(i.a)(a,e);var t=Object(m.a)(a);function a(){var e;Object(l.a)(this,a);for(var n=arguments.length,r=new Array(n),o=0;o<n;o++)r[o]=arguments[o];return(e=t.call.apply(t,[this].concat(r))).state={hasToken:!1,isLogin:!1},e.checkLogin=function(){var t=localStorage.getItem("loginToken"),a=localStorage.getItem("email");null!==t&&h.a.post("/api/user/check",{loginToken:t,email:a},{headers:{"Content-Type":"application/json"}}).then((function(t){!0===t.data?e.setState({isLogin:!0}):e.setState({isLogin:!1})})).catch((function(e){console.log(e)}))},e.componentDidMount=function(){e.checkLogin()},e}return Object(s.a)(a,[{key:"render",value:function(){var e;return this.state.isLogin&&!this.props.contentReverse&&(e=this.props.contentLogin),this.state.isLogin||(e=this.props.children),r.a.createElement(r.a.Fragment,null,e)}}]),a}(n.Component),f=Object(p.f)(d),v=(a(60),function(e){Object(i.a)(a,e);var t=Object(m.a)(a);function a(){var e;Object(l.a)(this,a);for(var n=arguments.length,o=new Array(n),c=0;c<n;c++)o[c]=arguments[c];return(e=t.call.apply(t,[this].concat(o))).loginNav=function(){return r.a.createElement(r.a.Fragment,null,r.a.createElement(u.b,{to:"/"},"Home"),r.a.createElement("a",{onClick:function(t,a){return e.props.updateModal(!0,"logout")}},"logout"))},e}return Object(s.a)(a,[{key:"render",value:function(){return r.a.createElement("header",{className:"Header"},r.a.createElement("nav",{className:"Header__nav"},r.a.createElement(f,{contentLogin:this.loginNav(),contentReverse:!1},r.a.createElement(u.b,{to:"/"},"Home"),r.a.createElement(u.b,{to:"/signup"},"signup"))))}}]),a}(n.Component)),b=(a(61),function(e){Object(i.a)(a,e);var t=Object(m.a)(a);function a(){var e;Object(l.a)(this,a);for(var n=arguments.length,r=new Array(n),o=0;o<n;o++)r[o]=arguments[o];return(e=t.call.apply(t,[this].concat(r))).logout=function(){var t=localStorage.getItem("email");h.a.post("/api/user/logout",{email:t},{headers:{"Content-Type":"application/json"}}).then((function(t){e.props.updateModal(!1,""),localStorage.clear(),e.props.history.push("/")})).catch((function(e){console.log(e)}))},e}return Object(s.a)(a,[{key:"render",value:function(){var e=this,t="Modal";return!0===this.props.show&&(t+=" show"),r.a.createElement("div",{className:t},r.a.createElement("div",{className:"Modal__txt"},"\u30ed\u30b0\u30a2\u30a6\u30c8\u3057\u307e\u3059\u304b"),r.a.createElement("button",{onClick:function(){return e.logout()}},"yes"),r.a.createElement("button",{onClick:function(t,a){return e.props.updateModal(!1,"logout")}},"no"))}}]),a}(n.Component)),E=Object(p.f)(b),_=(a(62),function(e){Object(i.a)(a,e);var t=Object(m.a)(a);function a(){return Object(l.a)(this,a),t.apply(this,arguments)}return Object(s.a)(a,[{key:"render",value:function(){return r.a.createElement("div",{className:"Home"},r.a.createElement("div",{className:"Home__container"},r.a.createElement("h1",null,"nyanstagram"),r.a.createElement("p",null,"\u767b\u9332\u3057\u3066\u53cb\u9054\u306e\u5199\u771f\u3084\u52d5\u753b\u3092\u30c1\u30a7\u30c3\u30af\u3057\u3088\u3046"),r.a.createElement(f,{contentReverse:!1},r.a.createElement(u.b,{className:"Home__link",to:"/login"},"\u30ed\u30b0\u30a4\u30f3"),r.a.createElement("p",null,"\u307e\u305f\u306f"),r.a.createElement(u.b,{className:"Home__link",to:"/signup"},"\u30e1\u30fc\u30eb\u30c9\u30ec\u30b9\u3067\u767b\u9332"))),r.a.createElement(f,null))}}]),a}(n.Component)),j=a(30),y=(a(63),function(e){Object(i.a)(a,e);var t=Object(m.a)(a);function a(){var e;Object(l.a)(this,a);for(var n=arguments.length,o=new Array(n),c=0;c<n;c++)o[c]=arguments[c];return(e=t.call.apply(t,[this].concat(o))).state={email:"",name:"",password:"",errorMsg:{email:"",name:"",password:""}},e.handleSubmit=function(t){t.preventDefault(),e.setState({email:t.target.email.value});var a=new FormData;a.append("email",t.target.email.value),a.append("name",t.target.name.value),a.append("password",t.target.password.value),h.a.post(e.props.apiUrl,a,{headers:{"content-type":"multipart/form-data"}}).then((function(t){console.log(t),e.exeApiSucess(t)})).catch((function(t){var a=t.response.data.errors,n=Object(j.a)({},e.state.errorMsg);a.email&&(n.email=a.email),a.name&&(n.name=a.name),a.password&&(n.password=a.password),e.setState({errorMsg:n})}))},e.exeApiSucess=function(t){"signup"===e.props.pageTitle&&e.props.history.push("/"),"login"===e.props.pageTitle&&(localStorage.setItem("loginToken",t.data),localStorage.setItem("email",e.state.email),e.props.history.push("/"))},e.getNameParts=function(){if("signup"===e.props.pageTitle)return r.a.createElement("div",{className:"UserForm__row"},r.a.createElement("label",{className:"UserForm__label"},"user-name"),r.a.createElement("input",{className:"UserForm__input",type:"text",name:"name"}),r.a.createElement("span",{className:"UserForm__error"},e.state.errorMsg.name))},e}return Object(s.a)(a,[{key:"render",value:function(){return r.a.createElement("div",{className:"UserForm"},r.a.createElement("h2",{className:"UserForm__ttl"},this.props.pageTitle),r.a.createElement("form",{onSubmit:this.handleSubmit,action:"",method:"post",className:"UserForm__form",name:"signupForm",rel:this.form},r.a.createElement("div",{className:"UserForm__row"},r.a.createElement("label",{className:"UserForm__label"},"email"),r.a.createElement("input",{className:"UserForm__input",type:"email",name:"email"}),r.a.createElement("span",{className:"UserForm__error"},this.state.errorMsg.email)),this.getNameParts(),r.a.createElement("div",{className:"UserForm__row"},r.a.createElement("label",{className:"UserForm__label"},"password"),r.a.createElement("input",{className:"UserForm__input",type:"password",name:"password"}),r.a.createElement("span",{className:"UserForm__error"},this.state.errorMsg.password)),r.a.createElement("div",{className:"UserForm__row"},r.a.createElement("button",{type:"submit",className:"UserForm__button"},"submit"))))}}]),a}(n.Component)),O=Object(p.f)(y),w=function(e){Object(i.a)(a,e);var t=Object(m.a)(a);function a(){return Object(l.a)(this,a),t.apply(this,arguments)}return Object(s.a)(a,[{key:"render",value:function(){return r.a.createElement(O,{pageTitle:"signup",apiUrl:"/api/signup"})}}]),a}(n.Component),k=Object(p.f)(w),N=function(e){Object(i.a)(a,e);var t=Object(m.a)(a);function a(){var e;Object(l.a)(this,a);for(var n=arguments.length,r=new Array(n),o=0;o<n;o++)r[o]=arguments[o];return(e=t.call.apply(t,[this].concat(r))).state={loginToken:""},e.setToken=function(e){console.log(e.data,"ok")},e.exeLoginSucess=function(){console.log("success")},e}return Object(s.a)(a,[{key:"render",value:function(){var e=this;return r.a.createElement(O,{pageTitle:"login",apiUrl:"/api/login",exeLoginSucess:function(){return e.exeLoginSucess()}})}}]),a}(n.Component),F=Object(p.f)(N),S=function(e){Object(i.a)(a,e);var t=Object(m.a)(a);function a(){var e;Object(l.a)(this,a);for(var n=arguments.length,r=new Array(n),o=0;o<n;o++)r[o]=arguments[o];return(e=t.call.apply(t,[this].concat(r))).state={modal:{show:!1,type:""}},e.updateModal=function(t,a){e.setState({modal:{show:t,type:a}}),console.log("ok")},e}return Object(s.a)(a,[{key:"render",value:function(){var e=this;return r.a.createElement(u.a,null,r.a.createElement("div",null,r.a.createElement(E,{show:this.state.modal.show,type:this.state.modal.type,updateModal:function(t,a){return e.updateModal(t,a)}}),r.a.createElement(v,{updateModal:function(t,a){return e.updateModal(t,a)}}),r.a.createElement(p.c,null,r.a.createElement(p.a,{exact:!0,path:"/",component:_}),r.a.createElement(p.a,{path:"/signup",component:k}),r.a.createElement(p.a,{path:"/login",component:F,setToken:function(t){return e.setToken(t)}}))))}}]),a}(n.Component);Boolean("localhost"===window.location.hostname||"[::1]"===window.location.hostname||window.location.hostname.match(/^127(?:\.(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)){3}$/));c.a.render(r.a.createElement(r.a.StrictMode,null,r.a.createElement(S,null)),document.getElementById("root")),"serviceWorker"in navigator&&navigator.serviceWorker.ready.then((function(e){e.unregister()})).catch((function(e){console.error(e.message)}))}},[[31,1,2]]]);
//# sourceMappingURL=main.d1ef6082.chunk.js.map