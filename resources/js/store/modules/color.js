const state = {
    colors: null
}

const getters = {
    colors: state => {
        return state.colors
    }
}

const mutations = {
    setColors(state, colors) {
        state.colors = colors
    }
}

const actions = {
    getColors({commit}) {
        axios.get('api/color')
            .then(response => {
                commit('setColors', response.data.data)
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
