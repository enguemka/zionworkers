<template>
    <div class="modal" tabindex="-1" role="dialog" id="search">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form method="POST" action="/search" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
                        <div class="form-row">
                            <div class="form-group col-md-9 mb-1">
                                <input type="text" id="keyword" name="keyword" :class="validatedClass('keyword')" v-model="form.keyword" placeholder="Search series...">
                                <div class="invalid-feedback" v-if="form.errors.has('keyword')" v-text="form.errors.get('keyword')"></div>
                            </div>
                            <div class="form-group col-md-3 mb-1">
                                <button class="btn btn-primary btn-block" :disabled="form.errors.any()">Search</button>
                            </div>
                        </div>
                    </form>
                    <div class="list-group list-group-flush mt-4">
                        <a :href="seriesLink(item.slug)" class="list-group-item list-group-item-action" v-for="item in series">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{item.title}}</h5>
                            </div>
                            <p class="mb-1"><small>{{item.lead}}</small></p>
                        </a>
                    </div>
                    <img src="/img/search-by-algolia-light-background.png" alt="Image Not Found" height="15">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { EventBus } from '../event.js';
    import Form from '../classes/Form';

    export default {
        name: "Search",
        data() {
            return {
                form: new Form({
                    keyword: ''
                }),
                series: []
            }
        },
        mounted() {
            EventBus.$on('open.search', () => {
                $('#search').modal();
            });
        },
        methods: {
            onSubmit() {
                this.form.post('/search')
                    .then(response => {
                        this.series = response;
                    });
            },
            validatedClass(field) {
                return this.form.errors.has(field) ? 'form-control is-invalid' : 'form-control';
            },
            seriesLink(slug) {
                return '/series/' + slug;
            }
        }
    }
</script>

<style scoped>

</style>
