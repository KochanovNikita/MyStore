<template>
    <div class="container px-3 my-5 clearfix">
        <!-- Shopping cart table -->
        <div class="card oldlace">
            <div  class="card-body">
                <div class="table-responsive">
                    <table class="table table-boreder m-0">
                        <thead>
                            <tr>
                                <!-- Set columns width -->
                                <th class="text-center py-3 px-4" style="min-width: 400px;">Product Name &amp; Details
                                </th>
                                <th class="text-right py-3 px-4" style="width: 100px;">Price</th>
                                <th class="text-center py-3 px-4" style="width: 120px;">Quantity</th>
                                <th class="text-right py-3 px-4" style="width: 100px;">Total</th>
                                <th class="text-center align-middle py-3 px-0" style="width: 40px;"><a href="#"
                                        class="shop-tooltip float-none text-light" title=""
                                        data-original-title="Clear cart"><i class="ino ion-md-trash"></i></a></th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-if="cart && cart.length > 0" v-for="item in cart" :key="item.id">
                                <cart-item :item="item" ></cart-item>
                            </template>
                            <div v-else>
                                <h3>Вы еще не добавляли товары в корзину</h3>
                            </div>
                        </tbody>
                    </table>
                </div>
                <!-- / Shopping cart table -->

                <div class="d-flex flex-wrap justify-content-between align-items-center">
                    <div class="mt-2">
                        <div class="form-group mb-3">
                            <label class="form-label">Имя: </label>
                            <span class="text-danger" v-if="errors && errors.name">{{errors.name[0]}}</span>
                            <input class="form-control" v-model="customer.name" type="text">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Номер телефона: </label>
                            <span class="text-danger" v-if="errors && errors.phone">{{errors.phone[0]}}</span>
                            <input class="form-control" v-model="customer.phone" type="tel">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Адрес: </label>
                            <span class="text-danger" v-if="errors && errors.address">{{errors.address[0]}}</span>
                            <input class="form-control" v-model="customer.address" type="text">
                        </div>
                    </div>
                      <div class="card mt-2 bg-opacity-50 bg-gradient-info" v-if="success">
                            <div class="card-body">
                                Товар добавлен в корзину
                            </div>
                        </div>
                    <div class="text-right">
                        <label class="text-muted font-weight-normal m-0">Total price</label>
                        <div class="text-large">
                            <strong>{{total_price}} BYN</strong>
                        </div>
                    </div>
                </div>

                <div class="float-right">
                    <button v-if="user" type="button" @click.prevent="storeOrder" class="btn btn-lg btn-primary"
                        :disabled=" !cart || cart.length < 1 || cartIsEmpty">Купить</button>
                    <router-link to="/login" v-if="!user" class="btn btn-lg btn-warning" >
                        Войдите что бы совершить покупку
                    </router-link>
                    </div>

            </div>
        </div>

    </div>
</template>

<script>
import axios from 'axios'
import CartItem from '../components/CartItem.vue'

export default {
    name: 'ShoppingCart',
    data() {
        return {
            success: false,
            total_price: 0,
            errors: null,
            cartIsEmpty: false
        }
    },
    components: {
        CartItem
    },
    created() {
        this.$store.dispatch('setCart')
    },
    updated() {
        this.$store.dispatch('setCart')
    },
    mounted() {
        this.countTotal()
    },
    computed: {
        user() {
            return this.$store.getters.user
        },
        customer() {
            if (this.user) {
                return {
                    name: this.user.name,
                    phone: this.user.phone,
                    address: this.user.address,
                }
            }
            else {
                return {
                    name: '',
                    phone: '',
                    address: '',
                }
            }
        },
        cart() {
            return this.$store.getters.cart
        }
    },
    methods: {
        storeOrder() {
            axios.post('/api/order', {
                'products': this.cart,
                'name': this.customer.name,
                'phone': this.customer.phone,
                'address': this.customer.address,
                'total_price': this.total_price,
            })
            .then(response => {
                localStorage.removeItem('cart')
                this.$store.dispatch('setCart')
                this.successBuy()
            })
            .catch(error => {
                this.errors = error.response.data.errors;
                console.log(error);
            })
        },
        countTotal() {
            this.total_price = 0
            if(this.cart && this.cart.length > 0) {
                this.cart.forEach(element => {
                this.total_price = (this.total_price*1 + element.total_price*1).toFixed(2)
            });
            }
        },
        successBuy() {
            this.success = true
                setTimeout(()=>{
                    this.success = false
                }, 3000)
        }
    },


}
</script>

<style>
.oldlace {
    background-color: #eee;
}
</style>
