<template>
    <div class="tweet-form w-100">
        <div class="card border-0 rounded-0">
            <div class="card-body px-3 py-2">
                <div class="">
                    <form @submit.prevent="postTweet">
                        <div class="form-group">
                            <div class="d-flex my-0 py-0">
                                <label for="post">What's happening today?</label>
                                <span :class="{'text-success' : count_words > 0, 'text-danger': count_words < 1}" 
                                    class="ml-auto small font-weight-bold">{{ count_words }}
                                </span>
                            </div>
                            <textarea 
                                :keyup="countWords"
                                class="form-control" 
                                rows="2" cols="10" 
                                maxlength="130"
                                v-model="body" 
                                required>
                            </textarea>
                        </div>
                        <div class="d-flex justify-content-end form-group p-0 m-0">
                            <button class="btn btn-primary btn-sm">
                                Tweet
                            </button>
                        </div>
                    </form>        
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            body: '',
            count_words: 130,
            trend_arr: '',
        }
    },
    computed: {
        countWords() {
            this.count_words = 130 - this.body.length;
        },
        countColor() {
            this.count_words > 0 ? 'text-success' : 'text-danger';
        }
    },
    methods: {
        postTweet() {
            this.body.split(" ").forEach(word => word.startsWith("#") && this.trend_arr.push({ 'title': word, 'locale': 'en' } ));
            
            axios.post('/save-tweet', {body: this.body})
                .then(response => {
                    if (response.status == 201) {
                        this.$toasted.global.custom({ message: response.data.message }).goAway(2000);
                    }
                    this.body = '';
                    // An event is fired here in the timeline component
                })
                .catch(error => {
                    this.$toasted.error('An error occured, Try again');
                    console.log(error);
                })

            axios.post('/save-trend', {body: this.trend_arr})
                .then()
                .catch(err => console.log(err))
            
        },
    }

}
</script>