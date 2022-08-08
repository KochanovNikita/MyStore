import axios from "axios"

const state = {
    user: null,
    userErrors: null,
    profileUpdated: false,
}

const getters = {
    user: state => {
        return state.user
    },
    userErrors: state => {
        return state.userErrors
    },
    profileUpdated: state => {
        return state.profileUpdated
    }
}

const mutations = {
    setUser(state, user) {
        state.user = user
    },
    setUserErrors(state, userErrors) {
        state.userErrors = userErrors
    },
    setProfileUpdated(state, profileUpdated) {
        state.profileUpdated = profileUpdated
    }
}

const actions = {
    getUser({commit, dispatch}) {
        axios.get('/api/user')
            .then(response => {
                commit('setUser', response.data.data)
                commit('setUserErrors', null)
                dispatch('setToken', response)
            })
            .catch(error => {
                if (error.response.status == 401 || error.response.status == 419) {
                    if (localStorage.getItem('x_xsrf_token')) {
                        localStorage.removeItem('x_xsrf_token')
                    }
                }
                console.log(error);
            })
    },
    logout({commit}) {
        commit('setUser', null)
        localStorage.removeItem('x_xsrf_token')

    },
    setToken({},response) {
        localStorage.setItem('x_xsrf_token', response.config.headers['X-XSRF-TOKEN'])
    },
    store({commit, dispatch}, data) {
        console.log(data);
         axios.patch(`api/user/${data.id}}`, data /* {
            'name': data.get('name'),
            'email': data.get('email'),
            'avatar_path': data.get('avatar_path'),
            'phone': data.get('phone'),
            'address': data.get('address'),
         } */)
            .then(response => {
                dispatch('updated')
                commit('setUser', response.data.data)
                commit('setUserErrors', null)
            })
            .catch(error => {
                commit('setUserErrors', error.response.data.errors)
                console.log(error);
            })
    },
    updated({commit}) {
        commit('setProfileUpdated', true)
        setTimeout(() => {
            commit('setProfileUpdated', null)
        }, 5000)
    }
}

export default {
    state,
    getters,
    mutations,
    actions
}
