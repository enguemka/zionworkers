<template>
    <div class="row justify-content-md-center pb-5" style="background-color: #fff;">
        <div class="col-md-8 text-center">
            <h1 class="display-4 mb-4">All News</h1>
            <ul class="list-group list-group-flush">
                <a v-for="news in all_news" :href="createLink(news.id)" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{news.title}}</h5>
                        <small v-text="date_show(news.published_at)"></small>
                    </div>
                    <p class="mb-1">{{news.description}}</p>
                </a>
            </ul>
        </div>
    </div>
</template>

<script>
    var moment = require('moment');

    export default {
        name: "AllNews",
        data() {
            return {
                all_news: []
            }
        },
        methods: {
            createLink(id) {
                return '/news/' + id;
            },
            date_show(date) {
                return moment(date).fromNow();
            }
        },
        mounted() {
            axios.get('/news/all').then(response => this.all_news = response.data);
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
