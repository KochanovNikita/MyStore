import { createStore } from "vuex";
import user from './modules/user';
import category from './modules/category';
import color from './modules/color';
import company from './modules/company';
import product from './modules/product';

const store = createStore({
    modules: {
        user,
        category,
        color,
        company,
        product
    }
})

export default store
