<template>
    <div class="container">
        <template v-if="orders" v-for="order in orders">
            <div class="card col-12 mb-3 border-bottom ">
                <div class="cart-header d-flex justify-content-between p-3">
                    <div class="cart-title">Заказ #{{ order.id }}</div>
                    <div class="cart-title d-flex flex-column">
                        <div>{{ order.created_at }}</div>
                        <div class="text-center text-sm-right">
                            <span class="badge badge-success">{{ order.status }}</span>
                        </div>
                    </div>
                </div>
                <div v-for="product in order.products">

                    <div class="card-body row col-12 p-3">
                        <div class="d-flex justify-content-between ">
                            <div class="d-flex flex-wrap">
                                <img :src="product.product.preview_image"
                                    class="d-block cart-img ui-w-40 ui-bordered mr-4" :alt="product.product.title">
                                <div>
                                    <router-link :to="{ name: 'product', params: { id: product.product.id } }"
                                        class="d-block text-dark">
                                        {{
                                                product.product.title
                                        }}
                                    </router-link>
                                    <small class="d-flex">
                                        <span class="text-muted">Цвет: {{ product.product.color.title_ru }}</span>
                                        <span class="cart-color mx-2"
                                            :style="`background: ${product.product.color.title};`"></span>
                                    </small>
                                    <small class="d-flex">
                                        <span class="text-muted">Пол: {{ product.product.gender }}</span>
                                    </small>
                                    <small class="d-flex">
                                        <span class="text-muted">Категория: {{ product.product.category.title }}</span>
                                    </small>
                                </div>
                            </div>
                            <div class="align-text-top">
                                <h6>Количество: {{ product.quantity }}</h6>
                                <h6>Цена за один товар: {{ product.price.toFixed(2) }} BYN</h6>
                                <h6>Сумма: {{ product.total_price }} BYN</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <h4>Итоговая цена: {{order.total_price}} BYN</h4>
                </div>
            </div>

        </template>

        <div v-else>
            <h4>Вы еще не сделали ни одного заказа</h4>
        </div>
    </div>
</template>

<script>
export default {
    name: 'MyOrder',
    computed: {
        orders() {
            return this.$store.getters.orders
        },
        user() {
            return this.$store.getters.user
        }
    },
    mounted() {
        if (this.user) {
                 this.$store.dispatch('getOrders', this.user.id)
            }
    },
    watch: {
        user(newUser, oldUser) {
            if (newUser) {
                this.$store.dispatch('getOrders', this.user.id)
            }
        }
    }

}
</script>

<style>
</style>