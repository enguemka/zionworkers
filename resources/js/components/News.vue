<template>
    <div class="card m-1 text-left">
        <div class="card-body">
            <h6 class="card-subtitle mb-2 text-muted" v-text="date_show(published_at)"></h6>
            <h5 class="card-title">{{title}}</h5>
            <p class="card-text">{{excerpt}}</p>
            <a :href="news_link" class="card-link">Read more <i class="fas fa-chevron-circle-right"></i></a>
        </div>
    </div>
</template>

<script>

    var moment = require('moment');

    export default {
        name: "News",
        props: ['news'],
        data() {
            return {
                'news_link': '/news/' + this.news.id,
                'title': this.news.title,
                'published_at': this.news.published_at,
                'excerpt': this.news.description
            }
        },
        methods: {
            date_show(date) {
                return moment(date).fromNow();
            }
        }
    }
</script>

<style scoped>
    .card-text {
        font-size: 1rem;
        color: #555555;
    }

    .btn {
        font-size: 1.1rem !important;
        border-radius: 2.25rem !important;
    }

    .card {
        display: inline-flex !important;
        width: 18rem;
    }
</style>
