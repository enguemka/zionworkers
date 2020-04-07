<template>
    <div class="card m-1">
        <img :src="image_url" class="card-img-top d-none d-sm-block" alt="...">
        <div class="card-body">
            <h5 class="card-title d-sm-none" v-text="title"></h5>
            <div class="row mb-1">
                <div class="col-6 pr-0"><p class="card-text"><i class="fas fa-book"></i> {{post_count}} posts</p></div>
                <div class="col-6 pl-0"><p class="card-text"><i class="fas fa-clock"></i> {{read_time}} hrs</p></div>
            </div>
            <a :href="link" class="btn btn-primary btn-block"><i class="fas fa-play"></i> Read</a>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Serie",
        props: ['item'],
        data() {
            return {
                'image_url': this.item.thumbnail,
                'slug': this.item.slug,
                'link': '/series/' + this.item.slug,
                'title': this.item.title,
                'post_count': this.item.post_count,
                'read_time': this.item.read_time
            }
        }
    }
</script>

<style scoped>
    .card-body {
        padding: 0.5rem !important;
    }

    .card-text {
        font-size: 0.9rem;
        color: #555555;
    }

    .btn {
        font-size: 1.1rem !important;
        border-radius: 2.25rem !important;
    }

    .card {
        display: inline-flex !important;
        width: 16rem;
    }

    .row {
        width: 100%;
        margin-left: 0;
        margin-right: 0;
    }
</style>
