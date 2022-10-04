<template>
  
  <div class="container">

    <div id="box_link_voltar">
        <a href="/perfil">Voltar</a>
    </div>

    <div id="content_my_reviews">

      <div class="my_review">

        <div class="box_img_my_review">
          <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fd1lss44hh2trtw.cloudfront.net%2Fassets%2Farticle%2F2020%2F10%2F26%2Fwatch-dogs-legion-review_feature.jpg&f=1&nofb=1&ipt=5f2121ff8ca64168d78954720d0d7a678622923de050b6fa972cc1dbc16062c8&ipo=images">
        </div>

        <div class="box_titile_rate_my_review">
          <h2 class="title_my-review">Watch Dogs Legion</h2>
          <div class="rate_my_review">
            4.6
          </div>
        </div>
        
        <div class="box_button_my_review">
          <button class="botao_medio">
            Editar
          </button>
          <button class="botao_cancelar">
            Remover
          </button>
        </div>

      </div>
    </div>
    
  </div>

  
</template>

<script>
  export default
  {
      data()
      {
          return{

          }
      },
      mounted(){},
      methods:{},
      props:[
        'UserReviews'
      ]
  }
</script>



<style>
#box_link_voltar
{
  margin: 20px 0 0 0;
}
#content_my_reviews
{
  margin: 30px 0 0 0;
}
.my_review
{
  margin: 0 auto;
  width: 80%;
}
.box_img_my_review{
  
}
.box_img_my_review img
{
  height: 400px;
}
.box_titile_rate_my_review
{
  display: flex;
  justify-content: space-between;
  margin: 10px 0;
}
.box_button_my_review
{
  display: flex;
  gap: 10px;
}

</style>