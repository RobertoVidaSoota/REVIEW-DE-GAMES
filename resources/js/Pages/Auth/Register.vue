<template>
    <Head title="Register" />


        <div class="container">
            <div class="row box_form justify-content-center align-items-center">
                <div class="col-sm-6">

                    <h2 class="logo">
                        REVIWW
                    </h2>

                    <!-- FORMULÁRIO -->
                    <form @submit.prevent="submit">
                        <div>
                            <label for="name">Nome Usuário</label>
                            <input
                                id="name"
                                v-model="form.name"
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
                                v-model="form.email"
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
                                v-model="form.password"
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
                                v-model="form.password_confirmation"
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
                form:{
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                }
            }
        },
        methods:
        {
    
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
