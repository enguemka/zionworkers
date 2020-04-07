<template>
    <div class="row my-2">
        <div class="col-6">
            <button :class="linkClass(previous_post)" @click="checkMembership(previous_post)"><i class="fas fa-angle-double-left"></i> Prev</button>
        </div>
        <div class="col-6">
            <button :class="linkClass(next_post)" @click="checkMembership(next_post)">Next <i class="fas fa-angle-double-right"></i></button>
        </div>
    </div>
</template>

<script>
    import {EventBus} from "../event";

    export default {
        name: "PhonePostNavigation",
        props: ['next', 'previous', 'series'],
        data() {
            return {
                next_post: this.next,
                previous_post: this.previous
            }
        },
        methods: {
            linkClass(post) {
                if(Object.entries(post).length === 0) {
                    return 'btn btn-sm btn-primary btn-block disabled';
                } else {
                    return 'btn btn-sm btn-primary btn-block';
                }
            },
            checkMembership(post) {
                if(Object.entries(post).length !== 0) {
                    if (post.auth_locked && Object.entries(User).length === 0) {
                        let message = 'The episode "' + post.title + '" is currently only available for members. Create a member account to proceed or log in.';
                        EventBus.$emit('auth.locked', message);
                    } else {
                        window.location.href = '/series/' + this.series.slug + '/episodes/' + post.id;
                    }
                }
            }
        }
    }
</script>

<style scoped>

</style>
