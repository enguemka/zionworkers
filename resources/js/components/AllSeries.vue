<template>
    <div class="row justify-content-md-center py-4" style="background-color: #fff;">
        <div class="col-md-12 text-center">
            <h1 class="display-4">Available Series</h1>
            <p class="mb-4">What do we have now? Here are the series we have currently published.</p>
            <series v-for="item in series" v-bind:key="item.slug" :item="item"></series>
        </div>
    </div>
</template>

<script>
    export default {
        name: "AllSeries",
        data() {
            return {
                series: []
            }
        },
        mounted() {
            axios.get('/series/all').then(response => this.series = response.data);
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
