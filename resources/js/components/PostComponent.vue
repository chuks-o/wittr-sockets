<template>
    <div class="card border-0 mb-2 rounded-0">
        <div class="card-body p-2">
            <div class="media">
                <div class="user-avatar mr-2" style="border-radius: 50%;">
                    <img class="align-self-start image-rounded" src="../../../public/avatar.jpg" alt="" 
                        width="40px" height="40px"
                        style="border-radius: 50%;"
                    >
                </div>
                <div class="media-body pt-2 py-0 px-2">
                    <div class="d-flex">
                        <a :href="post.user.profileLink" class="mr-2 h6 font-weight-bold text-dark">{{ post.user.name }}
                            <span style="color:grey;" class="font-weight-normal"> @{{ post.user.username }}</span>
                        </a>
                        <div class="dropdown ml-auto dropleft">
                            <a class="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor:pointer;">
                                <span class="fa fa-angle-down" style="font-size: 18px;"></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <p class="mr-2 p-0 my-0" ref="tweetbody">{{ post.body }}</p>

                    <div class="footer py-1 d-flex align-items-center ">
                        <div class="d-flex justify-content-between align-items-center w-50 ">
                            <comments-component 
                                :post="post"
                                :key="post.id">
                            </comments-component>
                            <retweet-component></retweet-component>
                            <like-component 
                                :post="post">
                            </like-component>
                        </div>
                        <div class="ml-auto">
                            <small class="text-muted">{{ post.createdTime }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import LikeComponent from './LikeComponent';
import RetweetComponent from './RetweetComponent';
import CommentsComponent from './comments/CommentsComponent';

export default {
    props: {
        post: {
            type: Object,
        }
    },
    components: {
        LikeComponent,
        RetweetComponent,
        CommentsComponent,
    },

}
</script>

<style scoped>

</style>
