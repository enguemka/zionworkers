<template>
    <form method="POST" action="/my-account/passwords" @submit.prevent="onSubmit" @keydown="passwords.errors.clear($event.target.name)">
        <div class="form-group">
            <label for="current_password">Current Password</label>
            <input type="password" name="current_password" id="current_password" :class="validatedClass('current_password', 'passwords')"
                   v-model="passwords.current_password">
            <div class="invalid-feedback" v-if="passwords.errors.has('current_password')" v-text="passwords.errors.get('current_password')"></div>
        </div>
        <div class="form-group">
            <label for="password">New Password</label>
            <input type="password" name="password" id="password" :class="validatedClass('password', 'passwords')" v-model="passwords.password">
            <div class="invalid-feedback" v-if="passwords.errors.has('password')" v-text="passwords.errors.get('password')"></div>
        </div>
        <div class="form-group">
            <label for="password_confirmation">Password Confirmation</label>
            <input type="password" name="password_confirmation" id="password_confirmation" :class="validatedClass('password_confirmation', 'passwords')" v-model="passwords.password_confirmation">
            <div class="invalid-feedback" v-if="passwords.errors.has('password_confirmation')" v-text="passwords.errors.get('password_confirmation')"></div>
        </div>
        <button class="btn btn-sm btn-primary">Change password</button>
    </form>
</template>

<script>
    import { EventBus } from '../event.js';
    import Form from '../classes/Form';

    export default {
        name: "ChangePassword",
        data() {
            return {
                passwords: new Form({
                    current_password: '',
                    password: '',
                    password_confirmation: ''
                }),
            };
        },
        methods: {
            onSubmit() {
                this.passwords.post('/my-account/passwords')
                    .then(response => {
                        EventBus.$emit('push.notification', {
                            isError: false,
                            message: response.message
                        });
                    });
            },
            validatedClass(field) {
                return this.passwords.errors.has(field) ? 'form-control is-invalid' : 'form-control';
            }
        }
    }
</script>

<style scoped>

</style>
