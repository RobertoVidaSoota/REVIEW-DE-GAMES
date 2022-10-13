<template>
    <Head title="Register" />


        <div class="container">
            <div class="row box_form justify-content-center align-items-center">
                <div class="col-sm-6">

                    <h2 class="logo">
                        REVIWW
                    </h2>

                    <div v-if="erroForm!==''" class="alert alert-danger">
                        <b>{{ erroForm }}</b>
                    </div>

                    <!-- FORMULÁRIO -->
                    <form @submit.prevent="sendFormRegister">
                        <div>
                            <label for="name">Nome Usuário</label>
                            <input
                                id="name"
                                v-model="name"
                                type="text"
                                class=""
                                placeholder="exemplo53492_"
                                required
                                autofocus
                                autocomplete="name"
                            />
                        </div>

                        <div class="mt-4">
                            <label for="emial">E-mail</label>
                            <input
                                id="email"
                                v-model="email"
                                type="email"
                                class=""
                                placeholder="exemplo@mail.com.br"
                                required
                            />
                        </div>

                        <div class="mt-4">
                            <label for="password">Senha</label>
                            <input
                                id="password"
                                v-model="password"
                                type="password"
                                class=""
                                placeholder="*************"
                                required
                                autocomplete="new-password"
                            />
                        </div>

                        <div class="mt-4">
                            <label for="password_confirmation">Confirmar senha</label>
                            <input
                                id="password_confirmation"
                                v-model="password_confirmation"
                                type="password"
                                class=""
                                placeholder="*************"
                                required
                                autocomplete="new-password"
                            />
                        </div>

                        <div class="mt-4 row">

                            <div class="col">
                                <button class="botao_confirmar">
                                    Cadastrar-se
                                </button>
                            </div>

                            <div class="col">
                                <a href="/login" class="link_faca_login">Ja tem tem conta? faça o login!</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


</template>

<script>
    import { Head } from '@inertiajs/inertia-vue3'

    export default
    {
        data(){
            return{
                name: '',
                email: '',
                password: '',
                password_confirmation: '',
                erroForm: ''
            }
        },
        methods:
        {
            sendFormRegister()
            {
                let body = 
                {
                    name_user: this.name,
                    email: this.email,
                    password: this.password,
                    password_confirmation: this.password_confirmation
                }
                axios.post('add-register', body).then(res => 
                {
                    if(res.data === "Cadastro efetuado"){location.href='/'}
                    else{this.erroForm == res.data}
                }, e => { 
                    this.erroForm = Object.values(e.response.data.errors)[0][0] 
                })
            }
        },
        components:
        {
            Head
        }
    }
</script>



<!-- STYLES -->
<style>
    .link_faca_login
    {
        display: block;
        width: fit-content;
        margin: 0 0 0 auto;
    }
</style>
