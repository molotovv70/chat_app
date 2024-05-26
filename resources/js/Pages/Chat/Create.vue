<script setup>
import { Head } from '@inertiajs/vue3';

defineProps({
    auth: {
        type: Object,
        required: false,
    }
})

</script>

<template>
    <Head title="Chat" />
    <h1>Hello</h1>
</template>
