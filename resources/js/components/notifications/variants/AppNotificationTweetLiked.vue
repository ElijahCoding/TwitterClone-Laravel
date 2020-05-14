<template>
    <div class="flex p-4">
        <div class="text-gray-300 mb-4">
            somebody liked your tweet
        </div>

        <p class="text-gray-600">
            {{ notification.data.tweet.body }}
        </p>
    </div>
</template>

<script>
    export default {
        props: {
            notification: {
                required: true,
                type: Object
            }
        }
    }
</script>
