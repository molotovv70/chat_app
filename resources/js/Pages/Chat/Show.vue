<script setup>
import MainLayout from "@/Layouts/Chat/MainLayout.vue";
import InputMessageForm from "@/Components/Chat/Messenging/InputMessageForm.vue";
import MessageChatBox from "@/Components/Chat/Messenging/MessageChatBox.vue";

const props = defineProps({
    chat: {
        type: Object,
        default: {}
    }
})

defineOptions({
    layout: MainLayout
})

const sendMessage = async (message) => {
    const response = await axios.post("/messages", {
        content: message,
        chat_id: props.chat.id
    });
    console.log(response)
}

</script>

<template>
    <div class="chat__container dark:bg-gray-800">
        <div class="chat__messages">
            <MessageChatBox class="chat__message-item" />
        </div>
        <InputMessageForm @message-send="sendMessage" />
    </div>
</template>

<style scoped>
.chat__container {
    display: flex;
    flex-direction: column;
    width: 760px;
    padding: 20px;
    height: 100%;
    margin: auto;
}
.chat__messages {
    display: flex;
    flex-grow: 1;
    flex-direction: column;
    align-content: flex-start;
    align-items: flex-start;
    flex-flow: revert;
}
.chat__message-item {
    align-self: flex-end;
}
</style>
