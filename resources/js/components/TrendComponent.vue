<template>
    <div class="card border-0 rounded-0 mb-3">
        <div class="card-body">
            <h5 class="font-weight-bold mb-3">Trends For You</h5>
            <p v-if="this.loading">Please Wait...</p>
            <div class="trend-pack" v-for="trend in trends" :key="trend.id">
                <div class="d-flex flex-column mb-1">
                    <span class="font-weight-bold trend-title">
                        <a :href="'hashtag/'+trend.title" class="p-0 m-0">#{{ trend.title }}</a><br>
                        <small class="text_muted m-0 p-0">Sanwoolu and Tinubu are tweeting</small>
                    </span>
                    <!-- <span class="who-is-tweeting"><small class="text_muted m-0 p-0">Sanwoolu and Tinubu are tweeting</small></span> -->
                </div>
            </div>
        </div>
    </div>

</template>

<script>
export default {

    data() {
        return {
            'trends': [],
            'loading': false,
            'tweet': 'Something for the timeline so that i can sleep in peace. #chelseafanboy #premiumbabes'
        }
    },
    mounted() {
        this.getTrends();
    },
    methods: {
        getTrends() {
            axios.get('get-trends')
            .then(this.loading = true)
            .then(response => {
                this.loading = false;
                this.trends = response.data.trends
            })
            .catch(err => console.log(err));
        }
    }
}
</script>

<style scoped>
.trend-title {
    padding: 0 !important;
    margin: 0 !important;
}
.text_muted {
    color:grey;
    padding: 0;
    margin: 0;
}
</style>

