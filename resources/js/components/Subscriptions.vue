<template>
    <div class="modal" tabindex="-1" role="dialog" id="subscriptions">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Subscriptions</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-info" role="alert">
                        Get notify by email each time a new episode is out!
                    </div>
                    <p class="text-muted text-center" v-if="subscriptions.length === 0"> No subscriptions available. </p>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center"
                            v-for="subscription in subscriptions">
                            <span class="sub-series-title" @click="openSeries(subscription.serie.slug)">{{subscription.serie.title}}</span>
                            <button class="btn btn-sm btn-link" @click="removeItem(subscription)">Unsubscribe</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { EventBus } from '../event.js';

    export default {
        name: "Subscriptions",
        data() {
            return {
                subscriptions: []
            };
        },
        mounted() {
            EventBus.$on('open.subscriptions', () => {
                $('#subscriptions').modal('show');
            });
            EventBus.$on('refresh.subscriptions', () => {
                axios.get('/subscriptions').then(response => this.subscriptions = response.data);
            });
            axios.get('/subscriptions').then(response => this.subscriptions = response.data);
        },
        methods: {
            openSeries(slug) {
                window.location.href = '/series/' + slug;
            },
            removeItem(subscription) {
                axios.delete('/subscriptions/' + subscription.id).then(response => {
                    this.subscriptions.splice(this.subscriptions.indexOf(subscription), 1);
                    EventBus.$emit('subscriptions.deleted', subscription);
                });
            }
        }
    }
</script>

<style scoped>
    .sub-series-title {
        cursor: pointer;
    }
</style>
