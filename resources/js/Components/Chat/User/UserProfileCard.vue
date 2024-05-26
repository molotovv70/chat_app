<script setup>
import { ref } from "vue";
import UserAvatar from "@/Components/Chat/User/UserAvatar.vue";
import { useUserStore } from "@/Stores/UserStore.js";

const userStore = useUserStore();
const user = userStore.user

const props = defineProps({
    isShowAvatar: {
        type: Boolean,
        default: true
    },
    iconSize: {
        type: Number,
        default: 64
    },
    userNameStyle: {
        type: String,
        default: ''
    },
    userIdStyle: {
        type: String,
        default: ''
    },
})
</script>

<template>
    <div
        class="profile-card"
    >
        <UserAvatar v-if="isShowAvatar" :size="iconSize" />
        <div class="profile-card__user-info-container">
            <b :class="['profile-card__user-name', userNameStyle]">{{ user.name }}</b>
            <p class="profile-card__user-id">@{{ user.username }}</p>
        </div>
    </div>

</template>

<style scoped>
.profile-card {
    display: flex;
    color: #e5e7eb;
    align-items: center;
}

.profile-card__user-info-container {
    margin-left: 1em;
}
.profile-card__user-name {

}

.profile-card__user-id {
    opacity: 0.7;
}
</style>
