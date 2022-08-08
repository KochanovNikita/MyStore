import axios from "axios"

const state = {
    products: null,
}

const getters = {
    products: state => {
        return state.products
    }
}

const mutations = {
    setProducts(state, products) {
        state.products = products
    }
}

const actions = {
    getProducts({commit}, category) {
        if (category) {
            axios.get(`api/product/${category}`)
            .then(response => {
                commit('setProducts', response.data.data)
            })
            .catch(error => console.error(error))
        } else {
            axios.get('/api/product')
            .then(response => {
                commit('setProducts', response.data.data)
            })
            .catch(error => console.error(error))
        }
    },
}

export default {
    state,
    getters,
    mutations,
    actions
}
