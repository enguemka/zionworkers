<template>
    <form method="POST" action="/my-account/preferences" @submit.prevent="onSubmit" @keydown="preferences.errors.clear($event.target.name)">
        <div class="form-check mb-2">
            <input class="form-check-input" type="checkbox" name="newspaper" id="newspaper" v-model="preferences.newspaper">
            <label class="form-check-label" for="newspaper">
                Receive Newspapers and information about new series, artwork and more.
            </label>
        </div>
        <button class="btn btn-sm btn-primary">{{btn_label}}</button>
    </form>
</template>

<script>
    import { EventBus } from '../event.js';
    import Form from '../classes/Form';

    export default {
        name: "Preferences",
        data() {
            return {
                preferences: new Form({
                    newspaper: !!User.allow_newspapers,
                }),
                btn_label: 'Change preferences'
            };
        },
        methods: {
            onSubmit() {
                this.btn_label = 'Changing...';
                this.preferences.post('/my-account/preferences')
                    .then(response => {
                        this.btn_label = 'Change preferences';
                        EventBus.$emit('push.notification', {
                            isError: false,
                            message: response.message
                        });
                    });
            },
            validatedClass(field) {
                return this.preferences.errors.has(field) ? 'form-control is-invalid' : 'form-control';
            }
        },
        mounted() {
            this.preferences.canReset = false;
        }
    }
</script>

<style scoped>

</style>
