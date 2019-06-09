<template>
<div>
    <div class="comment-bod" v-if="comments.length">
        <p class="pt-3 pb-0 font-weight-bold">Comments</p>
        <div class="media border-top py-1" v-for="comment in comments" :key="comment.id">
            <div class="user-avatar mr-2" style="border-radius: 50%;">
                <img class="align-self-start image-rounded" src="/avatar.jpg" alt="" 
                    width="40px" height="40px" style="border-radius: 50%;"
                >
            </div>
            <media-component
                :name="comment.creator.name"
                :username="comment.creator.username"
                :body="comment.message"
                :profileLink="comment.creator.profileLink">
            </media-component>
        </div>
            
    </div>
    <div class="no_comment" v-else>
        <p>No comments</p>
    </div>
</div>
</template>

<script>
import MediaComponent from '../MediaComponent.vue'
export default {
    components: {
        MediaComponent,
    },
    props: {
        comments:{
            type: Array,
        },
        post: {
            type: Object,
            required: true
        }
    },
}
</script>

<style scoped>

</style>
