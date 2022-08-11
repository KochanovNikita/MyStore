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
    name: 'WomanCategory',
    components: {
        ProductCardVue
    },
    mounted() {
        this.$store.dispatch('setGenderMutation', 2)
        this.$store.dispatch('getProducts', {'gender_id': 2})
    },
    computed: {
        products() {
            return this.$store.getters.products
        },
    },
}
</script>

<style lang="scss" scoped>
</style>
