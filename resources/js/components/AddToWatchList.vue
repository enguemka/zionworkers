<template>
    <button class="btn btn-outline-light btn-lg d-none d-md-inline-block"
            :disabled="disabled" @click.prevent="addToWatchList">
        {{btn_text}}
    </button>
</template>

<script>
    import { EventBus } from '../event.js';

    export default {
        name: "AddToWatchList",
        props: ['series'],
        data() {
            return {
                disabled: false,
                btn_text: 'Add to watchlist'
            };
        },
        methods: {
            addToWatchList() {
                if(Object.entries(User).length === 0) {
                    let message = 'Watchlist is only available with a member account. Create your account or sign in' +
                        ' to add "' + this.series.title + '" into your watchlist.';
                    EventBus.$emit('auth.locked', message);
                } else {
                    this.disabled = true;
                    let url = '/series/' + this.series.slug + '/watchlist';
                    axios.post(url, {}).then(response => {
                        this.disabled = true;
                        this.btn_text = 'Added to watchlist!';
                        EventBus.$emit('refresh.watchlist');
                    }).catch((error) => {
                        this.disabled = false;
                    });
                }
            }
        },
        mounted() {
            EventBus.$on('watchlist.deleted', (item) => {
                if(item.serie.id === this.series.id) {
                    this.disabled = false;
                    this.btn_text = 'Add to watchlist';
                }
            });

            let url = '/series/' + this.series.slug + '/watchlist';
            axios.get(url)
                .then(response => {
                    this.disabled = true;
                    this.btn_text = 'Added to watchlist!';
                })
                .catch(function(error) {});
        }
    }
</script>

<style scoped>

</style>
