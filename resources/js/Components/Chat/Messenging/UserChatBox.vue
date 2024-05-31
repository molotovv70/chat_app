<script setup>
import UserAvatar from "@/Components/Chat/User/UserAvatar.vue";

defineProps({
    user_to: {
        Array,
        default: []
    },
})
</script>

<template>
    <div class="user-chat-box">
        <div class="user-chat-box__avatar">
            <img class="user-chat-box__image" :src="`/storage/${user_to.avatar_path}`" alt="" srcset="">
        </div>
        <div class="user-chat-box__content">
            <div class="user-chat-box__name">
              {{ user_to.name }}
            </div>
            <div class="user-chat-box__last_online">
                <span>was online 16hrs ago</span>
            </div>
        </div>
    </div>
</template>

<style scoped>
.user-chat-box {
    width: 100%;
    padding: 10px;
    border-radius: 15px;
    background-color: #111827;
    column-gap: 20px;
    align-self: flex-start;
    display: flex;
    align-content: flex-start;
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
