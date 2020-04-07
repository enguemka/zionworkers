<template>
    <a class="dropdown-item" href="#" @click.prevent="openWatchlist">Watchlist</a>
</template>

<script>
    import { EventBus } from '../event.js';

    export default {
        name: "WatchlistBtn",
        methods: {
            openWatchlist() {
                EventBus.$emit('open.watchlist');
            }
        }
    }
</script>

<style scoped>

</style>
