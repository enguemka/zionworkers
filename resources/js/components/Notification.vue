<template>
    <!-- Position it -->
    <div style="position: fixed; top: 79px; right: 5px;">

        <!-- Then put toasts within -->
        <div  v-for="(notification, index) in notifications">
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true"
                 v-if="!notification.isError" :key="index" :id="index" data-delay="2200">
                <div class="toast-header">
                    <img src="/img/zw-favicon.png" class="rounded mr-2" alt="...">
                    <strong class="mr-auto">ZionWorkers</strong>
                    <small class="text-muted">just now</small>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body text-left">
                    {{notification.message}}
                </div>
            </div>
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true"
                 v-if="notification.isError" :key="index" :id="index" data-autohide="false">
                <div class="toast-header toast-header-error">
                    <strong class="mr-auto"><i class="fas fa-exclamation-circle"></i> Error</strong>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body text-left">
                    {{notification.message}}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { EventBus } from '../event.js';

    export default {
        name: "Notification",
        data() {
            return {
                notifications: []
            };
        },
        methods: {
            removeNotification(event) {
                this.$delete(this.notifications, event.target.id);
            }
        },
        mounted() {
            EventBus.$on('push.notification', (notification) => {
                this.notifications.push(notification);
                this.$nextTick(() => {
                    $('.toast').toast('show');
                    $('.toast').on('hidden.bs.toast', this.removeNotification);
                });
            });
        }

    }
</script>

<style scoped>
    .toast-header-error {
        color: #fff;
        background-color: rgba(179, 58, 58, 0.65);
    }

    .toast-header-error .close:hover {
        color: #fff;
    }

    .toast-header-error .close {
        color: #fff;
    }
</style>
