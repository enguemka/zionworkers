<template>
    <div class="row">
        <div class="col-md-12 py-2 series-nav-item" @click="openPost">
            <div class="row">
                <div class="col-2 text-center">
                    <span class="fa-stack fa-sm" v-if="!isCurrent">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <span class="fa-stack-1x fa-inverse" style="font-weight:900">{{iteration}}</span>
                    </span>
                    <span class="fa-stack fa-sm" v-if="isCurrent">
                        <i class="fas fa-circle fa-stack-2x" style="color: #ad2e95;"></i>
                        <span class="fa-stack-1x fa-inverse" style="font-weight:900">{{iteration}}</span>
                    </span>
                </div>
                <div class="col-10">
                    <h6 class="mb-0">{{post.title}}</h6>
                    <small class="text-muted">
                        <i class="fas fa-clock"></i> Read time {{post.read_time}}
                    </small>
                    <small v-if="post.auth_locked">
                        <span class="badge badge-pill badge-info">Member only</span>
                    </small>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { EventBus } from '../event.js';

    export default {
        name: "SeriesNavItem",
        props: ['iteration', 'post', 'series', 'current'],
        methods: {
            openPost() {
                if(this.post.auth_locked && Object.entries(User).length === 0) {
                    let message = 'The episode "' + this.post.title + '" is currently only available for members. Create a member account to proceed or log in.';
                    EventBus.$emit('auth.locked', message);
                } else {
                    window.location.href = '/series/' + this.series.slug + '/episodes/' + this.post.id;
                }
            }
        },
        computed: {
            isCurrent: function() {
                return this.current.id === this.post.id;
            }
        }
    }
</script>

<style scoped>
    .series-nav-item:hover {
        background-color: #E5E5E5;
        cursor: pointer;
    }
</style>
