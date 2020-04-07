<template>
    <div class="row justify-content-md-center py-4" style="background-color: #fff;">
        <div class="col-md-12 text-center">
            <h1 class="display-4">Currently Featured</h1>
            <p class="mb-4">What are our recommendations? Here are some of the series we are excited about.</p>
            <series v-for="item in series" v-bind:key="item.serie.slug" :item="item.serie"></series>
        </div>
    </div>
</template>

<script>
    export default {
        name: "FeaturedSeries",
        data() {
            return {
                series: []
            }
        },
        mounted() {
            axios.get('/series/featured').then(response => this.series = response.data);
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
