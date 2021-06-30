<template>
<main class="py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Register</div>

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
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control " name="name" value="" required autocomplete="name" autofocus v-model="name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control " required autocomplete="email" v-model="email">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control " required autocomplete="new-password" v-model="password">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" required autocomplete="new-password" v-model="password_2">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
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
    name: "register",
    props: ['app'],
    data() {
        return {
            name: '',
            email: '',
            password: '',
            password_2: '',
            errors: []
        }
    },
    methods: {
        onSubmit() {
            this.errors = [];
            if (!this.name)
            {
                this.errors.push('نام خود را وارد کنید');
            }
            if (!this.email)
            {
                this.errors.push('لطفا ایمیل خود را وارد کیند');
            }
            if (!this.password)
            {
                this.errors.push('لطفا پسورد خود را وارد کنید');
            }
            if (!this.password_2)
            {
                this.errors.push('لطفا پسورد خود را وارد کنید');
            }
            if (this.password !== this.password_2)
            {
                this.errors.push('پسورد ها با هم برار نیست');
            }
            if(!this.errors.length)
            {
                const data = {
                    name: this.name,
                    email: this.email,
                    password: this.password,
                }
                this.app.req.post('user/register' , data).then(response => {
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