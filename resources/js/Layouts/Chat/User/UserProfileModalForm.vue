<script setup>
import UpdateProfileInformationForm from "@/Layouts/Chat/User/Partitials/UpdateProfileInformationForm.vue";
import UpdatePasswordForm from "@/Layouts/Chat/User/Partitials/UpdatePasswordForm.vue";
import DeleteUserForm from "@/Layouts/Chat/User/Partitials/DeleteUserForm.vue";

const submit1 = () => {
    console.log(231312);
}
</script>

<template>
    <VaModal
        :onOk="submit1"
        ok-text="Apply"
        blur
        max-width="650px"
        max-height="800px"
    >
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
