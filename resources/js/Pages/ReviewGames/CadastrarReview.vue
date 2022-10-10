<template>
  <div class="container-fluid">
    <div id="cadastrar_review">

    <div id="form_review">

        <div id="box_link_voltar">
            <a href="/perfil/1">Voltar</a>
        </div>

        <div v-show="erroForm!==''" class="alert alert-danger">
            <b>{{ erroForm }}</b>
        </div>

        <h2>Adicionar review</h2>

        <!-- FORMULÁRIO DE REVIEW -->
        <div id="box_form_review">
            <form v-on:submit.prevent="sendAddReview">

                <div class="box_input_review">
                    <input v-model="titulo_principal"
                    type="text" placeholder="Título principal">
                </div>

                <div class="box_input_review">
                    <input v-model="thumb" type="url" placeholder="Link da imagem de capa">
                </div>

                <div class="box_input_review">
                    <textarea v-model="desc_review" 
                    type="text"  @input="transformTextMD($event)"
                    placeholder="Conteudo da review (Markdown)"></textarea>
                </div>

                <h2>Informações do game</h2>

                <div class="box_input_review">
                    <input v-model="name_game" type="text" placeholder="Nome do jogo">
                </div>
                <div class="box_input_review">
                    <input v-model="gender" type="text" placeholder="Gênero">
                </div>
                <div class="box_input_review">
                    <input v-model="collection" type="text" placeholder="Franquia">
                </div>
                <div class="box_input_review">
                    <input v-model="developer" type="text" placeholder="Desenvolvedora">
                </div>
                <div class="box_input_review">
                    <input v-model="owner" type="text" placeholder="Distribuidora">
                </div>
                <div class="box_input_review">
                    <input v-model="version" type="text" placeholder="Versão">
                </div>
                <div class="box_input_review">
                    <input v-model="year" type="text" placeholder="Ano de lançamento">
                </div>

                <h2>Requisitos</h2>

                <div class="box_input_review">
                    <textarea v-model="requirementsGame" 
                    placeholder="Requisitos para jogar no computador (Markdown)" 
                    cols="30" rows="10"></textarea>
                </div>

                <div class="box_input_review">
                    <input v-model="rate" type="text" placeholder="Nota Final">
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
            {{ titulo_principal }}
        </h1>

        <img :src="thumb">

        <div id="preview_content"></div>
    </div>

    </div>  
  </div>
</template>



<script>

export default {
    data(){
        return{
            titulo_principal: "",
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
            requirementsGame: "",
            erroForm: "",
        }
    },
    methods:
    {
        transformTextMD(e)
        {
            let content = document.querySelector("#preview_content")
            var converter = new showdown.Converter()
            let text = e.target.value
            content.innerHTML = converter.makeHtml(text)
        },
        sendAddReview()
        {
            let body = 
            {
                titulo_principal: this.titulo_principal,
                thumb: this.thumb,
                desc_review: this.desc_review,
                rate: this.rate,
                name_game: this.name_game,
                collection: this.collection,
                developer: this.developer,
                owner: this.owner,
                gender: this.gender,
                version: this.version,
                year: this.year,
                requirements: this.requirementsGame,
                id_user: this.user.id
            }
            axios.post('/api/add-review', body).then(res => 
            {
                if(res.data == true){
                    location.href = "/perfil/".body.id_user
                }
            }, e => { 
              this.erroForm = Object.values(e.response.data.errors)[0][0]
            })
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
    overflow-y: auto;
}
#preview_review img
{
    display: block;
    width: 100%;
}
#preview_content
{
    word-wrap: break-word;
}

</style>