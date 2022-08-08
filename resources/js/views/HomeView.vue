<script>
export default {
    name: 'Home',
    mounted() {
        this.$store.dispatch('getCategories')
        this.$store.dispatch('getColors')
        this.$store.dispatch('getCompanies')
    },
    computed: {
        colors() {
            return this.$store.getters.colors
        },
        categories() {
            return this.$store.getters.categories
        },
        companies() {
            return this.$store.getters.companies
        }
    },
    methods: {
        click() {
            console.log(this.colors);
            console.log(this.categories);
            console.log(this.companies);
        }
    },
}
</script>

<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-md-3">
                <div class="row mb-3">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Искать товары">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" @click="click">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Filter -->
                <form class="shop__filter">
                    <!-- Price -->
                    <h5 class="headline">
                        <span>Price</span>
                    </h5>
                    <div class="form-group shop-filter__price">
                        <div class="row">
                            <div>
                                <input id="shop-filter-price_from" type="number" min="0" class="form-control mb-1"
                                    placeholder="From" />
                                <input id="shop-filter-price_to" type="number" min="0" class="form-control mb-1"
                                    placeholder="To" />
                            </div>
                        </div>
                    </div>
                    <h5>
                        Категории
                    </h5>
                    <div class="row mb-3">
                         <template v-if="categories" v-for="category in categories">
                        <div class="accordion accordion-flush" :id="`accordionFlush${category.id}`">
                            <div class="accordion-item">
                                <h2 class="accordion-header" :id="`flush-headingOne${category.id}`">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        :data-bs-target="`#flush-collapseOne${category.id}`" aria-expanded="false"
                                        :aria-controls="`flush-collapseOne${category.id}`">
                                        {{category.title}}
                                    </button>
                                </h2>
                                <div :id="`flush-collapseOne${category.id}`" class="accordion-collapse collapse"
                                    :aria-labelledby="`flush-headingOne${category.id}`" :data-bs-parent="`#accordionFlush${category.id}`">
                                    <ul class="list-group">
                                        <div class="list-group-item list-group-item-action list-group-item-light " v-for="subcategory in category.subcategories">
                                           {{subcategory.title}}
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </template>
                    </div>

                    <!-- Checkboxes -->
                    <h5 class="headline">
                        <span>Брэнды</span>
                    </h5>
                    <div class="form-check">
                        <template v-if="companies" v-for="company in companies">
                            <div class="row py-2 px-4">
                                <input class="form-check-input" type="checkbox" :value="company.id" :id="`company${company.id}`">
                                <label class="form-check-label" :for="`company${company.id}`">
                                    {{company.title}}
                                </label>
                            </div>
                        </template>

                    </div>


                    <!-- Colors -->
                    <h5 class="headline">
                        <span>Цвета</span>
                    </h5>
                    <div>
                        <div class="row">
                            <template v-if="colors" v-for="color in colors">
                            <input class="d-none" type="checkbox" :value="color.id" :id="`color${color.id}`">
                                <label class="color m-1"
                                :style="`background-color: ${color.title};`"
                                :for="`color${color.id}`">
                                </label>
                            </template>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-sm-8 col-md-9">
                <!-- Filters -->
                <ul class="shop__sorting">
                    <li :class="this.$route.name == 'all' ? 'active' : ''">
                        <router-link to="/">Всем</router-link>
                    </li>
                    <li :class="this.$route.name == 'man' ? 'active' : ''">
                        <router-link to="/man">Мужчинам</router-link>
                        </li>
                    <li :class="this.$route.name == 'woman' ? 'active' : ''">
                        <router-link to="/woman">Женщинам</router-link>
                    </li>
                </ul>

                <router-view>

                </router-view>


                <!-- Pagination -->
                <div class="row">
                    <div class="col-sm-12">

                    </div>
                </div> <!-- / .row -->

            </div> <!-- / .col-sm-8 -->
        </div> <!-- / .row -->
    </div>
</template>

<style>
.color {
    width: 2rem;
    height: 2rem;
    border-radius: 90px;
    box-sizing: border-box;
}

.color:hover {
    box-shadow: 0 0 14px 6px rgb(221, 217, 217);
}

input[type=checkbox]:checked + .color{
     box-shadow: 0 0 14px 6px rgb(122, 165, 245);
}

/** Shop: Sorting **/
.shop__sorting {
    list-style: none;
    padding-left: 0;
    margin-bottom: 40px;
    margin-top: -20px;
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    text-align: right;
}

.shop__sorting>li {
    display: inline-block;
}

.shop__sorting>li>a {
    display: block;
    padding: 20px 10px;
    margin-bottom: -1px;
    border-bottom: 2px solid transparent;
    color: #757575;
    -webkit-transition: all .05s linear;
    -o-transition: all .05s linear;
    transition: all .05s linear;
}

.shop__sorting>li>a:hover,
.shop__sorting>li>a:focus {
    color: #333333;
    text-decoration: none;
}

.shop__sorting>li.active>a {
    color: #ed3e49;
    border-bottom-color: #ed3e49;
}

@media (max-width: 767px) {
    .shop__sorting {
        text-align: left;
        border-bottom: 0;
    }

    .shop__sorting>li {
        display: block;
    }

    .shop__sorting>li>a {
        padding: 10px 15px;
        margin-bottom: 10px;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }

    .shop__sorting>li.active>a {
        font-weight: 600;
    }
}
</style>
