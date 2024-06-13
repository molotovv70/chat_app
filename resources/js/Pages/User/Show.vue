<script setup>
import MainLayout from "@/Layouts/Chat/MainLayout.vue";
import InputMessageForm from "@/Components/Chat/Messenging/InputMessageForm.vue";
import MessageChatBox from "@/Components/Chat/Messenging/MessageChatBox.vue";
import {usePage} from "@inertiajs/vue3";
import UserChatBox from "@/Components/Chat/Messenging/UserChatBox.vue";
import {computed, nextTick, onMounted, ref, watch} from "vue";
import { useUsersStore } from "@/Stores/User.js";

const userStore = useUsersStore();

const page = usePage();
const user = page.props.auth.user

const props = defineProps({
    user_to: {
        type: Object,
        default: {}
    },
    messages: {
        type: Array,
        default: []
    },
})

defineOptions({
    layout: MainLayout
})

// const user = ref();
const chatContainer = ref(null);


const scrollToBottom = () => {
    if (chatContainer.value) {
        chatContainer.value.scrollTop = chatContainer.value.scrollHeight;
    }
};
const sendMessage = async (message) => {
    const response = await axios.post(`/users/${props.user_to.id}/chat`, {
        user_id_from: user.id,
        content: message,
    });
    props.messages.push(response.data);
    userStore.updateLastMessage(response.data);
}


onMounted(() => {
    Echo.private(`users.${user.id}`)
        .listen('StoreUserMessageEvent', (res) => {
            console.log(res);
            props.messages.push(res.message);
            userStore.updateLastMessage(res.message);
        })
        .error((e) => {
            console.log(e)
        })
    scrollToBottom();
})

watch(props.messages, () => {
    setTimeout(scrollToBottom, 1)
})

const computeUser = (message) => {
    return message.user_id_from === user.id ? user : props.user_to
}
</script>

<template>
    <div class="chat__container dark:bg-gray-800" ref="chatContainer">
        <UserChatBox :user_to="user_to" />
        <div class="chat__messages-container">
            <div class="chat__messages">
                <MessageChatBox
                    v-for="message in messages"
                    :message="message"
                    :user="computeUser(message)"
                    :user_to="user_to"
                    :is-yours="message.user_id_from === user.id"
                    class="chat__message-item"
                />
            </div>
        </div>
    <InputMessageForm class="chat__input-message" @message-send="sendMessage" />
    </div>
</template>

<style scoped>
.chat__container {
    display: flex;
    position: relative;
    scroll-margin: -100px !important;
    scroll-padding: 200px;
    flex-direction: column;
    flex-grow: 1;
    width: 760px;
    overflow: auto;
    padding: 20px;
    height: 100vh;
    margin: auto;
    scroll-behavior: smooth;
}
.chat__messages-container {
    display: flex;
    flex-direction: column;
    flex-grow: 1;
}
.chat__messages {
    display: flex;
    flex-grow: 1;
    position: relative;
    flex-direction: column;
    align-content: flex-end;
    align-items: flex-end;
    flex-flow: wrap;
}
.chat__message-item {
    display: flex;
    align-self: flex-end;
    width: 100%;
}
.chat__input-message {
    position: sticky !important;
    bottom: 0 !important;
    border-radius: 25px;
    width: 100%;
    box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
    background-color: #111827;
}
</style>
