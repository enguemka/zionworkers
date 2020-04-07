<template>
    <form method="POST" action="/my-account/details" @submit.prevent="onSubmit" @keydown="basics.errors.clear($event.target.name)">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">User Name</label>
                    <input type="text" name="name" id="name" :class="validatedClass('name', 'basics')" v-model="basics.name">
                    <div class="invalid-feedback" v-if="basics.errors.has('name')" v-text="basics.errors.get('name')"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" :class="validatedClass('email', 'basics')" v-model="basics.email">
                    <div class="invalid-feedback" v-if="basics.errors.has('email')" v-text="basics.errors.get('email')"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-sm btn-primary">{{btn_label}}</button>
            </div>
        </div>
    </form>
</template>

<script>
    import { EventBus } from '../event.js';
    import Form from '../classes/Form';

    export default {
        name: "AccountDetails",
        data() {
            return {
                basics: new Form({
                    name: User.name,
                    email: User.email
                }),
                btn_label: 'Update Information'
            };
        },
        methods: {
            onSubmit() {
                this.btn_label = 'Updating...';
                this.basics.post('/my-account/details')
                    .then(response => {
                        this.btn_label = 'Update Information';
                        EventBus.$emit('push.notification', {
                            isError: false,
                            message: response.message
                        });
                    });
            },
            validatedClass(field) {
                return this.basics.errors.has(field) ? 'form-control is-invalid' : 'form-control';
            }
        },
        mounted() {
            this.basics.canReset = false;
        }
    }
</script>

<style scoped>

</style>
