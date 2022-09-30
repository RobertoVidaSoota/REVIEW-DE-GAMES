<template>
    <MenuCustom />

    <div class="container">
        
        <section id="content_review">

            <div class="box_title_rate_content_review d-flex">
                <h1>
                    Watch Dogs Legion
                </h1>
                <div>
                    4.6
                </div>
            </div>

            <small class="d-block">by Thiago Mordido</small>
            <small class="d-block">28/12/2021</small>

            <div class="box_imd_content_review">
                <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fd1lss44hh2trtw.cloudfront.net%2Fassets%2Farticle%2F2020%2F10%2F26%2Fwatch-dogs-legion-review_feature.jpg&f=1&nofb=1&ipt=5f2121ff8ca64168d78954720d0d7a678622923de050b6fa972cc1dbc16062c8&ipo=images">
            </div>

            <p class="p-review">
                It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
            </p>
            
        </section>


        <!-- VEJA MAIS -->
        <section id="content_veja_mais">

            <h4>Veja mais</h4>
            <div class="row">

                <div class="col-sm-4 box_veja_mais" @click="navToReview">

                    <div class="box_img_veja_mais">
                        <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ffindyourinnergeek.ca%2Fwp-content%2Fuploads%2F2018%2F10%2FCall-of-Duty%25C2%25AE_-Black-Ops-4_20181015130712.jpg&f=1&nofb=1&ipt=6c3b24467316c2358aa5d8828f270e95c45122cb5538a5c309f49cceefa37bf5&ipo=images">
                    </div>
                    <div class="box_title_rate_veja_mais d-flex">
                        <h2>Call of Duty:Black Ops 4</h2>
                        <p>3.1</p>
                    </div>
                    <p>by Thiago Mordido</p>
                </div>
            </div>
        </section>


        <!-- COMENTÁRIOS -->
        <div id="content_coments">

            <h4>Comentários</h4>

            <button id="botaoCancelar"
             class="botao_cancelar mt-5 esconder_elemento" 
            v-on:click="buttonComentar">
                Cancelar
            </button>

            <button id="botaoComentar"
            class="botao_confirmar mt-5"
            v-on:click="buttonComentar">
                Comentar
            </button>

            <div id="box_form_comentario" class="esconder_elemento">
                <form action="" >
                    <input type="text"> 
                    <button class="botao_confirmar">
                        Enviar
                    </button>
                </form>
            </div>

            <div id="many_coments">

                <div class="coment">

                    <div class="box_user_coment d-flex">
                        <div class="box_img_perfil_coment">
                            <img src="https://images.pexels.com/photos/1043471/pexels-photo-1043471.jpeg?auto=compress&cs=tinysrgb&w=600">
                        </div>
                        <p class="name_user">
                            Thiago Mordido
                        </p>
                    </div>
                    
                    <p class="coment_text">
                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.
                    </p>
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
            }
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
            navToReview()
            {
                location.href = "/review"
            }
        },
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
    .name_user{margin: auto 0 auto 30px;}
    .coment_text{margin: 20px 0 0 0;}
</style>