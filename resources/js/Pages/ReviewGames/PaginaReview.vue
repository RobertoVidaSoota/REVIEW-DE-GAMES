<template>
    <MenuCustom :user="user" :idUserContext="idUserDash" />

    <div class="container">
        
        <section v-for="r in review" :key="r.reviews_id"
        id="content_review">

            <div class="box_title_rate_content_review d-flex">
                <h1>
                    {{ r.name_review }}
                </h1>
                <div>
                    {{ r.rate }}
                </div>
            </div>

            <small class="d-block">by {{ r.name }}</small>
            <small class="d-block">{{ r.date_review }}</small>

            <div class="box_imd_content_review">
                <img :src="r.thumb">
            </div>

            <div class="desc_review">
            </div>
            
        </section>



        <!-- VEJA MAIS -->
        <section id="content_veja_mais">

            <h4>Veja mais</h4>

            <div class="row">

                <div v-for="s in seeMore" :key="s.id"
                class="col-sm-6 col-md-4 box_veja_mais" @click="navToReview(s.id)">

                    <div class="box_img_veja_mais">
                        <img :src="s.thumb">
                    </div>
                    <div class="box_title_rate_veja_mais d-flex">
                        <h2>{{ s.name_review }}</h2>
                        <p>{{ s.rate }}</p>
                    </div>
                </div>

            </div>
        </section>



        <!-- ADICIONAR COMENTÁRIOS -->
        <div id="content_coments">

            <h4>Comentários</h4>

            <button v-show="user"
            id="botaoCancelar"
             class="botao_cancelar mt-5 esconder_elemento" 
            v-on:click="buttonComentar">
                Cancelar
            </button>

            <button v-show="user"
            id="botaoComentar"
            class="botao_confirmar mt-5"
            v-on:click="buttonComentar">
                Comentar
            </button>

            <div v-show="user"
            id="box_form_comentario" class="esconder_elemento">
                <div v-if="erroComent!==''"
                class="alert alert-danger">
                    <b>{{ erroComent }}</b>
                </div>
                <form @submit.prevent="adicionarComentario" action="">
                    <input v-model="text_coment" type="text"> 
                    <button class="botao_confirmar">
                        Enviar
                    </button>
                </form>
            </div>



            <!-- COMENTS -->
            <div id="many_coments">

                <p v-show="coments.length===0">
                    Não há comentários para essa publicação
                </p>



                <div v-for="c in coments" :key="c.coment_id"
                class="coment">

                    <div class="box_user_coment d-flex">
                        <div class="box_img_perfil_coment">
                            <img :src="c.image_user">
                        </div>
                        <p class="name_user">
                            {{ c.name }}
                        </p>
                    </div>
                    
                    <div class="d-flex">
                        <p class="coment_text">
                            {{ c.text_coment }}
                        </p>

                        <div v-if="user.id == c.fk_id_users" 
                        class="coment_buttons">
                            <a @click.prevent="editComent(c.coments_id)" 
                            href="#" class="" :id="'editar'+c.coments_id">
                            editar
                            </a>
                            <a 
                            href="#" class="" :id="'excluir'+c.coments_id">
                                excluir
                            </a>
                            <a @click.prevent="editComent(c.coments_id)"
                             href="#" class="esconder_elemento" :id="'cancelar'+c.coments_id">
                                cancelar
                            </a>
                        </div>
                    </div>

                    <div class="box_form_editar_comentario esconder_elemento"
                    :id="'form_editar'+c.coments_id">
                        <div v-if="erroEditComent!==''"
                        class="alert alert-danger">
                            <b>{{ erroComent }}</b>
                        </div>
                        <form v-on:submit.prevent="sendEditComent(c.fk_id_users, c.coments_id)">
                            <input v-model="text_edit_coment" type="text">
                            <button class="botao_confirmar">
                                Enviar
                            </button>
                        </form>
                    </div>
                    

                </div>


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
                text_coment: "",
                text_edit_coment:"",
                canEditComent: false,
                idUserDash: "",
                erroComent: "",
                erroEditComent: ""
            }
        },
        mounted()
        {
            this.transformToHtml(this.review[0].desc_review)
            this.idUserDash = this.user.id ? this.user.id : '';
        },
        methods:
        {
            buttonComentar()
            {
                let comentar = document.querySelector("#botaoComentar")
                let cancelar = document.querySelector("#botaoCancelar")
                let boxCampoComentario = 
                document.querySelector("#box_form_comentario")

                if(boxCampoComentario.classList.contains("esconder_elemento"))
                {
                    boxCampoComentario.classList.remove("esconder_elemento")
                    cancelar.classList.remove("esconder_elemento")
                    comentar.classList.add("esconder_elemento")
                }
                else
                {
                    boxCampoComentario.classList.add("esconder_elemento")
                    cancelar.classList.add("esconder_elemento")
                    comentar.classList.remove("esconder_elemento")
                }
            },
            adicionarComentario()
            {
                axios.post('/api/add-coment', 
                {
                    text_coment: this.text_coment,
                    id_user: this.user.id,
                    id_review: location.pathname.split('/')[2]
                })
                .then((res) => 
                {
                    this.coments.unshift(res.data[0])
                    this.buttonComentar()
                }, e => {
                    this.erroComent = 
                        Object.values(e.response.data.errors)[0][0]
                })
            },
            transformToHtml(desc_review)
            {
                var converter = new showdown.Converter()
                let newHtml = converter.makeHtml(desc_review)
                let descDiv = document.querySelector(".desc_review")
                descDiv.innerHTML = newHtml
            },
            editComent(id_coment)
            {
                let editar = document.querySelector("#editar"+id_coment+"")
                let excluir = document.querySelector("#excluir"+id_coment+"")
                let cancelar = document.querySelector("#cancelar"+id_coment+"")
                let boxCampoComentario = 
                document.querySelector("#form_editar"+id_coment+"")

                if(boxCampoComentario.classList.contains("esconder_elemento"))
                {
                    boxCampoComentario.classList.remove("esconder_elemento")
                    cancelar.classList.remove("esconder_elemento")
                    editar.classList.add("esconder_elemento")
                    excluir.classList.add("esconder_elemento")
                }
                else
                {
                    boxCampoComentario.classList.add("esconder_elemento")
                    cancelar.classList.add("esconder_elemento")
                    editar.classList.remove("esconder_elemento")
                    excluir.classList.remove("esconder_elemento")
                }
            },
            sendEditComent(id_user, id_coment)
            {
                let body = {}
                axios.post('/api/update-coment', 
                {
                    text_coment: this.text_edit_coment,
                    id_user: id_user,
                    id_coment: id_coment,
                    id_review: location.pathname.split('/')[2]
                })
                .then((res) => 
                {
                    for(let i = 0; i < this.coments.length; i++)
                    {
                        if(this.coments[i].coments_id == id_coment)
                        {
                            this.coments[i].text_coment = this.text_edit_coment
                        }
                    }
                    this.editComent(id_coment)
                    
                }, e => {
                    this.erroEditComent = 
                        Object.values(e.response.data.errors)[0][0]
                })
            },
            navToReview(id)
            {
                location.href = "/review/"+id
            }
        },
        props:[
            'review',
            'seeMore',
            'coments',
            'user'
        ],
        components:
        {
            MenuCustom
        }
    }
    
</script>



<style>
    #content_review
    {
        margin: 0 auto;
        width: 90%;
    }
    .box_veja_mais{cursor: pointer;}
    .box_title_rate_content_review,
    .box_title_rate_veja_mais
    {
        justify-content: space-between;
    }
    .box_imd_content_review
    {
        width: 100%;
        height: 80vh;
    }
    .box_imd_content_review img{height: 80vh;}
    p.p-review{margin: 50px 0 0 0;}
    .desc_review{margin: 40px 0 0 0;}

    /* VEJA MAIS */
    #content_veja_mais
    {
        margin: 70px 0 0 0;
    }
    #content_veja_mais h2
    {
        width: 70%;
    }

    /* COMENTÁRIOS */
    #content_coments
    {
        margin: 70px 0 0 0;
        padding: 14px;
    }
    #box_form_comentario
    {
        margin: 20px 0 0 0;
    }
    #box_form_comentario form
    {
        display: flex;
        justify-content: space-between;
        gap: 0 10px;
    }
    #many_coments
    {
        margin: 20px 0 0 0;
        border: 1px solid var(--bordas-input);
        padding: 20px;
    }
    .coment
    {
        margin: 0 0 50px 0;
    }
    .box_img_perfil_coment
    {
        width: 50px;
        height: 50px; 
    }
    .box_img_perfil_coment img{height: 50px;}
    .name_user{margin: auto 0 auto 10px;}
    .coment_text
    {
        width: 100%;
        margin: 10px 0 0 0;
        padding: 0 20px 0 0;
    }
    .coment_buttons
    {
        display: flex;
        margin: 10px 0 0 0;
        justify-content: end;
        gap: 2px 10px;
    }
    .box_form_editar_comentario{margin: 20px 0 0 0;}
    .box_form_editar_comentario form
    {
        display: flex;
        justify-content: space-between;
        gap: 0 10px;
    }
</style>