<template>
   <MenuCustom :user="user" :idUserContext="idUserDash"></MenuCustom>

   <div class="container">

      <h2 v-if="reviews.length===0">
         Sem resultados
      </h2>

      <div class="reviews_inicio row">
         
         <div v-for="r in reviewList" :key="r.id"
         class="col-sm-6 col-md-4 col-lg-3 review" @click="navToReview(r.reviews_id)">
            <div class="box_img_review">
               <img :src="r.thumb">
            </div>
            <div class="box_title_rate_review d-flex">
               <h2>{{ r.name_review }}</h2>
               <p class="rate">
                  {{ r.rate }}
               </p>
            </div>
            <p>
               by {{ r.name }}
            </p>
         </div>

      </div>

      <div class="d-flex justify-content-center box_spinner">
         <div class="spinner-border" role="status">
            <span class="visually-hidden"></span>
         </div>
      </div>
   </div>

</template>



<script>
import MenuCustom from '@/MyElements/MenuCustom.vue'

export default
{
   data()
   {
      return{
         idUserDash: "",
         reviewList: this.reviews
      }
   },
   mounted()
   {
      // PEGAR MAIS
      this.moreData()

      this.idUserDash = this.user.id ? this.user.id : '';
   },
   methods:
   {
      moreData()
      {
         let qt = 20
         let ref = this
         let path = location.pathname.split('/')
         if(path[1] == ""){
         window.addEventListener('scroll', function()
         {
            if(window.scrollY + window.innerHeight >=
            document.documentElement.scrollHeight)
            {
               axios.get('/api/more-data/reviews-root/'+qt)
               .then(res => 
               {
                  ref.reviewList = [...ref.reviewList, ...res.data]
                  qt += 20
               })
            }
         })
         }else
         {
         window.addEventListener('scroll', function()
         {
            if(window.scrollY + window.innerHeight >=
            document.documentElement.scrollHeight)
            {
               axios.get('/api/more-data/reviews-group/'+path[2]+'/'+path[3]+'/'+qt)
               .then(res => 
               {
                  ref.reviewList = [...ref.reviewList, ...res.data]
                  qt += 20
               })
            }
         })
         }
         
      },
      navToReview(id)
      {
         location.href = "/review/"+id
      },
   },
   props: 
   {
      reviews: Array,
      user: Object
   },
   components:
   {
      MenuCustom
   }
}
</script>



<style>
   /* REVIEWS LIST */
   .reviews_inicio
   {
      margin: 0;
   }
   .review
   {
      cursor: pointer;
   }
   .rate
   {
      width: 30px;
      height: 30px;
      font-size: 16px;
      background: var(--azul-destaque);
      color: var(--branco);
      border-radius: 5px;
      text-align: center;
      line-height: 30px;
      margin: 5px 0 0 0;
   }
   .review:hover{
      opacity: 0.8;
   }
   .box_title_rate_review
   {
      justify-content: space-between;
   }
   .box_title_rate_review h2{width: fit-content;}
   .box_spinner
   {
      margin: 8px 0;
   }
</style>