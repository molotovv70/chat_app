<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import {computed, onBeforeMount, onMounted, ref, useAttrs, provide} from "vue";
import '@/Layouts/Chat/PopUpMenu.vue';

const showModal = ref(false);

</script>

<template>
    <Head title="Chat" />
    <AuthenticatedLayout>
        <VaButton @click="showModal = !showModal">
            User {{ $page.props.auth.user.name }}
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
