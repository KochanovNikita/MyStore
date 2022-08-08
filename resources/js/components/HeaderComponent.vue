<template>
    <header class="py-3 mb-4 border-bottom">
        <div class="container d-flex flex-wrap align-items-center justify-content-center justify-content-md-between">
            <router-link to="/" class="mb-2 mb-md-0 text-dark text-decoration-none logo col-1">
                <i class="fas fa-store"></i>
            </router-link>

            <ul class="nav col-12 col-md-auto mb-2 d-flex justify-content-center mb-md-0">
                <li>
                    <router-link to="/" class="nav-link px-2 link-secondary">Главная</router-link>
                </li>
                <li v-if="user">
                    <router-link to="/profile" class="nav-link px-2 link-secondary">
                        Профиль
                    </router-link>

                </li>
                <li>
                    <router-link to="/checkout" class="nav-link px-2 link-secondary">
                        Корзина
                    </router-link>
                </li>
                <li v-if="isAdmin()">
                    <a href="/admin" class="nav-link px-2 link-secondary">Управление</a>
                </li>
            </ul>

            <div class="col-md-3 text-end">
                <template v-if="!user">
                    <router-link to="/login" class="btn btn-outline-primary me-2">Войти</router-link>
                    <router-link to="/register" class="btn btn-primary">Создать аккаунт</router-link>
                </template>
                <template v-if="user">
                    <button class="btn btn-outline-secondary" @click.prevent="handleLogout">
                        <i class="fa fa-sign-out"></i>
                        <span>Выйти</span>
                    </button>
                </template>

            </div>
        </div>
    </header>
</template>

<script>
import axios from 'axios'

export default {
    name: 'HeaderComponent',
    computed: {
        user() {
            return this.$store.getters.user
        }
    },
    methods: {
        handleLogout() {
            axios.post('/logout', {})
                .then(resp => {
                    this.$store.dispatch('logout')
                    if (this.$route.name == 'profile') {
                        this.$router.push('/')
                    }
                })
                .catch(error => console.error(error))
        },
        isAdmin() {
            if (this.user) {
                if (this.user.role_id == 1) {
                    return true
                }
            }
            return false
        },
        getUser() {
            console.log(this.user);
        }
    },

}
</script>

<style>
.logo {
    font-size: 32px;
}
</style>
