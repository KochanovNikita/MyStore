import { createStore } from "vuex";
import user from './modules/user';
import category from './modules/category';
import color from './modules/color';
import company from './modules/company';
import product from './modules/product';
import order from './modules/order'

const store = createStore({
    modules: {
        user,
        category,
        color,
        company,
        product,
        order
    }
})

export default store
