<script setup>
import UserAvatar from "@/Components/Chat/User/UserAvatar.vue";
import { usePage } from "@inertiajs/vue3";

const page = usePage();
const user = page.props.auth.user

const props = defineProps({
    isShowAvatar: {
        type: Boolean,
        default: true
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
        <UserAvatar v-if="isShowAvatar" />
        <div class="profile-card__user-info-container">
            <b :class="['profile-card__user-name', userNameStyle]">{{ user.name }}</b>
            <p class="profile-card__user-id">@{{ user.username }}</p>
        </div>
    </div>

</template>

<style scoped>
.profile-card {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
    color: #e5e7eb;
}
.profile-card__user-info-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: 0;
}
.profile-card__user-name {
}
.profile-card__user-id {
    opacity: 0.7;
}
</style>
