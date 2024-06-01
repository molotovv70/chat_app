<script setup>
import MainLayout from "@/Layouts/Chat/MainLayout.vue";
import InputMessageForm from "@/Components/Chat/Messenging/InputMessageForm.vue";
import MessageChatBox from "@/Components/Chat/Messenging/MessageChatBox.vue";
import {usePage} from "@inertiajs/vue3";
import UserChatBox from "@/Components/Chat/Messenging/UserChatBox.vue";
import {computed, onMounted, ref} from "vue";

const page = usePage();
const user = page.props.auth.user

const props = defineProps({
    user_to: {
        type: Array,
        default: []
    },
    messages: {
        type: Array,
        default: []
    }
})

defineOptions({
    layout: MainLayout
})


// const user = ref();

const sendMessage = async (message) => {
    const response = await axios.post(`/users/${props.user_to.id}/chat`, {
        user_id_from: user.id,
        content: message,
    });
    console.log(response)
}

// const isYourMessage = (message) => {
//     return message.user_id_from === user.id;
// }

const computeUser = (message) => {
    return message.user_id_from === user.id ? user : props.user_to
}
</script>

<template>
    <div class="chat__container dark:bg-gray-800">
        <UserChatBox :user_to="user_to" />
        <div class="chat__messages-container">
            <div class="chat__messages" v-for="message in messages">
                <MessageChatBox
                    :message="message"
                    :user="computeUser(message)"
                    :user_to="user_to"
                    :is-yours="message.user_id_from === user.id"
                    :id="message.id"
                    class="chat__message-item"
                />
            </div>
        <InputMessageForm class="chat__input-message" @message-send="sendMessage" />
        </div>
    </div>
</template>

<style scoped>
.chat__container {
    display: flex;
    position: relative;
    flex-direction: column;
    flex-grow: 1;
    width: 760px;
    overflow: auto;
    padding: 20px;
    height: 100vh;
    //height: 100%;
    margin: auto;
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
    align-content: flex-start;
    align-items: flex-start;
    flex-flow: revert;
}
.chat__message-item {
    display: flex;
    align-self: flex-end;
    width: 100%;
}

.chat__input-message {
    position: sticky !important;
    bottom: 0px !important;
    border-radius: 25px;
    box-shadow: rgba(255, 255, 255, 0.12) 0px 54px 55px, rgba(255, 255, 255, 0.12) 0px -12px 30px, rgba(255, 255, 255, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.12) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px !important;
    width: 100%;
    //padding: 10px;
    background-color: #111827;
}
</style>