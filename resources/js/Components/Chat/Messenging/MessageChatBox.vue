<script setup>
import {usePage} from "@inertiajs/vue3";
import {onMounted, ref} from "vue";
import {useUsersStore} from "@/Stores/User.js";
import UpdateUserAvatarForm from "@/Components/Chat/User/Form/Partitials/UserAvatar/UpdateUserAvatarForm.vue";
import UpdateProfileInformationForm from "@/Components/Chat/User/Form/Partitials/UpdateProfileInformationForm.vue";
import UserProfileModalForm from "@/Components/Chat/Messenging/UserProfileModalForm.vue";

const UsersStore = useUsersStore();

const props = defineProps({
    isYours: {
        type: Boolean,
        default: true
    },
    message: {
        type: Object,
        default: {}
    },
    user: {
        type: Object,
        default: {}
    },
    user_to: {
        type: Object,
        default: {}
    },
})

const showModal = ref(false);

// const myUser = ref(UsersStore.getSingleValue(props.message.user_id_from));
onMounted(() => {
    // props.user1.value = UsersStore.getSingleValue(props.message.user_id_from)
    // myUser = UsersStore.getSingleValue(message.user_id_from)
    // myUser.value = props.message.user_id_from === props.user.id ? props.user : props.user_to;
})

// const page = usePage();
// const myUser = page.props.auth.user
</script>

<template>
    <div class="message-box__wrapper">
        <div class="message-box" :class="{ 'reverse': !isYours }">
            <div class="message-box__avatar" @click="showModal = !showModal">
                <img class="message-box__image" :src="`/storage/${user.avatar_path}`" alt="" srcset="">
            </div>

            <VaModal
                v-model="showModal"
                ok-text="Apply"
                blur
                max-width="650px"
                max-height="800px"
            >
<!--                sdfsdfs-->
                <UserProfileModalForm :user="user" />
            </VaModal>
            <div class="message-box__content" :class="{ 'yours': isYours }">
                <div class="message-box-text">
                    {{ message.content }}
                </div>
                <div class="message-box__bottom">
    <!--               v-if reacions -->
                    <div  class="message-box__reactions">
<!--                        <VaButton icon="loyalty" round color="primary" />-->
<!--                        <VaButton icon="sell" round color="primary" />-->
<!--                        <VaButton icon="toys" round color="primary" />-->
                    </div>
                    <div class="message-box__time-container">
                        <span class="message-box__time-content">
                            {{ message.created_at_formatted }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="message-box__reply-btn">
                <VaButton
                    icon="reply"
                    round :color="isYours ? 'primary' : 'secondary'"
                    :class="!isYours ? 'rotate' : ''"
                />
            </div>
        </div>
    </div>
</template>

<style scoped>
.message-box {
    display: flex;
    width: 100%;
    column-gap: 10px;
    padding: 10px;
    align-items: flex-end;
}
.reverse {
    flex-flow: row-reverse;
}
.yours {
    background-color: #3472F0 !important;
}
.message-box__avatar {
    height: 50px;
    width: 50px;
    background-color: #6b7280;
    border-radius: 100%;
}
.message-box__avatar:hover {
    cursor: pointer;
    opacity: 0.8;
}
.message-box__image {
    border-radius: 100%;
}
.message-box__content {
    padding: 10px;
    max-width: 80%;
    border-radius: 15px 15px 15px 0px;
    background-color: #6b7280;
}
.message-box__bottom {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
}

.message-box__time-content {
    font-size: 0.75em;
    opacity: 0.7;
}
.rotate {
    transform: rotate(180deg);
}
</style>
