<script setup>
import {useForm, usePage} from "@inertiajs/vue3";
import {ref} from "vue";

const user = usePage().props.auth.user;

const form = useForm({
    description: user.description,
});

const isLoading = ref(false)

const storeAvatar = async (e) => {
    try {
        isLoading.value = true;

        let file = e.target.files[0];
        const formData = new FormData();
        formData.append('avatar_path', file);
        formData.append('description', form.description);
        formData.append('_method', 'patch');

        const response = await axios.post('/profile', formData)
        const data = response.data

        user.description = data.description
        user.avatar_path = data.avatar_path

        isLoading.value = false;

    } catch (error) {
        console.error(error);
    }
}

const storeData = async () => {
    try {
        isLoading.value = true;

        const formData = new FormData();
        formData.append('description', form.description);
        formData.append('_method', 'patch');

        const response = await axios.post('/profile', formData)
        const data = response.data

        user.description = data.description

        isLoading.value = false;

    } catch (error) {
        console.error(error);
    }
}
</script>

<template>
    <div class="">
        <div class="flex items-center mb-4">
            <h3 class="text-xl mr-4">Update Avatar</h3>
        </div>
        <div>
            <div class="mb-4">
                <div v-if="user.avatar_path" class="user__image-wrapper">
                    <a class="" href="#" @click.prevent="this.$refs.avatar_load.click()">
                        <img
                            class="user__image"
                            :src="`/storage/${user.avatar_path}`"
                            :alt="user.name"
                        />
                    </a>
                </div>
                <div v-else class="user__image-wrapper">
                    <a class="" href="#" @click.prevent="this.$refs.avatar_load.click()">
                        <VaIcon class="user__image" name="account_circle" :size="100"  />
                    </a>
                </div>
                <div hidden class="">
                    <input @change="storeAvatar" ref="avatar_load" type="file">
                </div>
            </div>
        </div>
        <div class="description">
            <h3 class="mb-2">Description</h3>
            <VaTextarea class="w-full mb-4" v-model="form.description" />
            <VaButton @click="storeData" :loading="isLoading" >Save Description</VaButton>
        </div>
    </div>
</template>

<style scoped>
.user__image:hover {
    cursor: pointer;
    opacity: 0.5;
    transition: all 0.1s ease-in;
}

.user__image {
    border-radius: 100%;
}

.user__image-wrapper {
    object-fit: fill;
    width: 100px;
    height: 100px;
    display: block;
}

.user__image-wrapper:hover {
    background-image: url( './change_avatar_icon.svg' );
    background-repeat: no-repeat;
    background-position: center;
    background-size: 40px 40px;
}


</style>
