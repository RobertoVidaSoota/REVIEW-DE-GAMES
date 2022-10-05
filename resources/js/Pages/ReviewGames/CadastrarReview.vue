<template>
  <div class="container-fluid">

    <div id="cadastrar_review">

        <div id="form_review">

            <div id="box_link_voltar">
                <a href="/perfil">Voltar</a>
            </div>

            <h2>Adicionar</h2>

            <div id="box_button_elements_review">
                <button class="botao_medio">Título</button>
                <button class="botao_medio">Subtítulo</button>
                <button class="botao_medio">Parágrafo</button>
                <button class="botao_medio">Imagem</button>
                <button class="botao_medio">Citação</button>
            </div>

            <div id="box_form_review">
                <form action="">

                    <div class="box_input_review">
                        <input type="text" placeholder="Título principal">
                    </div>

                    <div class="box_input_review">
                        <input type="text" placeholder="Título">
                        <button class="botao_cancelar">
                            Remover
                        </button>
                    </div>

                    <div class="box_input_review">
                        <textarea type="text" placeholder="Parágrafo"></textarea>
                        <button class="botao_cancelar">
                            Remover
                        </button>
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
                Watch Dogs Legion
            </h1>

            <h2>
                Gráficos
            </h2>

            <p>
                It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
            </p>
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
        mounted()
        {
            axios.post('/api/add-review', 
            {
                titulo_pricipal: "Watch Dogs Legion é meia boca.",
                thumb: "https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ffindyourinnergeek.ca%2Fwp-content%2Fuploads%2F2018%2F10%2FCall-of-Duty%25C2%25AE_-Black-Ops-4_20181015130712.jpg&f=1&nofb=1&ipt=6c3b24467316c2358aa5d8828f270e95c45122cb5538a5c309f49cceefa37bf5&ipo=images",
                desc_review: "Mais do mesmo",
                rate: "3.7",
                name_game: "Watch Dogs Legion",
                collection: "Watch Dogs",
                developer: "Ubisoft",
                owner: "Ubisoft",
                gender: "Mundo aberto",
                version: "Basic",
                year: "2021",
                requirements: [
                    {
                        hardware: "OS",
                        value: "Windows",
                        level: "mínimo"
                    },
                    {
                        hardware: "Processador",
                        value: "AMD Readom 3.4 GHz",
                        level: "mínimo"
                    },
                    {
                        hardware: "RAM",
                        value: "2GB",
                        level: "mínimo"
                    },
                    {
                        hardware: "Placa de Vídeo",
                        value: "NVIDIA 4GB",
                        level: "mínimo"
                    },
                ],
                elements: [
                    {
                        name_element: "h2",
                        text_element: "Primeiras Imprenssões"
                    },
                    {
                        name_element: "p",
                        text_element: "popopopopopopopo e nada tudo igual ao anterior."
                    }
                ]
            })
            .then((res) => 
            {
                console.log(res.data)
            }, e => {console.log(e)})
        },
        methods:{}
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
#box_button_elements_review
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