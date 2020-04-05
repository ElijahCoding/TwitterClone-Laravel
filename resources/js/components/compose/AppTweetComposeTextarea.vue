<template>
    <textarea
        class="bg-gray-900 w-full outline-none text-gray-300 text-lg resize-none mb-2"
        placeholder="What's happening ?"
        autofocus
        @input="$emit('input', $event.target.value)"
        :value="value"
    />
</template>

<script>
    export default {
        props: {
            value: {
                required: false
            }
        }
    }
</script>
