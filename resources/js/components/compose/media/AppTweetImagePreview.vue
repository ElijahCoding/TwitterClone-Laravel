<template>
    <div class="flex flex-wrap mb-4">
        <div v-for="(image, index) in images" :key="index">
            <img src="" alt="">
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            images: {
                required: false,
                type: Array
            }
        },

        methods: {
            generateImagePreview (image) {
                
            }
        }
    }
</script>
