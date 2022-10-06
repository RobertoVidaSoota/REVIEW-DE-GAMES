<template>
    <div id="cadastrar_review">

        <div id="form_review">

            <div id="box_link_voltar">
                <a href="/perfil/1">Voltar</a>
            </div>

            <h2>Adicionar</h2>

            <div class="box_button_elements_review">
                <button class="botao_medio">Título</button>
                <button class="botao_medio">Subtítulo</button>
                <button class="botao_medio">Parágrafo</button>
                <button class="botao_medio">Imagem</button>
                <button class="botao_medio">Citação</button>
            </div>

            <!-- FORMULÁRIO DE REVIEW -->
            <div id="box_form_review">
                <form v-on:submit.prevent="sendAddReview()">

                    <div class="box_input_review">
                        <input v-model="coisa" type="text" placeholder="Título principal">
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

                    <AddVideoGame></AddVideoGame>

                    <AddHardware></AddHardware>

                    <div class="box_input_review">
                        <input type="text" placeholder="Nota Final">
                    </div>

                    <div id="box_button_submit_review">
                        <slot name="buttonForm"></slot>
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
</template>

<script>
import AddHardware from '@/MyElements/AddHardware.vue';
import AddVideoGame from '@/MyElements/AddVideoGame.vue'

export default {
    methods:
    {
    },
    components:
    {
        AddHardware,
        AddVideoGame
    }
}
</script>

<style>

</style>