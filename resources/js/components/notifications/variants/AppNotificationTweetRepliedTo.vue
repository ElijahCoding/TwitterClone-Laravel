<template>
    <div class="p-4 flex-grow">
        <app-tweet
            v-if="resolveTweet"
            :tweet="resolveTweet"
            class="!border-0"
        />
    </div>
</template>

<script>
    import { mapGetters, mapActions } from 'vuex'
    export default {
        props: {
            notification: {
                required: true,
                type: Object
            }
        },

        computed: {
            ...mapGetters({
                tweet: 'notifications/tweet'
            }),

            resolveTweet () {
                return this.tweet(this.notification.data.tweet.id)
            }
        }
    }
</script>
