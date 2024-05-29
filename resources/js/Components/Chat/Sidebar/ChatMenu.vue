<script setup>

import ChatItem from "@/Components/Chat/Sidebar/ChatItem.vue";

defineProps({
    chats: {
        type: Array,
        default: [],
    }
})

</script>

<template>
    <div class="chat-menu">
        <ChatItem v-for="chat in chats" :chat="chat" :id="chat.id" />
    </div>
</template>

<style scoped>
.chat-menu {
    display: flex;
    background-color: #34495e;
    height: 100%;
    width: 250px;
    flex-direction: column;
}
</style>
