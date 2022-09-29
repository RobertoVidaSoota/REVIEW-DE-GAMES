<template>
    <Head title="Register" />

        <form @submit.prevent="submit">
            <div>
                <input
                    id="name"
                    v-model="form.name"
                    type="text"
                    class="form-control"
                    required
                    autofocus
                    autocomplete="name"
                />
            </div>

            <div class="mt-4">
                <input
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="form-control"
                    required
                />
            </div>

            <div class="mt-4">
                <input
                    id="password"
                    v-model="form.password"
                    type="password"
                    class="form-control"
                    required
                    autocomplete="new-password"
                />
            </div>

            <div class="mt-4">
                <input
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    type="password"
                    class="form-control"
                    required
                    autocomplete="new-password"
                />
            </div>

            <div class="mt-4">

                <button class="btn btn-dark">
                    Register
                </button>
            </div>
        </form>
</template>

<script>
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
            
        }
    }
</script>
