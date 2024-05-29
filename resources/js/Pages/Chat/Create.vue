<script setup>
import {Head, router, usePage} from '@inertiajs/vue3';
import MainLayout from "@/Layouts/Chat/MainLayout.vue";
import {reactive, ref} from "vue";
import UploadImageForm from "@/Components/Form/UploadImageForm.vue";


defineOptions({
    layout: MainLayout
})

const page = usePage();
const user = page.props.auth.user

const form = reactive({
    title: null,
    description: null,
    avatar_path: null,
})

const storeData = (e) => {
    router.post('/chats', form)
}

const loadImage = (image) => {
    form.avatar_path = image;
}

</script>

<template>
    <form ref="form1" @submit.prevent="storeData" class="create-form__container">
        <h1 class="text-2xl">Create Chat</h1>
        <VaInput
            v-model="form.title"
            class="mb-6"
            label="Enter Title *"
            placeholder="Title *"
        >
            <template #prependInner>
                <VaIcon
                    name="toc"
                    color="secondary"
                />
            </template>
        </VaInput>
        <VaTextarea v-model="form.description" label="Enter Description *" placeholder="Description *" />
        <UploadImageForm @image-uploaded="loadImage" />

        <VaButton type="button" @click.prevent="storeData">Create Chat</VaButton>
    </form>



</template>

<style scoped>
.create-form__container {
    margin: 60px auto 0;
    display: flex;
    width: 60%;
    flex-direction: column;
    row-gap: 20px;
}

</style>
