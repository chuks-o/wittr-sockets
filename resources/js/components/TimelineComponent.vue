<template>
    <div class="tweet-block w-100">
        <div v-if="loading" class="d-flex justify-content-center py-4">
            <span class="fa fa-circle-o-notch fa-spin fa-lg" style="color: rgb(27, 149, 224)"></span>
        </div>
        <div v-if="posts.length">
            <post-component
                v-for="post in posts"
                :post="post"
                :key="post.id">
            </post-component>
        </div>
        <div class="d-flex justify-content-center align-items-center" v-if="!posts.length && !loading">
            <p>No Tweets Found.</p>
        </div>
    </div>

</template>

<script>
import PostComponent from './PostComponent';

export default {
    components: {
        PostComponent
    },
    props: {
        location: String,
        user: {
            type: Object,
            required: true
        },
        authUser: {
            type: Object,
            required: true
        },
        trend: String,
    },
    data() {
        return {
            posts: [],
            post: {},
            loading: false,
            total_tweets: ''
        }
    },
    methods: {
        getTimelineTweets() {
            axios.get('/posts').then(this.loading = true)
            .then(response => {
                // console.log(response)
                this.loading = false;
                this.posts = response.data.posts;
                return this.total_tweets = response.data.total_tweets;
            })
            .then(tweet_count => this.$root.$emit('totalTweets', (tweet_count)))
            .then(res => { 
                // var doc = this.$refs.tweetbody
                // for(var i = 0; i < doc.length; i++) {
                //     doc[i].innerHTML = doc[i].innerHTML.replace(/#(\S+)/gi, 
                //     '<a href="hashtag/$1" title="$1" style="text-decoration:none;">#$1</a>')
                // }
            })
            .catch(err => console.log(err));
        },

        getTrendingTweets() {

            axios.get('/get-trending-tweets/'+this.trend).then(this.loading = true)
                .then(response => {
                    console.log(response)
                    this.loading = false;
                    this.posts = response.data.posts;
                    return this.total_tweets = response.data.total_tweets;
                })
                .then(tweet_count => this.$root.$emit('totalTweets', (tweet_count)))
                .then(res => { 
                    // var hashtag = this.trend
                    // var doc = this.$refs.tweetbody
                    // for(var i = 0; i < doc.length; i++) {
                    //     doc[i].innerHTML = doc[i].innerHTML.replace(/#(\S+)/gi, 
                    //     '<a href="$1" class="" title="$1" style="text-decoration:none;">#$1</a>')
                    // }
                })
                .catch(err => console.log(err));
        },

        getPersonalTweets() {
            axios.get(`/personal/posts/${this.user.username}`)
                .then(this.loading = true)
                .then(response => {
                    this.loading = false;
                    this.posts = response.data.posts
                })
                .catch(err => console.log(err));
        },
    },
    mounted() {
        Echo.channel("post-liked")
            .listen("PostLikedEvent", event => {
                let postIndex = this.posts.findIndex(element => event.post.id == element.id);
                this.posts.splice(postIndex, 1, event.post)
                console.log(this.posts)
            })
            
        Echo.channel("post-unliked")
            .listen("PostUnlikedEvent", event => {
                console.log('event', event.post)
            });

        Echo.channel(`App.User.${this.authUser.id}`)
            .listen('TweetPostedEvent', (event) => {
                this.posts.unshift(event.post)
            })

        if (this.location == 'profile') {
            this.getPersonalTweets()
        }
        if(this.location == 'trends') {
            this.getTrendingTweets()
        }
        if(this.location == 'index') {
            this.getTimelineTweets();
        }

    }
}
</script>