<template>

    <div class="d-flex align-items-center justify-content-center register">
        <div v-if="user">
            {{ user.name }}
        </div>
        <div class="card ">
            <div class="card-body login-card-body">

                <p class="login-box-msg">Создать аккаунт</p>

                <form>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="name" v-model="register.name"
                            placeholder="введите Вашу имя">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" v-model="register.email"
                            placeholder="введите Ваш Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" v-model="register.password"
                            placeholder="Введите пароль">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password_confirmation"
                            v-model="register.password_confirmation" placeholder="Повторите пароль">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" v-model="register.remember" id="remember">
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
                    <router-link to="/login" class="text-center">У меня уже есть аккаунт</router-link>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>



</template>

<script>
import axios from 'axios'

export default {
    name: 'Register',
    data() {
        return {
            user: null,
            errors: null,
            register: {
                name: '',
                email: '',
                password: '',
                password_confirmation: '',
                remember: ''
            }
        }
    },
    methods: {
        handleLogin() {
            axios.get('/sanctum/csrf-cookie')
                .then(response => {
                    axios.post('/register', this.register)
                        .then(resp => {
                            this.$store.dispatch('getUser')
                            this.$router.push('/')
                        }).catch(error => console.error(error))
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
