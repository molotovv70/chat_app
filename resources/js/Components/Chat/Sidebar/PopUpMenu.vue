<script setup>
import { ref, watchEffect } from 'vue'
import { useBreakpoint } from 'vuestic-ui'
import UserProfileCard from "@/Components/Chat/User/UserProfileCard.vue";
import UserProfileModalForm from "@/Components/Chat/User/Form/UserProfileModalForm.vue";
import { Link } from '@inertiajs/vue3';

const showSidebar = ref(false)
const showModal = ref(false)

const menu = [
    { icon: 'question_answer', title: 'Create Chat', route_name: 'chat.create' },
    // { icon: 'group', title: 'Create Channel', route_name: 'group' },
    // { icon: 'notifications', title: 'Notifications', route_name: 'notification' },
    // { icon: 'bookmarks', title: 'Bookmarks', route_name: 'bookmark' },
    // { icon: 'settings', title: 'Edit Group Tabs', route_name: 'setting' },
    { icon: 'logout', title: 'Logout', route_name: 'logout' },
]
//     <DropdownLink :href="route('logout')" method="post" as="button">
//     Log Out
// </DropdownLink>

import { usePage } from "@inertiajs/vue3";
import DropdownLink from "@/Components/Inertia/DropdownLink.vue";
const page = usePage();
const username = page.props.auth.user.name

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
                <VaSidebarItem v-for="elem in menu" :key="elem.icon" :href="route(elem.route_name)" method="post" as="button">
                    <VaSidebarItemContent >
                        <VaIcon :name="elem.icon" />
                        <VaSidebarItemTitle>
                            {{ elem.title }}
                        </VaSidebarItemTitle>
                    </VaSidebarItemContent>
                </VaSidebarItem>
            </VaSidebar>
    </div>
    <div class="author">
        Sergei Molotov - 2024
    </div>
</template>

<style>

.sidebar {
    position: relative;
    width: min-content;

    overflow: scroll;

    display: flex;
    //flex-direction: column;
    flex-flow: wrap;
}

.sidebar__content {
    height: 100%;
}

.author {
    opacity: 0.7;
    color: #e5e7eb;
    position: absolute;
    bottom: 10px;
    right: 10px;
}
.va-navbar__left {
    align-self: flex-start !important;
}
.navbar {
    height: min-content;
}

</style>
