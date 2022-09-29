<template>
    <Head title="Login" />

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-sm-8 mt-5">

                <!-- FORMULÁRIO -->
                <form @submit.prevent="submit">
                    <div>
                        <label for="email">Email:</label>
                        <input id="email" type="email" v-model="form.email" required autofocus
                        class="form-control">
                    </div>

                    <div class="mt-4">
                        <label for="email">Email:</label>
                        <input id="password" v-model="form.password" type="password" required autocomplete="current-password" class="form-control"
                        />
                    </div>

                    <div class="mt-4">

                        <button class="btn btn-dark">
                            Log in
                        </button>
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
