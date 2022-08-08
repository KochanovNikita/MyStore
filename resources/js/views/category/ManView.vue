<template>
    <div v-if="products" class="row">

        <template v-for="product in products">
            <product-card-vue :product="product"></product-card-vue>
        </template>


    </div> <!-- / .row -->
</template>

<script>
import ProductCardVue from '../../components/ProductCard.vue'
export default {
    name: 'ManCategory',
    components: {
        ProductCardVue
    },
    computed: {
        products() {
            return this.$store.getters.products
        },
    },
    mounted() {
        this.$store.dispatch('getManProducts')
    },
}
</script>

<style lang="scss" scoped>
</style>
