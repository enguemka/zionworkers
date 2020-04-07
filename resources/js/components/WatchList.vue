<template>
    <div class="modal" tabindex="-1" role="dialog" id="watchlist">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Watchlist</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-info" role="alert">
                        Find quickly a series you are currently following. Keep track of what matters
                        to you.
                    </div>
                    <p class="text-muted text-center" v-if="watchlist.length === 0"> No series in your watchlist. </p>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center"
                            v-for="item in watchlist">
                            <span class="watch-series-title" @click="openSeries(item.serie.slug)">{{item.serie.title}}</span>
                            <button class="btn btn-sm btn-link" @click="removeItem(item)">Remove</button>
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
        name: "WatchList",
        data() {
            return {
                watchlist: []
            };
        },
        mounted() {
            EventBus.$on('open.watchlist', () => {
                $('#watchlist').modal('show');
            });
            EventBus.$on('refresh.watchlist', () => {
                axios.get('/watchlist').then(response => this.watchlist = response.data);
            });
            axios.get('/watchlist').then(response => this.watchlist = response.data);
        },
        methods: {
            openSeries(slug) {
                window.location.href = '/series/' + slug;
            },
            removeItem(item) {
                axios.delete('/watchlist/' + item.id).then(response => {
                    this.watchlist.splice(this.watchlist.indexOf(item), 1);
                    EventBus.$emit('watchlist.deleted', item);
                });
            }
        }
    }
</script>

<style scoped>
    .watch-series-title {
        cursor: pointer;
    }
</style>
