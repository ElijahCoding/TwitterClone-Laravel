<template>
    <div>
        <div class="text-gray-600 font-medium text-xs flex items-center">
            <span>{{ tweet.user.name }} retweeted</span>
        </div>

        <component />
    </div>
</template>

<script>
    export default {
        props: {
            tweet: {
                required: true,
                type: Object
            }
        }
    }
</script>
