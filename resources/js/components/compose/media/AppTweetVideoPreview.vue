<template>
    <div class="mb-4 relative">
        <video
            controls
            preload
            :src="generateVideoPreview(video)"
            class="rounded-lg"
        />

        <a
            class="bg-gray-900 w-8 h-8 rounded-full absolute top-0 right-0 mr-3 mt-3 flex items-center justify-center"
            href="#"
            @click.prevent="$emit('removed', video)"
        >
            <svg class="fill-current text-gray-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path class="heroicon-ui" d="M16.24 14.83a1 1 0 0 1-1.41 1.41L12 13.41l-2.83 2.83a1 1 0 0 1-1.41-1.41L10.59 12 7.76 9.17a1 1 0 0 1 1.41-1.41L12 10.59l2.83-2.83a1 1 0 0 1 1.41 1.41L13.41 12l2.83 2.83z"/></svg>
        </a>
    </div>
</template>

<script>
    export default {
        props: {
            video: {
                required: true,
                type: File
            }
        },

        methods: {
            generateVideoPreview (video) {
                return URL.createObjectURL(video)
            }
        }
    }
</script>
