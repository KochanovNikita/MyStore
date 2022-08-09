<template>

    <div class="d-flex align-items-center justify-content-center register">
        <div v-if="user">
            {{ user.name }}
        </div>
        <h6 v-if="error">
            {{ error }}
        </h6>
        <div class="card ">
            <div class="card-body login-card-body">

                <p class="login-box-msg">Войти в аккаунт</p>

                <form>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" v-model="login.email"
                            placeholder="введите Ваш Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>

                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" v-model="login.password"
                            placeholder="Введите Ваш пароль">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" v-model="login.remember" id="remember">
                                <label for="remember">
                                    Запомнить меня
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button @click.prevent="handleLogin" class="btn btn-primary btn-block">Войти</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <p class="mb-0">
                    <router-link to="/register" class="text-center">Зарегистрироваться</router-link>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>



</template>

<script>
import axios from 'axios'

export default {
    name: 'Login',
    data() {
        return {
            user: null,
            error: null,
            login: {
                email: '',
                password: '',
                remember: '',
            }
        }
    },
    methods: {
        handleLogin() {
            axios.get('/sanctum/csrf-cookie')
                .then(response => {
                    axios.post('/login', this.login)
                        .then(resp => {
                            this.$store.dispatch("getUser");
                            this.$router.push('/');
                        }).catch(error => console.log(error))
                })

        }
    },
}
</script>

<style>
.register {
    min-height: 80vh;
}
</style>
