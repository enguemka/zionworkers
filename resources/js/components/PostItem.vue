<template>
    <div class="row">
        <div class="col-md-8 offset-md-2 post-item" @click="openPost">
            <div class="row pt-4">
                <div class="col-2">
                            <span class="fa-stack fa-lg">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <span class="fa-stack-1x fa-inverse" style="font-weight:900">{{iteration}}</span>
                            </span>
                </div>
                <div class="col-10">
                    <h3>
                        {{post.title}}
                        <small class="text-muted" style="font-size: 50%;">
                            <i class="fas fa-clock"></i> Read time {{post.read_time}}
                        </small>
                        <small style="font-size: 50%;" v-if="post.auth_locked">
                            <span class="badge badge-pill badge-info">Member only</span>
                        </small>
                    </h3>
                    <p>{{post.description}}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { EventBus } from '../event.js';

    export default {
        name: "PostItem",
        props: ['iteration', 'post', 'series'],
        methods: {
            openPost() {
                if(this.post.auth_locked && Object.entries(User).length === 0) {
                    let message = 'The episode "' + this.post.title + '" is currently only available for members. Create a member account to proceed or log in.';
                    EventBus.$emit('auth.locked', message);
                } else {
                    window.location.href = this.series.slug + '/episodes/' + this.post.id;
                }
            }
        }
    }
</script>

<style scoped>
    .post-item:hover {
        background-color: #E5E5E5;
        cursor: pointer;
    }
</style>
