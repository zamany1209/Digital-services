<template>
<main class="py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Login</div>

                    <div class="card-body">
                        <form v-on:submit.prevent="onSubmit">
                            <div class="alert alert-danger" v-if="errors.length">
                                <ui>
                                    <li v-for="(error, index) in errors" :key="index">
                                        {{ error }}
                                    </li>
                                </ui>
                            </div>
                            <input type="hidden" name="_token" value="w7PkgB9kyqPHvaszIj56FmnLLoTnjOfShHooKzD1">
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control " required autocomplete="email" autofocus v-model="email">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control " required autocomplete="current-password" v-model="password">

                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" >

                                        <label class="form-check-label" for="remember">
                                            Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>

                                    <a class="btn btn-link" href="http://127.0.0.1:8000/password/reset">
                                            Forgot Your Password?
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</template>

<script>
export default {
    name: "login",
    props: ['app'],
    data() {
        return {
            email: '',
            password: '',
            errors: []
        }
    },
    methods: {
        onSubmit() {
            this.errors = [];

            if (!this.email)
            {
                this.errors.push('لطفا ایمیل خود را وارد کیند');
            }
            if (!this.password)
            {
                this.errors.push('لطفا پسورد خود را وارد کنید');
            }
            if(!this.errors.length)
            {
                const data = {
                    email: this.email,
                    password: this.password,
                }
                this.app.req.post('user/login' , data).then(response => {
                    this.app.user = response.data;
                    this.$router.push('/');
                }).catch(error => {
                    this.errors.push(error.response.data.error)
                });
            }
        }
    }
}
</script>

<style>

</style>