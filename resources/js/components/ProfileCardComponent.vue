<template>
    <div class="profile-card">
        <div class="card-body p-0 m-0">
            <div class="profile-section">
                <div class="bg-color" style="height:100px; background: #1B95E0;"></div>
                <div class=" d-flex avatar-container p-2 m-1">
                    <div class="d-flex justify-content-center align-items-center" 
                        style="border: 2px solid white; border-radius: 50%; position:absolute; 
                        width: 80px; height:80px; top: 60px; bottom:0;">
                        <img class="image-rounded" :src="src" alt="" width="80px" height="80px" style="border-radius:50%;">
                    </div>
                </div>

                <div class="profile-info mt-4 px-3 py-1">
                    <h5 class="font-weight-bold"><a :href="user.profileLink" class="user-link">{{ user.name }}</a></h5>
                    <p class="p-0 m-0 text-muted"> <span>@</span>{{ user.username }}</p>
                </div>

                <div class="tweet-profile d-flex align-items-center justify-content-between px-3">
                    <div class="no-of-tweets text-center">
                        <small class="font-weight-bold">Tweets</small>
                        <h5 class="font-weight-bold">{{ tweetCount }}</h5>
                    </div>
                    <div class="no-of-following text-center">
                        <small class="font-weight-bold">Following</small>
                        <h5 class="font-weight-bold">630</h5>
                    </div>
                    <div class="no-of-followers text-center">
                        <small class="font-weight-bold">Followers</small>
                        <h5 class="font-weight-bold">1230</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</template>

<script>
export default {
    data() {
        return {
            tweetCount: this.totalTweets
        }
    },
    props: {
        totalTweets: String,
        user: Object,
        src: {
            type: String,
            required: true
        }
    },
    mounted() {
        Echo.channel(`App.User.${this.user.id}`)
            .listen('TweetPostedEvent', (event) => {
                this.tweetCount = event.total_tweets
            })
    }
}
</script>

<style scoped>
.user-link {
    color:black;
}
</style>
