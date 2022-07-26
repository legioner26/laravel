export default {
    state: {
        articles: [],
        last_page: 1,
    },
    actions: {
        GET_ARTICLES({commit}, data) {
            axios.get(`/api/articles?page=${data.page}${data.sorting}`)
                .then(response => {

                    commit('SET_LAST_PAGE', response.data.meta.last_page);
                    commit('SET_ARTICLES', response.data.data);

                }).catch((error) => {
                console.log(error)
            });
        },
    },
    mutations: {
        SET_ARTICLES(state, articles) {
            state.articles = articles
        },
        SET_LAST_PAGE(state, last_page) {
            state.last_page = last_page
        },
    },
    getters: {
        ARTICLES(state) {
            return state.articles
        },
        LAST_PAGE(state) {
            return state.last_page
        },
    }
}
