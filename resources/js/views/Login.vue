<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Login</div>

                    <div class="card-body">
                        <form @submit.prevent="processLogin">

                            <div v-if="errorMessage" class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Error!</strong> {{ errorMessage }}
                            </div>

                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">Username Or
                                    Email</label>
                                <div class="col-md-6">
                                    <input id="username" type="username"
                                        v-model="form.username"
                                        class="form-control" name="username" required autofocus>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        v-model="form.password"
                                        class="form-control" name="password"
                                        required autocomplete="current-password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember">

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
                                </div>
                            </div>
                            {{ JSON.stringify(form) }} <br>
                            {{ errorMessage }} <br>
                            {{ JSON.stringify(user) }}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
import axios from 'axios'
    export default {
        data() {
            return {
                form: {
                    username: '',
                    password: '',
                },
                errorMessage: '',
                user: '',
            }
        },
        methods: {
            processLogin() {
                this.errorMessage = ''
                axios.get('/sanctum/csrf-cookie').then(response => {
                    axios.post('/api/login', this.form).then((response) => {
                        console.log(response);
                        this.user = response.data.user
                    }).catch((error) => {
                        this.errorMessage = error.response.data.message
                        console.log('error', error.response)
                    });
                });
            }
        },
        mounted() {
            // console.log(this.form)
        }
    }
</script>

