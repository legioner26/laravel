<template>
    <v-container>
        <v-col
            class="d-flex"
            cols="12"
            sm="6"
        >
            <v-select
                v-model="sorting"
                :items="items"
                label="Сортировка"
                single-line
                outlined
            ></v-select>
        </v-col>
        <articles></articles>
        <div class="text-center">
            <v-pagination
                v-model="page"
                :length="LAST_PAGE"
                circle
            ></v-pagination>
        </div>
    </v-container>
</template>

<script>
import {mapActions, mapGetters} from "vuex";
import articles from './articles'

export default {
    name: "app",
    components: {
        articles,
    },
    data: () => ({
        page: 1,
        sorting: 'desc=price',
        items: [
            { text: 'По цене(убывание)', value: 'desc=price' },
            { text: 'По цене(возрастание)', value: 'asc=price' },
            { text: 'По дате создания(убывание)', value: 'desc=created_at' },
            { text: 'По дате создания(возрастание)', value: 'asc=created_at' },
        ],
    }),
    computed: mapGetters(['LAST_PAGE']),
    methods: {
        ...mapActions([
            'GET_ARTICLES',
            'qwe'
        ]),

        getArticles(){
            this.GET_ARTICLES({
                page: this.page,
                sorting: '&' + this.sorting
            })
        },
    },
    watch: {
        page(){
            this.getArticles()
        },

        sorting(){
            this.getArticles()
        }
    },
    created() {
        this.getArticles()
    }
}
</script>

<style scoped>

</style>
