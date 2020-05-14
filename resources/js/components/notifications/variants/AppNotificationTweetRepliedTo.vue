<template>
    <div class="p-4">
        <app-tweet
            :tweet="notification.data.tweet"
        />
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
