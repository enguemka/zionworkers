<template>
    <a class="dropdown-item" href="#" @click.prevent="openSubscription">Subscriptions</a>
</template>

<script>
    import { EventBus } from '../event.js';

    export default {
        name: "SubscriptionBtn",
        methods: {
            openSubscription() {
                EventBus.$emit('open.subscriptions');
            }
        }
    }
</script>

<style scoped>

</style>
