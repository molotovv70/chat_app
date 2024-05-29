<script setup>
import { Link } from '@inertiajs/vue3';
defineProps({
    chat: {
        type: Object,
        default: {}
    }
})
</script>

<template>
    <Link :href="route('chat.show', {id: chat.id,})" class="chat-item">
        <div class="chat-item__img-container" v-if="chat.avatar_path">
            <img class="chat-item__img" :src="`/storage/${chat.avatar_path}`" alt="">
        </div>
        <div class="chat-item__img-container" v-else>
            <VaIcon class="chat-item__img" :size="80" color="#ffffff" name="account_circle" />
        </div>
        <div class="chat-item__content">
            <span class="chat-item__title">{{ chat.title }}</span>
            <p class="chat-item__last-message">{{ chat.last_message }}</p>
        </div>
    </Link>
</template>

<style scoped>
.chat-item {
    display: flex;
    align-items: center;
    height: 120px;
}
.chat-item:hover {
    background-color: #6b7280;
    cursor: pointer;
}
.chat-item__img {
    width: 80px;
    height: 80px;
    border-radius: 100%;
    margin: auto;
}
.chat-item__img-container {
    display: flex;
    align-content: center;
    width: 150px;
    height: 100%;
}
.chat-item__content {
    width: 60%;
    font-size: 1.25em;
}
.chat-item__title {
    font-weight: 700;
}
.chat-item__last-message {
    font-size: 0.75em;
    opacity: 0.7;
}
</style>
