<template>
    <Head title="Login" />

    <div class="container">

        <div class="row justify-content-center align-items-center">
            <div class="box_form col-sm-6 mt-5">

                <h2 class="logo">
                    REVIWW
                </h2>

                <!-- FORMULÁRIO -->
                <form @submit.prevent="sendFormLogin" >

                    <div v-if="erroForm!==''" class="alert alert-danger">
                        <b>{{ erroForm }}</b>
                    </div>

                    <div>
                        <label for="email">Email</label>
                        <input 
                            id="email" 
                            type="email" 
                            v-model="form.email" 
                            name="email"
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
                            name="password"
                            placeholder="*************"
                            required 
                            autocomplete="current-password" 
                        />
                    </div>

                    <div class="h-captcha" data-sitekey="b435f683-b5cc-47ed-96d8-66fd751164a5"></div>

                    <div class="mt-4">
                        <div class="row">

                            <div class="col">
                                <button class="botao_confirmar" type="submit">
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
                },
                erroForm: ""
            }
        },
        mounted(){},
        methods:
        {
            sendFormLogin()
            {
                if (hcaptcha.getResponse() !== "")
                {
                    let h_response = document.getElementsByName("h-captcha-response")[0].value
                    let body = {
                        email: this.form.email, 
                        password: this.form.password,
                        h_response: h_response
                    }
                    axios.post('/make-login-user', body)
                    .then(res => {
                        if(res.data == "login efetuado")
                        {
                            location.href = "/"
                        }else
                        {this.erroForm = res.data}
                    }, e => {
                        this.erroForm = Object.values(e.response.data.errors)[0][0]
                    })
                    return true
                }
                this.erroForm = "O campo de sou humano não foi selecionado."
            }
        },
        components:
        { 
        },
        props:
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