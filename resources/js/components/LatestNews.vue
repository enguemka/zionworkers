<template>
    <div class="row justify-content-md-center pb-5" style="background-color: #fff;">
        <div class="col-md-12 text-center">
            <h1 class="display-4 mb-3">Latest News</h1>
            <news v-for="news in latest_news" v-bind:key="news.id" :news="news"></news>
        </div>
    </div>
</template>

<script>
    export default {
        name: "LatestNews",
        data() {
            return {
                latest_news: []
            }
        },
        mounted() {
            axios.get('/news/latest').then(response => this.latest_news = response.data);
        }
    }
</script>

<style scoped>
    .row {
        width: 100%;
        margin-right: 0;
        margin-left: 0;
    }
</style>
