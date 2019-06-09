<template>
    <div class="text-muted">
        <div class="favorite">
            <span class="fa fa-heart text-danger pl-0 pr-1" v-if="isFavorited" @click="unFavoritePost"></span>
            <span class="fa fa-heart-o pl-0 pr-1" @click="favoritePost" v-if="!isFavorited"></span>
            <small class="font-weight-bold" v-show="tweetPost.likes.length"> {{ tweetPost.likes.length}}</small>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        post: {
            type: Object,
            required: true
        },
    },
    data() {
        return {
            tweetPost: this.post,
        }
    },
    computed: {
        isFavorited() {
            return Boolean (this.tweetPost.user_likes.length)
        },
    },
    watch: {
        post: {
            deep: true,
            handler() {
                console.log('The post has changed')
            }
        },
    },                                                  
    methods: {
        favoritePost() {
            axios.post(`posts/${this.post.id}/favorite`, this.post)
                .then()
                .catch(err => console.log(err))
        },
        unFavoritePost() {
            axios.post(`posts/${this.post.id}/unfavorite`, this.post)
                .then()
                .catch(err => console.log(err))
        }
    }
}
</script>
