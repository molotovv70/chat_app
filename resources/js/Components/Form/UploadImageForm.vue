<script setup>
import {ref} from "vue";

const emit = defineEmits(['image-uploaded']);

const fileInput = ref();
const containerImgId = ref();
const triggerFileInput = () => {
    if (fileInput.value) {
        fileInput.value.click();
    }
};

const loadImage = (e) => {
    containerImgId.value.src = URL.createObjectURL(e.target.files[0]);
    const avatar_path = e.target.files[0];
    emit('image-uploaded', avatar_path)

    containerImgId.value.onload = function() {
        URL.revokeObjectURL(containerImgId.value.src)
    }
}
</script>

<template>
    <div class="create-form__upload-image-form">
        <input hidden ref="fileInput" type="file" accept="image/*" @change="loadImage">
        <img class="create-form__upload-image" ref="containerImgId"/>
        <VaButton class="create-form__btn-upload-image" @click="triggerFileInput" >Upload Image</VaButton>
    </div>
</template>

<style scoped>

.create-form__upload-image {
    width: 220px;
    background-color: #b4b4b4 !important;
    height: 220px;
    border-radius: 110%;
}

.create-form__upload-image-form {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    align-self: flex-start;
    row-gap: 20px;
}

.create-form__btn-upload-image {
    width: 240px;
    background-color: #2563eb;
}
</style>
