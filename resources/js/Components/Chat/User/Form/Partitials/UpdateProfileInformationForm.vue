<script setup>
import InputError from '@/Components/Inertia/InputError.vue';
import InputLabel from '@/Components/Inertia/InputLabel.vue';
import PrimaryButton from '@/Components/Inertia/PrimaryButton.vue';
import TextInput from '@/Components/Inertia/TextInput.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const user = usePage().props.auth.user;

const form = useForm({
    name: user.name,
    email: user.email,
});

const storeProfileInformation = async () => {
    try {
        const formData = new FormData();
        formData.append('name', form.name);
        formData.append('email', form.email);
        formData.append('_method', 'patch');

        const response = await axios.post('/profile', formData)
        const data = response.data

        user.name = data.name
        user.email = data.email

    } catch (error) {
        console.error(error);
    }
};

</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Profile Information</h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Update your account's profile information and email address.
            </p>
        </header>


        <form id="updateProfileForm"
              @submit.prevent="storeProfileInformation"
              class="mt-6 space-y-6">
            <div>
                <InputLabel for="name" value="Name" />

                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                />

            </div>

            <div>
                <InputLabel for="email" value="Email" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autocomplete="username"
                />

            </div>

            <div class="flex items-center gap-4">
                <PrimaryButton>Save</PrimaryButton>
            </div>
        </form>
    </section>
</template>
