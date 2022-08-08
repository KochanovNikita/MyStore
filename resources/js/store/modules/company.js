const state = {
    companies: null
}

const getters = {
    companies: state => {
        return state.companies
    }
}

const mutations = {
    setCompanies(state, companies) {
        state.companies = companies
    }
}

const actions = {
    getCompanies({commit}) {
        axios.get('api/company')
            .then(response => {
                commit('setCompanies', response.data.data)
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