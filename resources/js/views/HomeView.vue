<script>
export default {
    name: 'Home',
    data() {
        return {
            titleFilter: null,
            subcategoriesFilter: [],
            companiesFilter: [],
            colorsFilter: [],
            pricesFilter: {
                priceFrom: 0,
                priceTo: 9999999.
            },
        }
    },
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
        },
        pagination() {
            return this.$store.getters.pagination
        }
    },
    methods: {
        filterProducts(page) {
            this.$store.dispatch('getProducts', {
                'title': this.titleFilter,
                'prices': this.pricesFilter,
                'subcategories': this.subcategoriesFilter,
                'companies': this.companiesFilter,
                'colors': this.colorsFilter,
                'gender_id': this.$store.getters.gender,
                'page': page
            })
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
                            <input type="text"
                            v-model="titleFilter"
                            class="form-control" placeholder="Искать товары">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" @click="filterProducts">
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
                                <input id="shop-filter-price_from"
                                v-model="pricesFilter.priceFrom"
                                type="number" min="0" class="form-control mb-1"
                                    placeholder="From" />
                                <input id="shop-filter-price_to"
                                v-model="pricesFilter.priceTo"
                                type="number" min="0" class="form-control mb-1"
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
                                        <li class="list-group-item list-group-item-action list-group-item-light px-5" v-for="subcategory in category.subcategories">
                                           <input class="form-check-input" type="checkbox"
                                           v-model="subcategoriesFilter"
                                           :value="subcategory.id" :id="`flexCheckSubcategori${subcategory.id}`"/>
                                           <label class="form-check-label" :for="`flexCheckSubcategori${subcategory.id}`">
                                                {{subcategory.title}}
                                            </label>

                                        </li>
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
                                <input class="form-check-input"
                                v-model="companiesFilter"
                                type="checkbox" :value="company.id" :id="`company${company.id}`">
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
                            <input class="d-none"
                            v-model="colorsFilter"
                            type="checkbox" :value="color.id" :id="`color${color.id}`">
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
                        <router-link @click="$store.dispatch('setGender', '')" to="/">Всем</router-link>
                    </li>
                    <li :class="this.$route.name == 'man' ? 'active' : ''">
                        <router-link @click="$store.dispatch('setGender', 1)" to="/man">Мужчинам</router-link>
                        </li>
                    <li :class="this.$route.name == 'woman' ? 'active' : ''">
                        <router-link @click="$store.dispatch('setGender', 2)" to="/woman">Женщинам</router-link>
                    </li>
                </ul>

                <router-view>

                </router-view>


                <!-- Pagination -->
                <div v-if="pagination && pagination.last_page != 1" class="row mb-3">
                    <div class="col-sm-12">
                   <ul class="pagination text-center d-flex">
                        <li v-if="pagination.current_page != 1" class="next">
                            <a @click.prevent="filterProducts(pagination.current_page-1)">
                                &lt;&lt;
                            </a>
                        </li>
                        <template v-for="link in pagination.links">
                            <li v-if="Number(link.label) &&
                            (pagination.current_page - link.label < 2 &&
                            pagination.current_page - link.label > -2) ||
                            Number(link.label) === 1 || Number(link.label) === pagination.last_page"
                                @click.prevent="filterProducts(link.label)">
                                <a :class="link.active ? 'active' : ''">{{ link.label }}</a>
                            </li>
                            <template v-if="Number(link.label) &&
                                pagination.current_page !== 3 &&
                                pagination.current_page - link.label === 2 ||
                                Number(link.label) &&
                                pagination.current_page !== pagination.last_page - 2 &&
                                pagination.current_page - link.label === -2">
                                <div>
                                    ...
                                </div>
                            </template>
                        </template>

                        <li v-if="pagination.current_page != pagination.last_page" class="next">
                            <a @click.prevent="filterProducts(pagination.current_page+1)">
                                >>
                            </a>
                        </li>
                    </ul>
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
.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color .3s;
  border: 1px solid #ddd;
  margin: 0 4px;
  cursor: pointer;
  font-size: 1rem;
}

.pagination a.active {
  background-color: #cd1520;
  color: white;
  border: 1px solid #cd1520;
}

.pagination a:hover:not(.active) {background-color: #c9323c;}
</style>
