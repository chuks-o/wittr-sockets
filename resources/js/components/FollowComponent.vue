<template>
    <div class="follow-block mr-2">
        <button
            class="btn btn-outline-primary"
            @click="handleFollowing"
        >
            {{ following ? 'Unfollow' : 'Follow' }}
        </button>
    </div>
</template>

<script>
export default {
    props: {
        isFollowing : {
            type: Boolean,
            required: true
        },
        user: {
            type: Object,
            required : true
        },
    },
    data() {
        return {
            following: this.isFollowing,
            origin: 'http://localhost:8000',
        }
    },
    computed: {
        route() {
            return this.following == true ? `${this.origin}/profile/${this.user.id}/unfollow` 
                : `${this.origin}/profile/${this.user.id}/follow`
        }
    },
    methods: {
        handleFollowing() {
            axios.get(this.route).then(response => {
                var res = response.data
                if(res.status == "success" && res.code == 1) {
                    this.following = true;
                } 
                if(res.code == 0) {
                    this.following = false;
                } 
            })
            .catch(err => console.log(err))
        }
    }
}
</script>
