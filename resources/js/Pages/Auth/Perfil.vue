<template>
    <MenuCustom :user="user" :idUserContext="idUserContext" />

    <div class="container">

      <div id="content_perfil">
        <div class="row justify-content-around">
          
          <div class="col-sm-3 box_img_perfil_button_reviews">
            <div id="box_img_perfil_user">
              <img src="https://images.pexels.com/photos/1043471/pexels-photo-1043471.jpeg?auto=compress&cs=tinysrgb&w=600">
            </div>
            <h3>{{ user.name }}</h3>
            <p>
              {{ user.about }}
            </p>
            <div id="box_button_review_prefil_user">
              <button @click="navPage('/cadastrar-review')"
              class="botao_confirmar">
                Cadastrar review
              </button>
              <button @click="navPage('/listar-reviews/'+user.id)" 
              class="botao_cancelar">
                Minhas reviews
              </button>
              
            </div>
          </div>


          <div class="col-sm-6">

            <div v-if="erroUpdateData"
            class="alert alert-danger">
              <b>{{ erroUpdateData }}</b>
            </div>

            <div v-if="confirmUpdate"
            class="alert alert-success">
              <b>{{ confirmUpdate }}</b>
            </div>
          
            <form @submit.prevent="sendUpdateName" action="">
              <div class="box_input_button_perfil">
                <div class="box_input_perfil">
                  <label for="">Nome de usuário</label>
                  <input type="text" placeholder="nome de usuário"
                  v-model="name_user">
                </div>
                <div class="box_button_perfil">
                  <button class="botao_medio">
                    Editar
                  </button>
                </div>
              </div>
            </form>
            

            <form @submit.prevent="sendUpdateRole" action="">
              <div class="box_input_button_perfil">
                <div class="box_input_perfil">
                  <label for="">Papel</label>
                  <input type="text" placeholder="papel"
                   v-model="role">
                </div>
                <div class="box_button_perfil">
                  <button class="botao_medio">
                    Editar
                  </button>
                </div>
              </div>
            </form>


            <form @submit.prevent="sendUpdateAbout" action="">
              <div class="box_input_button_perfil">
                <div class="box_input_perfil">
                  <label for="">Sobre</label>
                  <textarea type="text" placeholder="Sobre"
                   v-model="about"></textarea>
                </div>
                <div class="box_button_perfil">
                  <button class="botao_medio">
                    Editar
                  </button>
                </div>
              </div>
            </form>


            <form @submit.prevent="sendUpdateEmail" action="">
              <div class="box_input_button_perfil">
                <div class="box_input_perfil">
                  <label for="">E-mail</label>
                  <input type="text" placeholder="e-mail"
                   v-model="email">
                </div>
                <div class="box_button_perfil">
                  <button class="botao_medio">
                    Editar
                  </button>
                </div>
              </div>
            </form>
            

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
        idUserContext: "",
        name_user: this.user.name,
        role: this.user.role,
        about: this.user.about,
        email: this.user.email,
        erroUpdateData: "",
        confirmUpdate: ""
      }
    },
    mounted()
    {
      this.idUserContext = this.user.id ? this.user.id : '';
    },
    methods:
    {
      sendUpdateName()
      {
        axios.post('/api/update-profile', {name_user: this.name_user, 
          id_user: this.user.id})
        .then(res => this.confirmUpdate = res.data, e => 
        { this.erroUpdateData = Object.values(e.response.data.errors)[0][0]})
      },
      sendUpdateEmail()
      {
        axios.post('/api/update-profile', {email: this.email, 
          id_user: this.user.id})
        .then(res => this.confirmUpdate = res.data, e => 
        { this.erroUpdateData = Object.values(e.response.data.errors)[0][0]})
      },
      sendUpdateRole()
      {
        axios.post('/api/update-profile', {role: this.role, 
          id_user: this.user.id})
        .then(res => this.confirmUpdate = res.data, e => 
        { this.erroUpdateData = Object.values(e.response.data.errors)[0][0]})
      },
      sendUpdateAbout()
      {
        axios.post('/api/update-profile', {about: this.about, 
          id_user: this.user.id})
        .then(res => this.confirmUpdate = res.data, e => 
        { this.erroUpdateData = Object.values(e.response.data.errors)[0][0]})
      },
      navPage(route)
      {
        location.href = route
      },
    },
    props:{
        userData: Object,
        user: Object,
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
form{width: 100%;}
.box_input_perfil{width: 100%;}
.box_button_perfil{
  width: auto;
  margin: auto 0 0 0;
}
.box_button_perfil button{height: 45px;}


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