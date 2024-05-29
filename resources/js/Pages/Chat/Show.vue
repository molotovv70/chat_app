<script setup>
import MainLayout from "@/Layouts/Chat/MainLayout.vue";
import InputMessageForm from "@/Components/Chat/Messenging/InputMessageForm.vue";

defineOptions({
    layout: MainLayout
})
</script>

<template>
    <div class="chat__container dark:bg-gray-800">
        <div class="neo3">dsfsd</div>
        <InputMessageForm />
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
.neo3 {
    height: 100%;
}
</style>
