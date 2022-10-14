<template>
  
  <div class="container">

    <div id="box_link_voltar">
        <a href="#" @click.prevent="nav('/perfil/'+user.id)">Voltar</a>
    </div>

    <div id="content_my_reviews">

      <div v-for="r in reviews" :key="r.id"
      class="my_review">

        <div class="box_img_my_review">
          <img :src="r.thumb">
        </div>

        <div class="box_titile_rate_my_review">
          <h2 class="title_my-review">{{ r.name_review }}</h2>
          <div class="rate_my_review">
            {{ r.rate }}
          </div>
        </div>
        
        <div class="box_button_my_review">
          <button @click.prevent="nav('/edit-review-user/'+r.id+'/'+user.id)" class="botao_medio">
            Editar
          </button>
          <button @click.prevent="removeReview(r.id, user.id)" 
          class="botao_cancelar" data-bs-toggle="modal" data-bs-target="#modal_message">
            Remover
          </button>
        </div>

      </div>
    </div>
    
  </div>

  <div class="modal" id="modal_message">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Tem certeza que quer apagar a review ?</p>

                    <div id="box_button_modal_delete">
                        <button class="botao_confirmar" data-bs-dismiss="modal">
                            Não
                        </button>
                        <button 
                        @click.prevent="sendRemoveReview()"
                        class="botao_medio" data-bs-dismiss="modal">
                            sim
                        </button>
                    </div>
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
            id_var_review: "",
            id_var_user: ""
          }
      },
      mounted(){},
      methods:{
        nav(link){location.href = link},
        removeReview(id_review, id_user)
        {
          this.id_var_review = id_review
          this.id_var_user = id_user
        },
        sendRemoveReview()
        {
          axios.post('/api/delete-review', {
            id_user: this.id_var_user, 
            id_review: this.id_var_review})
          .then(res => 
          {
            for(let i = 0; i < this.reviews.length; i++)
            {
                if(this.reviews[i].reviews_id == this.id_var_review)
                {
                    this.reviews.splice(i, 1)
                }
            }
            console.log(res)
          }, e => {console.log(e)})
        }
      },
      props:[
        'reviews',
        'user'
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
  margin: 0 auto 30px auto;
  width: 80%;
}
.box_img_my_review{color: #000;}
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
#modal_message
{
    padding: 230px 0 0 0;
}
#box_button_modal_delete
{
    display: flex;
    gap: 0 10px;
}
</style>