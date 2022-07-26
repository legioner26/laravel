<template>
    <v-row>
        <v-col
            cols="4"
            v-for="(item, i) in ARTICLES"
            :key="i"
        >
            <v-card
                class="mx-auto"
                max-width="344"
            >
                <v-img
                    :src="item.image"
                    height="200px"
                ></v-img>

                <v-card-title>
                    {{ item.name }}
                </v-card-title>
            </v-card>

        </v-col>
    </v-row>
</template>

<script>
import {mapGetters} from "vuex"

export default {
    name: "articles",
    computed: mapGetters(['ARTICLES']),
}
</script>

<style scoped>

</style>
