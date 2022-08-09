<template>
    <tr v-if="item && product && !destroyed">
        <td class="p-4">
            <div class="media align-items-center">
                <img :src="product.preview_image" class="d-block cart-img ui-w-40 ui-bordered mr-4"
                    :alt="product.title">
                <div class="media-body">
                    <router-link :to="{name: 'product', params: {id: item.id}}" class="d-block text-dark">{{product.title}}</router-link>
                    <small class="d-flex">
                        <span class="text-muted">Цвет: {{product.color.title_ru}}</span>
                        <span class="cart-color mx-2"
                            :style="`background: ${product.color.title};`"></span>
                    </small>
                    <small class="d-flex">
                        <span class="text-muted">Пол: {{product.gender}}</span>
                    </small>
                    <small class="d-flex">
                        <span class="text-muted">Категория: {{product.category.title}}</span>
                    </small>
                </div>
            </div>
        </td>
        <td class="font-weight-semibold align-middle ">{{newItem.price}} BYN</td>
        <td class="align-middle p-4">
            <input type="number"
            min="0"
            class="form-control text-center"
            @input="onInput($event)"
            @focusout="focusOut()"
            ref="qty"
            v-model="newItem.quantity"></td>
        <td  class="font-weight-semibold align-middle "><span ref="total_price">{{newItem.total_price}}</span> BYN</td>
        <td class="text-center align-middle px-0">
            <button @click.prevent="removeItem" class="close float-none text-danger">X</button>
        </td>
    </tr>
</template>

<script>
import axios from 'axios'


export default {
    name: 'CartItem',
    data() {
        return {
            product: null,
            destroyed: false
        }
    },
    props: ['item'],
    computed: {
        newItem() {
            return {
                'id': this.item.id,
                'quantity': this.item.quantity,
                'price': this.item.price,
                'total_price': this.item.total_price,
            }
        }
    },
    mounted() {
        this.getProduct()
    },
    methods: {
        getProduct() {
            axios.get(`/api/product/cart/${this.item.id}`)
                .then(response => {
                    this.product = response.data.data
                })
        },
        onInput(e) {
           if (e.target.value < 1 && e.target.value != '') {
            e.target.value = 1
           }

            this.newItem.total_price = (this.newItem.price*e.target.value).toFixed(2)
            this.$refs.total_price.innerHTML = this.newItem.total_price
        },
        focusOut() {
            if (this.newItem.quantity < 1 || this.newItem.quantity == '') {
                this.newItem.quantity = 1
                this.$refs.qty.value = 1
            }
            this.newItem.total_price = (this.newItem.price*this.newItem.quantity).toFixed(2)
            let cart = JSON.parse(localStorage.getItem('cart'))
            cart.forEach(element => {
                if (element.id == this.newItem.id) {
                    element.quantity = this.newItem.quantity
                    element.total_price = this.newItem.total_price
                }
            });

            localStorage.setItem('cart', JSON.stringify(cart))
            this.$store.dispatch('setCart')
        },
        removeItem() {
            let storage = JSON.parse(localStorage.getItem('cart'))
            let newStorage = storage.filter(x => x.id !== this.newItem.id)
            localStorage.setItem('cart', JSON.stringify(newStorage))
            this.$store.dispatch('setCart')
            this.destroyed = true
        }
    },

}
</script>

<style>
.cart-img {
    width: 60px;
    height: 80px;
}

.cart-color {
    display:  inline-block;
    width: 16px;
    height: 16px;
    border-radius: 3px;
    box-sizing: border-box;
}

</style>
