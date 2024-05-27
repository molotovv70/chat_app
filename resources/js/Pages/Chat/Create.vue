<script setup>
import { Head } from '@inertiajs/vue3';
import MainLayout from "@/Layouts/Chat/MainLayout.vue";

defineOptions({
    layout: MainLayout
})

defineProps({
    auth: {
        type: Object,
        required: false,
    }
})

</script>

<template>
    <h1>Hello</h1>
</template>
