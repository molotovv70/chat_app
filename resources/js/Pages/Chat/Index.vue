<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref } from "vue";

const showModal = ref(false);

import '@/Components/Chat/Sidebar.vue';

</script>

<template>
    <Head title="Chat" />
    <AuthenticatedLayout>
        <VaButton @click="showModal = !showModal">
            User
        </VaButton>
        <VaModal
            v-model="showModal"
            ok-text="Apply"
        >
            <h3 class="va-h3">
                Title
            </h3>
            <p>
                Classic modal overlay which represents a dialog box or other interactive
                component, such as a dismissible alert, sub-window, etc.
            </p>
        </VaModal>
    </AuthenticatedLayout>
</template>
