<script setup>
import {Head, usePage} from '@inertiajs/vue3';
import {computed, onBeforeMount, onMounted, ref, useAttrs, provide} from "vue";
import '@/Components/Chat/Sidebar/PopUpMenu.vue';
import MainLayout from "@/Layouts/Chat/MainLayout.vue";
import {useChatsStore} from "@/Stores/Chat.js";

const chatsStore = useChatsStore();

defineOptions({
    layout: MainLayout
})

function testStore() {
    const res = chatsStore.setValue()
    console.log(res)
}

</script>

<template>
    <VaButton @click.prevent="testStore">Test</VaButton>
</template>
