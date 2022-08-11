import axios from "axios";

const state = {
    products: null,
    gender: '',
    pagination: ''
};

const getters = {
    products: (state) => {
        return state.products;
    },
    gender: (state) => {
        return state.gender;
    },
    pagination: (state) => {
        return state.pagination;
    }
};

const mutations = {
    setProducts(state, products) {
        state.products = products;
    },
    setGenderMutation(state, gender) {
        state.gender = gender
    },
    setPagination(state, pagination) {
        state.pagination = pagination
    }
};

const actions = {
    getProducts({ commit }, data) {
        axios
            .post("/api/product", data)
            .then((response) => {
                commit("setProducts", response.data.data);
                commit("setPagination", response.data.meta);
            })
            .catch((error) => console.error(error));
    },
    setGender({commit}, gender) {
        commit('setGenderMutation', gender)
    },
};

export default {
    state,
    getters,
    mutations,
    actions,
};
