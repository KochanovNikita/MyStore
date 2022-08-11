<template>
    <div v-if="products" class="row">

        <template v-for="product in products">
            <product-card-vue :product="product"></product-card-vue>
        </template>


    </div>
</template>

<script>
import ProductCardVue from '../../components/ProductCard.vue'
export default {
    name: 'AllCategory',
    components: {
        ProductCardVue
    },
    computed: {
        products() {
            return this.$store.getters.products
        },
    },
    mounted() {
        this.$store.dispatch('getProducts', {})
    },
}
</script>

<style lang="scss" scoped>
</style>
