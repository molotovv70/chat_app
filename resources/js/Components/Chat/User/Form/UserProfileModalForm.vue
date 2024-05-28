<script setup>
import UpdateProfileInformationForm from "@/Components/Chat/User/Form/Partitials/UpdateProfileInformationForm.vue";
import UpdatePasswordForm from "@/Components/Chat/User/Form/Partitials/UpdatePasswordForm.vue";
import DeleteUserForm from "@/Components/Chat/User/Form/Partitials/DeleteUserForm.vue";
import UpdateUserAvatarForm from "@/Components/Chat/User/Form/Partitials/UserAvatar/UpdateUserAvatarForm.vue";
import {usePage} from "@inertiajs/vue3";
const submit1 = () => {
    console.log(231312);
}

const user = usePage().props.auth.user;
</script>

<template>
    <VaModal
        :onOk="submit1"
        ok-text="Apply"
        blur
        max-width="650px"
        max-height="800px"
    >
        <UpdateUserAvatarForm :size="256" class="mb-8" />
        <UpdateProfileInformationForm class="mb-8" />
        <UpdatePasswordForm class="mb-8" />
        <DeleteUserForm class="mb-8" />
    </VaModal>
</template>

<style>

.form {
    display: flex;
    flex-direction: column;
    padding: 0 20px;
    width: 100%;
}

</style>
