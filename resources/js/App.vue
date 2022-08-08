<template>
    <header-component></header-component>
    <main>
        <router-view></router-view>
    </main>
</template>

<script>
import axios from 'axios';
import HeaderComponent from './components/HeaderComponent.vue';

export default {
    name: 'App',
    components: {
        HeaderComponent
    },
    mounted() {
        axios.get('/sanctum/csrf-cookie')
            .then(response => {
                this.$store.dispatch('getUser')
            })
            .catch(err => console.error(err))
    },
}
</script>

<style>
body {
    background: #eee;
}
</style>
