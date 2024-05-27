<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

import '@/Components/Chat/Sidebar/PopUpMenu.vue';
import Sidebar from "@/Components/Chat/Sidebar/PopUpMenu.vue";
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">You're logged in!</div>
                </div>
                <VaButton>
                    Your button
                </VaButton>
                <VaButton
                    preset="secondary"
                    border-color="primary"
                    size="small"
                >
                    Your button
                </VaButton>
                <VaAlert
                    description="Hello World! I'm an alert with an important message! I use Primary blue color by default but you can choose another one :)"
                />
                <VaAlert
                    color="warning"
                    class="mb-6"
                >
                    Your account is about expire, upgrade now
                </VaAlert>
                <VaAlert
                    color="danger"
                    class="mb-6"
                >
                    Change a few things up and try submitting again!
                </VaAlert>
                <VaAlert
                    color="#ce6e67"
                    class="mb-6"
                >
                    This alert needs your attention, but it's not super important
                </VaAlert>
                <VaAlert
                    color="#fdeae7"
                    text-color="#940909"
                >
                    Hello World! This is an alert with an important message and a custom background and text color!
                </VaAlert>
                <VaAlert
                    color="info"
                    border="bottom"
                    class="mb-6"
                >
                    This alert needs your attention, but it's not super important
                </VaAlert>
                <VaAlert
                    color="warning"
                    border="left"
                    class="mb-6"
                >
                    Your account is about expire, upgrade now
                </VaAlert>
                <VaAlert
                    color="danger"
                    border="top"
                    class="mb-6"
                >
                    Change a few things up and try submitting again!
                </VaAlert>
                <VaAlert
                    color="warning"
                    icon="warning"
                    class="mb-6"
                >
                    You read this important alert message with an icon
                </VaAlert>
                <VaAlert
                    color="info"
                    class="mb-6"
                >
                    <template #icon>
                        <VaIcon name="info" />
                    </template>
                    You read this important alert message with a slotted icon
                </VaAlert>
                <VaAlert
                    color="warning"
                    outline
                    class="mb-6"
                >
                    <template #icon>
                        <VaIcon
                            name="star"
                            color="warning"
                        />
                    </template>
                    If you like Vuestic UI, please give us a star on
                    <a
                        href="https://github.com/epicmaxco/vuestic-ui"
                        target="_blank"
                    >GitHub</a>
                </VaAlert>
            </div>
        </div>
    </AuthenticatedLayout>
    <Sidebar/>
</template>
