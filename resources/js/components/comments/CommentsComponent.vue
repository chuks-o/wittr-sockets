<template>
    <div class="comment-body">
        <a type="#" data-toggle="modal" ref="comment_modal" :data-target="modalDataTarget">
            <span class="fa fa-comment-o pl-0 pr-1"></span>
            <small class="font-weight-bold">{{ post.comments.length ? post.comments.length : ''}}</small>
        </a>
        
        <modal-component :modal-data-id="modalDataId" :modal-data-target="modalDataTarget" :iterable="post">
            
            <template v-slot:modal-title>
                New Comment
            </template>

            <template v-slot:modal-body>
                <!-- create a media component for this -->
                <div class="media">
                    <div class="user-avatar mr-2" style="border-radius: 50%;">
                        <img class="align-self-start image-rounded" src="/avatar.jpg" alt="" 
                            width="40px" height="40px" style="border-radius: 50%;"
                        >
                    </div>

                    <media-component
                        :name="post.user.name"
                        :username="post.user.username"
                        :body="post.body"
                        :profileLink="post.user.profileLink">
                    </media-component>
                </div>
                <!-- end -->

                <div v-if="loading" class="d-flex justify-content-center py-4">
                    <span class="fa fa-circle-o-notch fa-spin fa-lg" style="color:blue;"></span>
                </div>

                <form class="py-2" @submit.prevent="sendComment">
                    <div class="form-group">
                        <label for="message-text" class="col-form-label"></label>
                        <textarea class="form-control" v-model="body.comment" id="message-text" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary float-right btn-sm">Send Comment</button>
                </form>
                <div class="comment-body">
                    <comment-component 
                        :comments="postComments"
                        :post="post">
                    </comment-component>
                </div>
            </template>
        </modal-component>
        
    </div>
</template>

<script>
import ModalComponent from '../ModalComponent.vue'
import CommentComponent from './CommentComponent.vue'
import MediaComponent from '../MediaComponent.vue'

export default {
    components: {
        ModalComponent,
        CommentComponent,
        MediaComponent
    },
    props: {
        post: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            body: {
                comment: '',
            },
            loading: false,
            postComments: [],
        }
    },
    computed: {
        modalDataTarget() {
            return `#modal${this.post.id}`;
        },
        modalDataId() {
            return `modal${this.post.id}`
        }
    },
    created() {
        this.postComments = this.post.comments.reverse()
    },
    methods: {
        sendComment() {
            let comment = {'message': this.body.comment, 'post_id': this.post.id }

            axios.post(`posts/${this.post.id}/comments`, comment)
                .then(this.loading = true)
                .then(response => {
                    this.loading = false
                    if (response.status == 201) {

                        this.body.comment = '';
                        console.log(response.data.comment)
                        
                        this.postComments.unshift(response.data.comment)
                    }
                })
                .catch(err => {
                    this.loading = false
                    console.log(err);
                })
        },
        getComments() {
            axios.get(`posts/${this.post.id}/comments`, this.post)
                .then(this.loading = true)
                .then(response => {
                    this.loading = false

                    if (response.status == 200) {
                        console.log(response.data.comments.reverse())
                        this.postComments = response.data.comments.reverse()
                    }
                })
                .catch(err => {
                    this.loading = false
                    console.log(err);
                })
        }
    }
    
}
</script>

<style scoped>

</style>
