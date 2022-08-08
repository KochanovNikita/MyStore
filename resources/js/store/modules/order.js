import axios from "axios"

const state = {
    orders: null
}

const getters = {
    orders: state => {
        return state.orders
    },
}

const mutations = {
    setOrders(state, orders) {
        state.orders = orders
    }
}

const actions = {
    getOrders({commit}, user) {
        axios.get(`/api/order/${user}`)
            .then(response => {
                commit('setOrders', response.data.data)
                console.log(response.data.data);
            })
            .catch(errror => console.error(errror))
    }
}

export default {
    state,
    getters,
    mutations,
    actions
}
