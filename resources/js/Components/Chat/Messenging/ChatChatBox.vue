<script setup>
import UserProfileModalForm from "@/Components/Chat/Messenging/UserProfileModalForm.vue";
import {ref} from "vue";
import ChatProfileModalForm from "@/Components/Chat/Messenging/ChatProfileModalForm.vue";

defineProps({
    chat: {
        Array,
        default: []
    },
})

const showModal = ref(false);
</script>

<template>
    <div class="user-chat-box" @click="showModal = !showModal">
        <div class="user-chat-box__avatar" >
            <img class="user-chat-box__image" :src="`/storage/${chat.avatar_path}`" alt="" srcset="">
        </div>
        <VaModal
            v-model="showModal"
            ok-text="Apply"
            blur
            max-width="650px"
            max-height="800px"
        >
            <ChatProfileModalForm :chat="chat" />
        </VaModal>
        <div class="user-chat-box__content">
            <div class="user-chat-box__name">
                {{ chat.title }}
            </div>
            <div class="user-chat-box__last_online">
                <span>was online 16hrs ago</span>
            </div>
        </div>
    </div>
</template>

<style scoped>
.user-chat-box {
    position: sticky;
    top: 0;
    z-index: 50;
    width: 100%;
    padding: 10px;
    border-radius: 15px;
    background-color: #111827;
    column-gap: 20px;
    align-self: flex-start;
    display: flex;
    align-content: flex-start;
    box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
}
.user-chat-box:hover {
    cursor: pointer;
    background-color: #292f3b;
}

.user-chat-box__avatar {
    height: 50px;
    width: 50px;
    border-radius: 100%;
    border: 2px solid rgba(186, 191, 194, 0.56);
}
.user-chat-box__image {
    border-radius: 100%;
}
.user-chat-box__content {
}
.user-chat-box__last_online {
    font-size: 0.8em;
    opacity: 0.7;
}
</style>
