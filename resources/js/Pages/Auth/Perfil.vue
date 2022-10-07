<template>
    <MenuCustom :idUserContext="idUserPf" />

    <div class="container">

      <div id="content_perfil">
        <div class="row justify-content-around">
          
          <div class="col-sm-3 box_img_perfil_button_reviews">
            <div id="box_img_perfil_user">
              <img src="https://images.pexels.com/photos/1043471/pexels-photo-1043471.jpeg?auto=compress&cs=tinysrgb&w=600">
            </div>
            <h3>Thiago Mordido</h3>
            <p>
              Sou um cara normal
            </p>
            <div id="box_button_review_prefil_user">
              <button @click="navPage('/cadastrar-review')"
              class="botao_confirmar">
                Cadastrar review
              </button>
              <button @click="navPage('/listar-reviews/1')" 
              class="botao_cancelar">
                Minhas reviews
              </button>
              
            </div>
          </div>


          <div class="col-sm-6">

            <div class="box_input_button_perfil">
              <div class="box_input_perfil">
                <label for="">Nome de usuário</label>
                <input type="text" placeholder="nome de usuário">
              </div>
              <button class="botao_medio">
                Editar
              </button>
            </div>

            <div class="box_input_button_perfil">
              <div class="box_input_perfil">
                <label for="">Papel</label>
                <input type="text" placeholder="papel">
              </div>
              <button class="botao_medio">
                Editar
              </button>
            </div>

            <div class="box_input_button_perfil">
              <div class="box_input_perfil">
                <label for="">E-mail</label>
                <input type="text" placeholder="e-mail">
              </div>
              <button class="botao_medio">
                Editar
              </button>
            </div>

            <div class="box_input_button_perfil">
              <div class="box_input_perfil">
                <label for="">Senha</label>
                <input type="text" placeholder="senha">
              </div>
              <button class="botao_medio">
                Editar
              </button>
            </div>

            <a href="#" @click.prevent="logOutUser()" class="logout">Sair</a>
          </div>
        </div>
      </div>
    </div>
</template>




<script>
  import MenuCustom from '@/MyElements/MenuCustom.vue';

  export default
  {
    data()
    {
      return{
        idUserPf: ""
      }
    },
    mounted()
    {
      this.idUserPf = this.user.id ? this.user.id : '';
    },
    methods:
    {
      navPage(route)
      {
        location.href = route
      },
      logOutUser(){axios.post('/logout').then(res => this.navPage("/login"))}
    },
    props:{
        userData: Object,
        user: Object
    },
    components:{MenuCustom}
  }
</script>




<style>
#content_perfil{margin: 40px 0 0 0;}
.box_input_button_perfil
{
  display: flex;
  margin: 0 0 20px 0;
  gap: 0 10px;
}
.box_input_perfil
{
  width: 100%;
}

/* IMG E BUTTONS */
.box_img_perfil_button_reviews h2
{
  margin: 10px 0 0 0;
}
.box_img_perfil_button_reviews p
{
  margin: 0 0 50px 0;
}
.box_img_perfil_button_reviews button
{
  margin: 0 0 20px 0;
}
#box_img_perfil_user img
{
  height: 150px;
  width: 150px;
}
.logout{
  display: block;
  color: var(--vermelho-botao);
}

</style>