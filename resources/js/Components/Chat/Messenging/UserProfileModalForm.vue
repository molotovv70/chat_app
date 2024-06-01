<script setup>
import UpdateProfileInformationForm from "@/Components/Chat/User/Form/Partitials/UpdateProfileInformationForm.vue";
import UpdatePasswordForm from "@/Components/Chat/User/Form/Partitials/UpdatePasswordForm.vue";
import DeleteUserForm from "@/Components/Chat/User/Form/Partitials/DeleteUserForm.vue";
import UpdateUserAvatarForm from "@/Components/Chat/User/Form/Partitials/UserAvatar/UpdateUserAvatarForm.vue";
import {usePage} from "@inertiajs/vue3";
const submit1 = () => {
    console.log(231312);
}

defineProps({
    showModal: {
        type: Boolean,
        default: false
    },
    user: {
        type: Object,
        default: {}
    }
})

// const user = usePage().props.auth.user;
// const user = usePage().props.auth.user;
</script>

<template>
        <div class="">
            <div class="flex  flex-col mb-4">
                <h3 class="mr-4 font-bold text-xl mb-2">{{ user.name }}</h3>
                <p class="">@{{ user.username }}</p>
            </div>
            <div>
                <div class="mb-4">
                    <div v-if="user.avatar_path" class="user__image-wrapper">
                        <a class="" href="#" >
                            <img
                                class="user__image"
                                :src="`/storage/${user.avatar_path}`"
                            />
                        </a>
                    </div>
                    <div v-else class="user__image-wrapper">
                        <a class="" href="#">
                            <VaIcon class="user__image" name="account_circle" :size="100"  />
                        </a>
                    </div>
                </div>
            </div>
            <div class="description">
                <h3 class="mb-2 font-bold text-xl">Description</h3>
                <p>{{ user.description }}</p>
            </div>
        </div>
</template>

<style scoped>


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
        //background-image: url( './change_avatar_icon.svg' );
        background-repeat: no-repeat;
        background-position: center;
        background-size: 40px 40px;
    }

</style>
