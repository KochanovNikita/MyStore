const state = {
    cart: null
}

const getters = {
    cart: state => {
        return state.cart
    }
}

const mutations = {
    setCartValue(state, cart) {
        state.cart = cart
    }
}

const actions = {
    setCart({commit}) {
        commit('setCartValue', JSON.parse(localStorage.getItem('cart')))
    }
}

export default {
    state,
    getters,
    mutations,
    actions
}
