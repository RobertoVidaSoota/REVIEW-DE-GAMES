import{M as m}from"./MenuCustom.7f90203e.js";import{_ as h}from"./_plugin-vue_export-helper.cdc0426e.js";import{r as v,o as r,c as a,a as w,b as e,d as p,F as d,g as f,t as c}from"./app.173a6b7c.js";const g={data(){return{idUserDash:"",reviewList:this.reviews}},mounted(){this.moreData(),this.idUserDash=this.user.id?this.user.id:""},methods:{moreData(){let t=20,o=this,s=location.pathname.split("/");s[1]==""?window.addEventListener("scroll",function(){window.scrollY+window.innerHeight>=document.documentElement.scrollHeight&&axios.get("/api/more-data/reviews-root/"+t).then(n=>{o.reviewList=[...o.reviewList,...n.data],t+=20})}):window.addEventListener("scroll",function(){window.scrollY+window.innerHeight>=document.documentElement.scrollHeight&&axios.get("/api/more-data/reviews-group/"+s[2]+"/"+s[3]+"/"+t).then(n=>{o.reviewList=[...o.reviewList,...n.data],t+=20})})},navToReview(t){location.href="/review/"+t}},props:{reviews:Array,user:Object},components:{MenuCustom:m}},x={class:"container"},b={key:0},y={class:"reviews_inicio row"},C=["onClick"],L={class:"box_img_review"},D=["src"],k={class:"box_title_rate_review d-flex"},E={class:"rate"},U=e("div",{class:"d-flex justify-content-center box_spinner"},[e("div",{class:"spinner-border",role:"status"},[e("span",{class:"visually-hidden"})])],-1);function H(t,o,s,n,l,_){const u=v("MenuCustom");return r(),a(d,null,[w(u,{user:s.user,idUserContext:l.idUserDash},null,8,["user","idUserContext"]),e("div",x,[s.reviews.length===0?(r(),a("h2",b," Sem resultados ")):p("",!0),e("div",y,[(r(!0),a(d,null,f(l.reviewList,i=>(r(),a("div",{key:i.id,class:"col-sm-6 col-md-4 col-lg-3 review",onClick:M=>_.navToReview(i.reviews_id)},[e("div",L,[e("img",{src:i.thumb},null,8,D)]),e("div",k,[e("h2",null,c(i.name_review),1),e("p",E,c(i.rate),1)]),e("p",null," by "+c(i.name),1)],8,C))),128))]),U])],64)}const j=h(g,[["render",H]]);export{j as default};