<template>
    <div class="row justify-content-md-center py-4" style="background-color: #fff;">
        <div class="col-md-12 text-center">
            <h1 class="display-4">Recently Updated</h1>
            <p class="mb-4">What is new? Here are some of the series that have been updated recently.</p>
            <series v-for="item in series" v-bind:key="item.slug" :item="item"></series>
        </div>
    </div>
</template>

<script>
    export default {
        name: "UpdatedSeries",
        data() {
            return {
                series: []
            }
        },
        mounted() {
            axios.get('/series/updated').then(response => this.series = response.data);
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
