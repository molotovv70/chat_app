<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, usePage} from '@inertiajs/vue3';
import {computed, onBeforeMount, onMounted, ref, useAttrs, provide} from "vue";
import '@/Components/Chat/Sidebar/PopUpMenu.vue';
import MainLayout from "@/Layouts/Chat/MainLayout.vue";
import ChatItem from "@/Components/Chat/Sidebar/ChatItem.vue";
import ChatMenu from "@/Components/Chat/Sidebar/ChatMenu.vue";

defineProps({
    chats: {
        type: Array,
        default: [],
    }
})

defineOptions({
    layout: MainLayout
})

const showModal = ref(false);


const page = usePage();
const username = page.props.auth.user.name

</script>

<template>
    <ChatMenu :chats="chats" />
</template>
