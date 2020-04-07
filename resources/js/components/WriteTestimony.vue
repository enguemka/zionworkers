<template>
    <div>
        <form method="POST" action="/testimonies" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
            <div class="form-group">
                <input type="text" id="email" name="email" :class="validatedClass('email')" v-model="form.email" placeholder="E-mail">
                <div class="invalid-feedback" v-if="form.errors.has('email')" v-text="form.errors.get('email')"></div>
            </div>
            <div class="form-group">
                <input type="text" id="name" name="name" :class="validatedClass('name')" v-model="form.name" placeholder="Name">
                <div class="invalid-feedback" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></div>
            </div>
            <div class="form-group">
                <textarea :class="validatedClass('content')" name="content" id="content" cols="30" rows="5" v-model="form.content"
                          placeholder="Write your testimomy..."></textarea>
                <div class="invalid-feedback" v-if="form.errors.has('content')" v-text="form.errors.get('content')"></div>
            </div>
            <button class="btn btn-primary btn-lg" :disabled="form.errors.any()"><i class="fas fa-paper-plane"></i> Submit</button>
        </form>
    </div>
</template>

<script>
    import { EventBus } from '../event.js';
    import Form from '../classes/Form';

    export default {
        name: "WriteTestimony",
        data() {
            return {
                notification_key: 'write-testimony',
                notification_message: '',
                form: new Form({
                    email: (Object.entries(User).length === 0) ? '' : User.email,
                    name: (Object.entries(User).length === 0) ? '' : User.name,
                    content: ''
                })
            }
        },

        methods: {
            onSubmit() {
                this.form.post('/testimonies')
                    .then(response => {
                        EventBus.$emit('push.notification', {
                            isError: false,
                            message: response.message
                        });
                    });
            },
            validatedClass(field) {
                return this.form.errors.has(field) ? 'form-control is-invalid' : 'form-control';
            }
        }
    }
</script>

<style scoped>
    .btn {
        border-radius: 3rem;
    }
</style>
