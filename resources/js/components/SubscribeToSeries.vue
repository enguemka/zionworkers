<template>
    <button class="btn btn-outline-light btn-lg d-none d-md-inline-block"
        :disabled="disabled" @click.prevent="subscribe">
        {{btn_text}}
    </button>
</template>

<script>
    import { EventBus } from '../event.js';

    export default {
        name: "SubscribeToSeries",
        props: ['series'],
        data() {
            return {
                disabled: false,
                btn_text: 'Subscribe to series'
            };
        },
        methods: {
            subscribe() {
                if(Object.entries(User).length === 0) {
                    let message = 'Subscription is only available with a member account. Create your account or sign in' +
                    ' to subscribe to "' + this.series.title + '"';
                    EventBus.$emit('auth.locked', message);
                } else {
                    this.disabled = true;
                    let url = '/series/' + this.series.slug + '/subscribe';
                    axios.post(url, {}).then(response => {
                        this.disabled = true;
                        this.btn_text = 'Subscribed!';
                        EventBus.$emit('refresh.subscriptions');
                    }).catch((error) => {
                        this.disabled = false;
                        EventBus.$emit('push.notification', {
                            isError: true,
                            message: error.response.data.message
                        });
                    });
                }
            }
        },
        mounted() {
            EventBus.$on('subscriptions.deleted', (subscription) => {
                if(subscription.serie.id === this.series.id) {
                    this.disabled = false;
                    this.btn_text = 'Subscribe to series';
                }
            });

            let url = '/series/' + this.series.slug + '/subscribe';
            axios.get(url)
                .then(response => {
                    this.disabled = true;
                    this.btn_text = 'Subscribed!';
                })
                .catch(function(error) {});
        }
    }
</script>

<style scoped>

</style>
