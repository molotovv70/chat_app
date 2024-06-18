<script setup>
import MainLayout from "@/Layouts/Chat/MainLayout.vue";
import InputMessageForm from "@/Components/Chat/Messenging/InputMessageForm.vue";
import MessageChatBox from "@/Components/Chat/Messenging/MessageChatBox.vue";
import {onMounted, ref} from "vue";
import {useChatsStore} from "@/Stores/Chat.js";
import {usePage} from "@inertiajs/vue3";
import UserChatBox from "@/Components/Chat/Messenging/UserChatBox.vue";
import ChatChatBox from "@/Components/Chat/Messenging/ChatChatBox.vue";

const chatStore = useChatsStore();

const page = usePage();
const user = page.props.auth.user

const props = defineProps({
    user: {
        type: Object,
        default: {}
    },
    users: {
        type: Array,
        default: []
    },
    chat: {
        type: Object,
        default: {}
    },
    messages: {
        type: Object,
        default: {}
    },
})

defineOptions({
    layout: MainLayout
})

const chatContainer = ref(null);
const messagesPage = ref(1);
const isUserJoin = ref(false);

const scrollToBottom = () => {
    if (chatContainer.value) {
        chatContainer.value.scrollTop = chatContainer.value.scrollHeight;
    }
};

const sendMessage = async (message) => {
    const response = await axios.post(`/chats/${props.chat.id}/message`, {
        content: message,
    });
    chatStore.updateLastMessage(response.data);
    setTimeout(scrollToBottom, 1)
    console.log(response)
}


const joinChat = async () => {
    const response = await axios.post(`/chats/${props.chat.id}/join`, {});
    console.log(response.data)
    isUserJoin.value = !isUserJoin.value;
}


const computedUsers = ref({});

const computeUser = async (message) => {
    const currentUser = props.users.find(user => user.id === message.user_id) || {};
    return message.user_id == props.user.id ? props.user : currentUser;
};

const computeAllUsers = async () => {
    for (const message of props.messages) {
        computedUsers.value[message.id] = await computeUser(message);
    }
};

onMounted(async () => {
    user.role[0]?.created_at ? isUserJoin.value = !isUserJoin.value : ''
    computeAllUsers();
    Echo.channel(`chats.${props.chat.id}`)
        .listen('StoreUserChatMessageEvent', async (res) => {
            props.messages.push(res.message);
            await computeAllUsers();
            // userStore.updateLastMessage(res.message);
            setTimeout(scrollToBottom, 1)
        })
        .error((e) => {
            console.log(e)
        })
    // await messagesStore.setValue(props.user_to.id)
    // await props.messages.data.reverse();
    scrollToBottom();
})


</script>

<template>
    <div class="chat__container dark:bg-gray-800">
        <ChatChatBox :chat="chat" />

        <div class="chat__messages-container" ref="chatContainer">

<!--            <VaInfiniteScroll-->
<!--                :load="fetchMessages"-->
<!--                reverse-->
<!--            >-->
                <div class="chat__messages">
                    <MessageChatBox
                        v-for="message in props.messages"
                        :message="message"
                        :user="computedUsers[message.id]"
                        :user_to="user"
                        :is-yours="message.user_id === user.id"
                        class="chat__message-item"
                    />
                </div>
<!--            </VaInfiniteScroll>-->

        </div>

        <InputMessageForm v-if="isUserJoin" class="chat__input-message" @message-send="sendMessage" />
        <div v-else @click="joinChat" class="chat__join-btn">join chat</div>
    </div>
</template>

<style scoped>
.chat__container {
    display: flex;
    position: relative;
    scroll-margin: -100px !important;
    scroll-padding: 200px;
    scroll-behavior: smooth;
    flex-direction: column;
    flex-grow: 1;
    width: 760px;
    overflow: auto;
    padding: 20px;
    height: 100vh;
    margin: auto;
}
.chat__messages-container {
    display: flex;
    flex-direction: column;
    flex-grow: 1;
    scroll-margin: -100px !important;
    scroll-padding: 200px;
    scroll-behavior: smooth;
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
.chat__join-btn {
    position: sticky !important;
    bottom: 0 !important;
    border-radius: 25px;
    width: 100%;
    box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
    background-color: #0c54ff;
    text-align: center;
    height: 30px;
    cursor: pointer;
}
.chat__join-btn:hover {
    opacity: 0.8;
}
</style>
