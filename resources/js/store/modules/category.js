const state = {
    categories: null
}

const getters = {
    categories: state => {
        return state.categories
    }
}

const mutations = {
    setCategories(state, categories) {
        state.categories = categories
    }
}

const actions = {
    getCategories({commit}) {
        axios.get('api/category')
            .then(response => {
                commit('setCategories', response.data.data)
            })
            .catch(error => console.error(error))
    },
}

export default {
    state,
    getters,
    mutations,
    actions
}