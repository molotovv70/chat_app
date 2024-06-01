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


// code
let input = ref("");
const fruits = ["apple", "banana", "orange"];
function filteredList() {
    return fruits.filter((fruit) =>
        fruit.toLowerCase().includes(input.value.toLowerCase())
    );
}

</script>

<template>
    <input type="text" v-model="input" placeholder="Search fruits..." />
    <div class="item fruit" v-for="fruit in filteredList()" :key="fruit">
        <p>{{ fruit }}</p>
    </div>
    <div class="item error" v-if="input&&!filteredList().length">
        <p>No results found!</p>
    </div>
</template>
