<script setup>
import UpdateProfileInformationForm from "@/Layouts/Chat/User/Partitials/UpdateProfileInformationForm.vue";
import UpdatePasswordForm from "@/Layouts/Chat/User/Partitials/UpdatePasswordForm.vue";
import DeleteUserForm from "@/Layouts/Chat/User/Partitials/DeleteUserForm.vue";

// import { reactive } from 'vue';
// import { useForm } from 'vuestic-ui';
// const { isValid, validate, reset, resetValidation } = useForm('formRef')
// import {useUserStore} from "@/Stores/UserStore.js";
//
// import UserAvatar from "@/Components/Chat/User/UserAvatar.vue";
// import UserProfileCard from "@/Components/Chat/User/UserProfileCard.vue";
//
// const userStore = useUserStore();
// const user = userStore.user
//
// const form = reactive({
//     username: '',
//     nickname: '',
//     email: '',
//     password: '',
//     password_remember: '',
// })
//
// const submit = () => alert('Form submitted!')
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
<!--        <h2 class="text-xl mb-4">-->
<!--            Edit User {{ user.name }}-->
<!--        </h2>-->


<!--        <VaForm ref="formRef" class="form">-->
<!--            <div class="user-card">-->
<!--                <UserAvatar :size="128" />-->
<!--                <UserProfileCard :isShowAvatar="false" :iconSize="128" userNameStyle="user-card__name" />-->
<!--            </div>-->
<!--            <VaInput-->
<!--                v-model="form.username"-->
<!--                :placeholder="user.name"-->
<!--                label="User Name"-->
<!--            />-->
<!--            <VaInput-->
<!--                v-model="form.nickname"-->
<!--                :placeholder="`@${user.username}`"-->
<!--                label="Nick Name"-->
<!--            />-->
<!--            <VaInput-->
<!--                v-model="form.email"-->
<!--                :placeholder="user.email"-->
<!--                label="Email"-->
<!--            />-->
<!--            <VaInput-->
<!--                type="password"-->
<!--                v-model="form.password"-->
<!--                label="Current Password"-->
<!--            />-->
<!--            <VaInput-->
<!--                type="password"-->
<!--                v-model="form.password"-->
<!--                label="New Password"-->
<!--            />-->
<!--            <VaInput-->
<!--                type="password"-->
<!--                v-model="form.password"-->
<!--                label="Confirm Password"-->
<!--            />-->
<!--        </VaForm>-->
    </VaModal>
</template>

<style>

.form {
    display: flex;
    flex-direction: column;
    padding: 0 20px;
    width: 100%;
}

.user-card {
    display: flex;
    flex-direction: row;
}

.user-card__name {
    font-size: 36px;
}

.va-input {
    margin: 10px 0;
}

</style>
