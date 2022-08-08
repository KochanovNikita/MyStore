<template>
    <div class="container bootdey">
        <div class="col-md-12">
            <section v-if="product" class="panel">
                <div class="panel-body row col-12 d-flex justify-content-center mx-1">
                    <div class="col-md-5">
                        <div class="pro-img-details w-100">
                            <img :src="product.main_image" :alt="product.title">
                        </div>

                    </div>
                    <div class="col-md-6">
                        <h4 class="pro-d-title">
                            {{ product.title }}
                        </h4>
                        <p>
                            {{ product.description }}
                        </p>
                        <p>
                            {{ product.content }}
                        </p>
                        <div class="product_meta">
                            <span class="posted_in">
                                <strong>Категория:</strong> <span>{{ product.category.title }}</span>
                            </span>
                            <span class="tagged_as">
                                <strong>Подкатегории:</strong>
                            </span>
                        </div>
                        <div class="m-bot15">
                            <strong>Цена: </strong>
                            <template v-if="product.discount != 0">
                                <span class="amount-old">{{product.price}} BYN</span>
                                <span class="pro-price"> {{product.price_with_discount}} BYN</span>
                            </template>
                            <span class="pro-price" v-else>{{product.price}}</span>

                        </div>
                        <div class="pro-img-list">
                            <template  v-for="similar in product.product_group">
                            <router-link
                            :to="{name: 'product', params: {id: similar.id}}"
                            class="shop__thumb"
                            @click="getProduct(similar.id)">
                                <img class="w-50" :src="similar.preview_image" :alt="similar.title">
                            </router-link>
                            </template>
                        </div>
                        <div class="form-group">
                            <label>Кроичество</label>
                            <input type="number" v-model="quantiy" class="form-control quantity">
                        </div>
                        <p>
                            <button class="btn btn-success" type="button"><i class="fa fa-shopping-cart"></i>
                                Добавить в корзину
                            </button>
                        </p>
                    </div>
                </div>
            </section>
        </div>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    name: 'Product',
    data() {
        return {
            product: null,
            quantiy: 1,
        }
    },
    mounted() {
        this.getProduct(this.$route.params.id)
    },
    methods: {
        getProduct(id) {
            axios.get(`/api/product/${id}`)
                .then(resp => {
                    this.product = resp.data.data
                    console.log(resp.data.data);
                })
                .catch(err => console.error(err))
        },
        addToCart() {
            if (localStorage.getItem('cart')) {

            } else {
                localStorage.setItem('setItem', cart)
            }
        }
    },
}
</script>

<style>
/*panel*/
.shop__thumb {
    border: 1px solid rgba(0, 0, 0, 0.05);
    background-color: white;
    color: #777777;
    text-align: center;
    -webkit-transition: border-color 0.1s, -webkit-box-shadow 0.1s;
    -o-transition: border-color 0.1s, box-shadow 0.1s;
    transition: border-color 0.1s, box-shadow 0.1s;
}

.shop__thumb:hover {
    border-color: rgba(0, 0, 0, 0.07);
    color: #333333;
    -webkit-box-shadow: 0 5px 30px rgba(0, 0, 0, 0.07);
    box-shadow: 0 5px 30px rgba(0, 0, 0, 0.07);
}

.panel {
    border: none;
    box-shadow: none;
}

.pro-img-details {
    margin-left: -15px;
}

.pro-img-details img {
    width: 100%;
}

.pro-d-title {
    font-size: 16px;
    margin-top: 0;
}

.product_meta {
    border-top: 1px solid #eee;
    border-bottom: 1px solid #eee;
    padding: 10px 0;
    margin: 15px 0;
}

.product_meta span {
    display: block;
    margin-bottom: 10px;
}

.product_meta a,
.pro-price {
    color: #fc5959;
}

.pro-price,
.amount-old {
    font-size: 18px;
    padding: 0 10px;
}

.amount-old {
    text-decoration: line-through;
}

.quantity {
    width: 120px;
}

.pro-img-list {
    margin: 10px 0 0 -15px;
    width: 100%;
    display: inline-block;
}

.pro-img-list a {
    float: left;
    margin-right: 10px;
    margin-bottom: 10px;
}
</style>
