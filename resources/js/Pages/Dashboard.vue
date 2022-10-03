<template>
   <MenuCustom></MenuCustom>

   <div class="container">

      <div class="reviews_inicio row" @click="navToReview">
         
         <div class="col-sm-3 review">
            <div class="box_img_review">
               <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fd1lss44hh2trtw.cloudfront.net%2Fassets%2Farticle%2F2020%2F10%2F26%2Fwatch-dogs-legion-review_feature.jpg&f=1&nofb=1&ipt=5f2121ff8ca64168d78954720d0d7a678622923de050b6fa972cc1dbc16062c8&ipo=images">
            </div>
            <div class="box_title_rate_review d-flex">
               <h2>Watch Dogs Legion</h2>
               <p>4.6</p>
            </div>
            <p>
               by Thiago Mordido
            </p>
         </div>

      </div>
   </div>
</template>



<script setup>
import MenuCustom from '@/MyElements/MenuCustom.vue'

const navToReview = () => 
{
   location.href = "/review/1"
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
   .review:hover{
      border: 1px solid var(--bordas-input);
      padding: 6px;
   }
   .box_title_rate_review
   {
      justify-content: space-between;
   }
</style>