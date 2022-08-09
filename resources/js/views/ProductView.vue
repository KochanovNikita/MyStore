<template>
    <div v-if="product" class="container bootdey">
        <div class="col-md-12">
            <section v-if="product" class="panel">
                <div class="panel-body row col-12 d-flex justify-content-beetwen mx-1">
                    <div class="col-md-5">
                        <div id="carouselExampleFade" class="carousel slide carousel-fade pro-img-details"
                            data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img :src="product.main_image" class="d-block w-100" :alt="product.title">
                                </div>
                                <template v-for="image in product.images">
                                    <div class="carousel-item">
                                        <img :src="image.image_path" class="d-block w-100" :alt="product.title">
                                    </div>
                                </template>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>

                    </div>
                    <div class="col-md-6 px-md-2">
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
                                <span class="amount-old">{{ product.price }} BYN</span>
                                <span class="pro-price"> {{ product.price_with_discount }} BYN</span>
                            </template>
                            <span class="pro-price" v-else>{{ product.price }}</span>

                        </div>
                        <div class="pro-img-list px-3">
                            <template v-for="similar in product.product_group">
                                <router-link :to="{ name: 'product', params: { id: similar.id } }" class="shop__thumb"
                                    @click="getProduct(similar.id)">
                                    <img class="w-50" :src="similar.preview_image" :alt="similar.title">
                                </router-link>
                            </template>
                        </div>
                        <div class="form-group">
                            <label>Кроичество</label>
                            <input type="number" v-model="quantity" class="form-control quantity">
                        </div>
                        <div class="card mt-2 bg-opacity-50 bg-gradient-info" v-if="success">
                            <div class="card-body">
                                Товар добавлен в корзину
                            </div>
                        </div>
                        <p>
                            <button class="btn btn-success" :disabled="isValid" @click.prevent="addToCart">
                                <i class="fa fa-shopping-cart"></i>
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
            quantity: 1,
            success: false
        }
    },
    mounted() {
        this.getProduct(this.$route.params.id)
    },
    computed: {
        isValid() {
            if (this.quantity < 1) {
                return true
            }
            return false
        },
    },

    methods: {
        getProduct(id) {
            axios.get(`/api/product/${id}`)
                .then(resp => {
                    this.product = resp.data.data
                    console.log(resp.data.data);
                    this.success = false
                    this.quantity = 1
                })
                .catch(err => console.error(err))
        },

        addToCart() {
            let cart = JSON.parse(localStorage.getItem('cart'))
            let item = {
                id: this.product.id,
                quantity: this.quantity,
                price: this.product.price_with_discount.toFixed(2),
                total_price: (this.product.price_with_discount * this.quantity).toFixed(2)
            };
            if (!cart) {
                localStorage.setItem('cart', JSON.stringify([item]))
            } else {

                cart.forEach(element => {
                    if (item != null && element.id == item.id ) {
                        element.quantity = element.quantity * 1 + item.quantity * 1
                        element.price = (item.price * 1).toFixed(2)
                        element.total_price = (item.total_price * element.quantity).toFixed(2)

                        item = null
                    }
                });
                if (item)
                    cart.push(item)

                localStorage.setItem('cart', JSON.stringify(cart))
                this.$store.dispatch('setCart')
                this.successAdd()
            }
        },
        successAdd() {
            this.success = true
            setTimeout(() => {
                this.success = false
            }, 5000)
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
