import{r as p,o as n,c as l,a as u,b as e,w as _,t as f,d as h,e as d,v as m,F as v,f as g}from"./app.173a6b7c.js";import{_ as b}from"./_plugin-vue_export-helper.cdc0426e.js";const w={data(){return{form:{email:"",password:""},erroForm:""}},mounted(){},methods:{sendFormLogin(){if(hcaptcha.getResponse()!==""){let a=document.getElementsByName("h-captcha-response")[0].value,o={email:this.form.email,password:this.form.password,h_response:a};return axios.post("/make-login-user",o).then(t=>{t.data=="login efetuado"?location.href="/":this.erroForm=t.data},t=>{this.erroForm=Object.values(t.response.data.errors)[0][0]}),!0}this.erroForm="O campo de sou humano n\xE3o foi selecionado."}},components:{},props:{}},y={class:"container"},F={class:"row justify-content-center align-items-center"},x={class:"box_form col-sm-6 mt-5"},L=e("h2",{class:"logo"}," REVIWW ",-1),V={key:0,class:"alert alert-danger"},k=e("label",{for:"email"},"Email",-1),N={class:"mt-4"},B=e("label",{for:"password"},"Senha",-1),E=g('<div class="h-captcha" data-sitekey="b435f683-b5cc-47ed-96d8-66fd751164a5"></div><div class="mt-4"><div class="row"><div class="col"><button class="botao_confirmar" type="submit"> Login </button></div><div class="col"><a href="/register" class="link_cadastre_se"> N\xE3o tem conta? cadastre-se! </a></div></div></div>',2);function S(a,o,t,j,s,i){const c=p("Head");return n(),l(v,null,[u(c,{title:"Login"}),e("div",y,[e("div",F,[e("div",x,[L,e("form",{onSubmit:o[2]||(o[2]=_((...r)=>i.sendFormLogin&&i.sendFormLogin(...r),["prevent"]))},[s.erroForm!==""?(n(),l("div",V,[e("b",null,f(s.erroForm),1)])):h("",!0),e("div",null,[k,d(e("input",{id:"email",type:"email","onUpdate:modelValue":o[0]||(o[0]=r=>s.form.email=r),name:"email",placeholder:"exemplo@mail.com.br",required:"",autofocus:""},null,512),[[m,s.form.email]])]),e("div",N,[B,d(e("input",{id:"password","onUpdate:modelValue":o[1]||(o[1]=r=>s.form.password=r),type:"password",name:"password",placeholder:"*************",required:"",autocomplete:"current-password"},null,512),[[m,s.form.password]])]),E],32)])])])],64)}const D=b(w,[["render",S]]);export{D as default};
