<template>
  <div class="container-fluid">
    <div id="cadastrar_review">

    <div id="form_review">

        <div id="box_link_voltar">
            <a href="/perfil/1">Voltar</a>
        </div>

        <h2>Adicionar review</h2>

        <!-- FORMULÁRIO DE REVIEW -->
        <div id="box_form_review">
            <form @submit.prevent="pera">

                <div class="box_input_review">
                    <input v-model="titulo_pricipal" type="text" placeholder="Título principal">
                </div>

                <div class="box_input_review">
                    <textarea v-model="desc_review" type="text" placeholder="Conteudo da review"></textarea>
                </div>

                <h2>Informações do game</h2>

                <div class="box_input_review">
                    <input type="text" placeholder="">
                </div>
                <div class="box_input_review">
                    <input type="text" placeholder="">
                </div>
                <div class="box_input_review">
                    <input type="text" placeholder="">
                </div>
                <div class="box_input_review">
                    <input type="text" placeholder="">
                </div>
                <div class="box_input_review">
                    <input type="text" placeholder="">
                </div>
                <div class="box_input_review">
                    <input type="text" placeholder="">
                </div>
                <div class="box_input_review">
                    <input type="text" placeholder="">
                </div>

                <h2>Requisitos</h2>

                <div class="box_input_review">
                    <textarea placeholder="Requisitos" cols="30" rows="10"></textarea>
                </div>

                <div class="box_input_review">
                    <input type="text" placeholder="Nota Final">
                </div>

                <div id="box_button_submit_review">
                    <button class="botao_confirmar">
                        Cadastrar review
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div id="preview_review">

        <h1>
            {{ titulo_pricipal }}
        </h1>

        <p> {{ desc_review }} </p>
    </div>
    
    </div>  
  </div>
</template>



<script>

export default {
    data(){
        return{
            titulo_pricipal: "",
            thumb: "",
            desc_review: "",
            rate: "",
            name_game: "",
            collection: "",
            developer: "",
            owner: "",
            gender: "",
            version: "",
            year: "",
            requirementsGame: ""
            }
    },
    methods:
    {
        sendAddReview()
            {
                // body = 
                // {
                //     titulo_pricipal: this.titulo_pricipal,
                //     thumb: this.thumb,
                //     desc_review: this.desc_review,
                //     rate: this.rate,
                //     name_game: this.name_game,
                //     collection: this.collection,
                //     developer: this.developer,
                //     owner: this.owner,
                //     gender: this.gender,
                //     version: this.version,
                //     year: this.year,
                //     requirements: this.requirementsGame,
                //     id_user: this.user.id
                // }
                console.log($page.titulo_principal)
                // axios.post('/api/add-review', 
                // {
                    
                // })
                // .then((res) => 
                // {
                //     console.log(res.data)
                // }, e => {console.log(e)})
            }   
    },
    components:
    {
    },
    props:
    {
        user: Object,
    }
}
</script>



<style>
#cadastrar_review
{
    display: flex;
}
#form_review h2
{
    margin: 30px 0 0 0;
}

/* FORM */
#form_review
{
    width: 68%;
    padding: 20px;
    overflow-y: auto;
}
.box_button_elements_review
{
    display: flex;
    margin: 20px 0;
    gap: 5px;
}
.box_input_review
{
    display: flex;
    gap: 0 10px;
    margin: 0 0 20px 0;
}

/* PREVIEW */
#preview_review
{
    width: 32%;
    height: 100vh;
    padding: 20px;
    border: 1px solid var(--bordas-input);
}
</style>