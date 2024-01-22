import{_ as m,o as p,c as u,b as t,e as l,t as _,j as f,f as v,w as g,d as r,v as d,g as w,a as h,k as x}from"./index-Rclj0A4P.js";const y={},k={class:"footer"},$={class:"container"},S={class:"row"},T={class:"col-lg-12"},V={class:"text-center"},U={class:"mb-0 text-muted"},D=t("i",{class:"mdi mdi-heart text-danger"},null,-1);function F(o,e,a,c,s,n){return p(),u("footer",k,[t("div",$,[t("div",S,[t("div",T,[t("div",V,[t("p",U,[l("© "+_(new Date().getFullYear())+" © Velzon. Crafted with ",1),D,l(" by Themesbrand ")])])])])])])}const I=m(y,[["render",F]]),A={components:{Footer:I},name:"Login",data(){return{email:"",password:""}},created(){},methods:{async loginUser(){try{this.isSubmitting=!0;let o={email:this.email,password:this.password};this.axios.post("/user-signin",o).then(e=>{if(e.data.success){const a=e.data.access_token;localStorage.setItem("token",a);const c=e.data.expires_in,s=new Date().getTime()+c*60*1e3;f.dispatch("loginUser",{token:a,expirationTime:s});const n=localStorage.getItem("token");this.$router.push("/")}else alert("Authentication failed. Please check your credentials.")}).catch(e=>(this.isSubmitting=!1,console.log(e),e))}catch(o){console.error("An error occurred during authentication:",o),alert("An error occurred. Please try again later.")}}}},B={class:"auth-page-wrapper pt-5",style:{width:"1280px"}},N={class:"auth-page-content"},P={class:"container"},j=h('<div class="row"><div class="col-lg-12"><div class="text-center mt-sm-5 mb-4 text-white-50"><div><a href="index.html" class="d-inline-block auth-logo"><img src="'+x+'" alt="" height="20"></a></div><p class="mt-3 fs-15 fw-medium">Premium Admin &amp; Dashboard Template</p></div></div></div>',1),E={class:"row justify-content-center"},z={class:"col-md-8 col-lg-6 col-xl-5"},C={class:"card mt-4 card-bg-fill"},L={class:"card-body p-4"},M=t("div",{class:"text-center mt-2"},[t("h5",{class:"text-primary"},"Welcome Back !"),t("p",{class:"text-muted"},"Sign in to continue to Velzon.")],-1),R={class:"p-2 mt-4"},W={class:"mb-3"},Y=t("label",{for:"username",class:"form-label"},"Username",-1),q={class:"mb-3"},G=t("div",{class:"float-end"},[t("a",{href:"auth-pass-reset-basic.html",class:"text-muted"},"Forgot password?")],-1),H=t("label",{class:"form-label",for:"password-input"},"Password",-1),J={class:"position-relative auth-pass-inputgroup mb-3"},K=t("button",{class:"btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon",type:"button",id:"password-addon"},[t("i",{class:"ri-eye-fill align-middle"})],-1),O=h('<div class="form-check"><input class="form-check-input" type="checkbox" value="" id="auth-remember-check"><label class="form-check-label" for="auth-remember-check">Remember me</label></div><div class="mt-4"><button class="btn btn-primary w-100" type="submit">Sign In</button></div><div class="mt-4 text-center"><div class="signin-other-title"><h5 class="fs-13 mb-4 title">Sign In with</h5></div><div><button type="button" class="btn btn-primary btn-icon waves-effect waves-light" style="margin:0px 2px;"><i class="ri-facebook-fill fs-16"></i></button><button type="button" class="btn btn-danger btn-icon waves-effect waves-light" style="margin:0px 2px;"><i class="ri-google-fill fs-16"></i></button><button type="button" class="btn btn-dark btn-icon waves-effect waves-light" style="margin:0px 2px;"><i class="ri-github-fill fs-16"></i></button><button type="button" class="btn btn-info btn-icon waves-effect waves-light" style="margin:0px 2px;"><i class="ri-twitter-fill fs-16"></i></button></div></div>',3),Q=t("div",{class:"mt-4 text-center"},[t("p",{class:"mb-0"},[l("Don't have an account ? "),t("a",{href:"auth-signup-basic.html",class:"fw-semibold text-primary text-decoration-underline"}," Signup ")])],-1);function X(o,e,a,c,s,n){const b=v("Footer");return p(),u("div",B,[t("div",N,[t("div",P,[j,t("div",E,[t("div",z,[t("div",C,[t("div",L,[M,t("div",R,[t("form",{onSubmit:e[2]||(e[2]=g((...i)=>n.loginUser&&n.loginUser(...i),["prevent"]))},[t("div",W,[Y,r(t("input",{"onUpdate:modelValue":e[0]||(e[0]=i=>s.email=i),type:"text",class:"form-control",id:"username",placeholder:"Enter username"},null,512),[[d,s.email]])]),t("div",q,[G,H,t("div",J,[r(t("input",{"onUpdate:modelValue":e[1]||(e[1]=i=>s.password=i),type:"password",class:"form-control pe-5 password-input",placeholder:"Enter password",id:"password-input"},null,512),[[d,s.password]]),K])]),O],32)])])]),Q])])])]),w(b)])}const tt=m(A,[["render",X]]);export{tt as default};
