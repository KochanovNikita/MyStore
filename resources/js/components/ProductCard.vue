<template>
      <div class="col-sm-6 col-md-4">
          <router-link :to="{name: 'product', params: {id: product.id}}" class="d-block shop__thumb">
              <div class="shop-thumb__img">
                <img :src="product.preview_image" class="img-responsive" :alt="product.title">
              </div>
              <h5 class="shop-thumb__title">
                {{product.title}}
              </h5>
              <h6 class="shop-thumb__title">
                {{product.description}}
              </h6>
              <div v-if="product.discount == 0" class="shop-thumb__price">
                {{product.price}}
              </div>
              <div v-else>
                <span class="shop-thumb-price_old ">{{product.price}}</span>
                <span class="shop-thumb-price_new mx-3">{{product.price_with_discount}}</span>
              </div>
          </router-link >
        </div>
</template>

<script>
export default {
    name: 'ProductCart',
    props: ['product'],
}
</script>

<style>
.shop__thumb {
    border: 1px solid rgba(0, 0, 0, 0.05);
    padding: 20px;
    margin-bottom: 20px;
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

.shop__thumb>a {
    color: #333333;
}

.shop__thumb>a:hover {
    text-decoration: none;
}

.shop-thumb__img {
    position: relative;
    margin-bottom: 20px;
    overflow: hidden;
}

.shop-thumb__title {
    font-weight: 600;
}

.shop-thumb__price {
    color: #777777;
}

.shop-thumb-price_old {
    text-decoration: line-through;
}

.shop-thumb-price_new {
    color: red;
}
</style>
