<template>
   <MenuCustom :user="user" :idUserContext="idUserDash"></MenuCustom>

   <div class="container">

      <h2 v-show="reviews.length===0">
         Sem resultados
      </h2>

      <div class="reviews_inicio row">
         
         <div v-for="r in reviews" :key="r.id"
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
   </div>
</template>



<script>
import MenuCustom from '@/MyElements/MenuCustom.vue'

export default
{
   data()
   {
      return{
         idUserDash: ""
      }
   },
   mounted()
   {
      this.idUserDash = this.user.id ? this.user.id : '';
   },
   methods:
   {
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
      border: 1px solid var(--bordas-input);
      padding: 6px;
   }
   .box_title_rate_review
   {
      justify-content: space-between;
   }
   .box_title_rate_review h2{width: fit-content;}
</style>