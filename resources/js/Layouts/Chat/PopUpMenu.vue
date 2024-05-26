<script setup>
import { ref, watchEffect } from 'vue'
import { useBreakpoint } from 'vuestic-ui'
import UserProfileCard from "@/Components/Chat/User/UserProfileCard.vue";
import UserProfileModalForm from "@/Layouts/Chat/User/UserProfileModalForm.vue";

const showSidebar = ref(false)
const showModal = ref(false)

const menu = [
    { icon: 'question_answer', title: 'Create Chat' },
    { icon: 'group', title: 'Create Channel' },
    { icon: 'notifications', title: 'Notifications' },
    { icon: 'bookmarks', title: 'Bookmarks' },
    { icon: 'settings', title: 'Edit Group Tabs' },
    { icon: 'logout', title: 'Logout' },
]


//
import { usePage } from "@inertiajs/vue3";
const page = usePage();
const username = page.props.auth.user.name
//

</script>

<template>
    <div class="sidebar">
            <VaNavbar
                class="py-2 navbar">
                <template #left>
                    <VaButton
                        :color="showSidebar ? 'transparent' : 'transparent'"
                        :icon="showSidebar ? 'menu_open' : 'menu'"
                        @click="showSidebar = !showSidebar"
                    />
                </template>
            </VaNavbar>
            <VaSidebar v-model="showSidebar" class="sidebar__content">
                <VaSidebarItem>
                    <VaSidebarItemContent>
                        <UserProfileCard @click="showModal = !showModal" />
                        <UserProfileModalForm v-model="showModal" />
                    </VaSidebarItemContent>
                </VaSidebarItem>
                <VaSidebarItem v-for="{ icon, title } in menu" :key="icon">
                    <VaSidebarItemContent>
                        <VaIcon :name="icon" />
                        <VaSidebarItemTitle>
                            {{ title }}
                        </VaSidebarItemTitle>
                    </VaSidebarItemContent>
                </VaSidebarItem>
            </VaSidebar>
    </div>
    <div class="author">
        Sergei Molotov - 2024
    </div>
</template>

<style scoped>

.sidebar {
    width: min-content;

    display: flex;
    flex-direction: column;
    height: 100%;
}

.sidebar__content {
    display: inline-flex;
    height: 100%;
}

.author {
    opacity: 0.7;
    color: #e5e7eb;
    position: absolute;
    bottom: 10px;
    right: 10px;
}

.navbar {
}

</style>
