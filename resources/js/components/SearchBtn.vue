<template>
    <a class="nav-link" href="#" @click.prevent="openSearch"><i class="fas fa-search"></i></a>
</template>

<script>
    import { EventBus } from '../event.js';

    export default {
        name: "SearchBtn",
        methods: {
            openSearch() {
                EventBus.$emit('open.search');
            }
        }
    }
</script>

<style scoped>

</style>
