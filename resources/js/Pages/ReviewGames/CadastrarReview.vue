<template>
  <div class="container-fluid">
    <AddElements>
        <template #buttonForm>
            <button class="botao_confirmar">
                Cadastrar review
            </button>
        </template>
    </AddElements>
  </div>
</template>



<script>
    import AddElements from '@/MyElements/AddElements.vue';

    export default
    {
        data()
        {
            return{
                formReview:
                {
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
                    requirements: [
                        {
                            hardware: "",
                            value: "",
                            level: ""
                        },
                    ],
                    elements: [
                        {
                            name_element: "",
                            text_element: ""
                        }
                    ],
                    id_user: 1
                }
            }
        },
        mounted(){},
        methods:
        {
            sendFormReview()
            {
                axios.post('/api/add-review', 
                {
                    
                })
                .then((res) => 
                {
                    console.log(res.data)
                }, e => {console.log(e)})
            }            
        },
        props:{},
        components:
        {
            AddElements
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