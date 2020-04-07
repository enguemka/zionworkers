<template>
    <div class="modal" tabindex="-1" role="dialog" id="auth-locked">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-exclamation-circle"></i> Membership required!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <p>{{message}}</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <a href="/login" class="btn btn-primary">Sign in</a>
                    <a  href="/register" class="btn btn-primary">Get Started!</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { EventBus } from '../event.js';

    export default {
        name: "AuthLocked",
        data() {
            return {
                message: '',
            };
        },
        created() {
            EventBus.$on('auth.locked', (message) => {
                this.message = message;
                $('#auth-locked').modal('show');
            });
        },
    }
</script>

<style scoped>

</style>
