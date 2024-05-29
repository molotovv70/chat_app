<script setup>

import {ref} from "vue";

const emit = defineEmits(['message-send']);

const message = ref();
const sendMessage = async () => {
    emit('message-send', message.value);
    message.value = '';
}

</script>

<template>
    <VaInput
        v-model="message"
        class="mt-3"
        placeholder="Your Message..."
    >
        <template #appendInner>
            <VaButton
                @click="sendMessage"
                icon="send"
                color="primary"
                round
            />
        </template>
    </VaInput>
</template>

<style scoped>
.va-button {
}
</style>
