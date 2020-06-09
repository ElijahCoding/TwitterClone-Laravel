<template>
    <div>
        <div>
            <app-tweet
                v-for="tweet in parents(id)"
                :tweet="tweet"
                :key="tweet.id"
            />
        </div>

        <div class="text-lg border-b-8 border-t-8 border-gray-800">
            <app-tweet
                v-if="tweet(id)"
                :tweet="tweet(id)"
            />
        </div>

        <div>
            <app-tweet
                v-for="tweet in replies(id)"
                :tweet="tweet"
                :key="tweet.id"
            />
        </div>
    </div>
</template>

<script>
    import { mapActions, mapGetters } from 'vuex'

    export default {
        props: {
            id: {
                required: true,
                type: String
            }
        },

        computed: {
            ...mapGetters({
                tweet: 'conversation/tweet',
                parents: 'conversation/parents',
                replies: 'conversation/replies',
            })
        },

        methods: {
            ...mapActions({
                getTweets: 'conversation/getTweets'
            })
        },

        mounted () {
            this.getTweets(`/api/tweets/${this.id}`)
            this.getTweets(`/api/tweets/${this.id}/replies`)
        }
    }
</script>
