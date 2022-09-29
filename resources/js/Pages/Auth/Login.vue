<template>
    <Head title="Login" />

    <div class="container">

        <div class="row justify-content-center align-items-center">
            <div class="box_form col-sm-6 mt-5">

                <h2 class="logo">
                    REVIWW
                </h2>

                <!-- FORMULÁRIO -->
                <form @submit.prevent="submit">
                    <div>
                        <label for="email">Email</label>
                        <input 
                            id="email" 
                            type="email" 
                            v-model="form.email" 
                            placeholder="exemplo@mail.com.br"
                            required 
                            autofocus>
                    </div>

                    <div class="mt-4">
                        <label for="password">Senha</label>
                        <input 
                            id="password" 
                            v-model="form.password" 
                            type="password"
                            placeholder="*************"
                            required 
                            autocomplete="current-password" 
                        />
                    </div>

                    <div class="mt-4">
                        <div class="row">

                            <div class="col">
                                <button class="botao_confirmar">
                                    Login
                                </button>
                            </div>

                            <div class="col">
                                <a href="/register" class="link_cadastre_se">
                                    Não tem conta? cadastre-se!
                                </a>
                            </div>

                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>

        
</template>

<script>
    
    export default
    {
        data(){
            return{
                form:{
                    email: '',
                    password: '',
                    remember: false,
                }
            }
        },
        methods:
        {
    
        },
        components:
        {
            
        }
    }
</script>




<style>
    .link_cadastre_se
    {
        display: block;
        width: fit-content;
        margin: 0 0 0 auto;
    }
</style>