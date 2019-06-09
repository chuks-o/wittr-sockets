<template>
    <div class="media-body pt-2 py-0">
        <div class="d-flex">
            <a :href="profileLink" class="mr-2 h6 font-weight-bold text-dark">{{ name }}
                <span style="color:grey;" class="font-weight-normal"> @{{ username }}</span>
            </a>
        </div>
        <p class="mr-2 pb-2 my-0" ref="tweetbody">{{ body }}</p>
    </div>
</template>

<script>

export default {
    props: {
        profileLink: {
            type: String,
            required: true
        },
        name: {
            type: String,
            required: true
        },
        username: {
            type: String,
            required: true
        },
        body: String,
    },
    
}
</script>

