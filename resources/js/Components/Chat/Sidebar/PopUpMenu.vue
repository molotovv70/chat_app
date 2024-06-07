<script setup>
import {usePage} from "@inertiajs/vue3";
import {onMounted, ref, watch} from 'vue'
import UserProfileCard from "@/Components/Chat/User/UserProfileCard.vue";
import UserProfileModalForm from "@/Components/Chat/User/Form/UserProfileModalForm.vue";
import {useUsersStore} from "@/Stores/User.js";
import {useChatsStore} from "@/Stores/Chat.js";
import ChatMenu from "@/Components/Chat/Sidebar/ItemMenu.vue";

const showSidebar = ref(false)
const showModal = ref(false)

const selectedButton = ref(0);
const items = ref(null);

defineProps({
    chats: {
        type: Array,
        default: [],
    }
})


const page = usePage();
const username = page.props.auth.user.name
const avatar_path = page.props.auth.user.avatar_path

const usersStore = useUsersStore();
const chatsStore = useChatsStore();

const menu = [
    {icon: 'question_answer', title: 'Create Chat', route_name: 'chat.create'},
    // { icon: 'group', title: 'Create Channel', route_name: 'group' },
    // { icon: 'notifications', title: 'Notifications', route_name: 'notification' },
    // { icon: 'bookmarks', title: 'Bookmarks', route_name: 'bookmark' },
    // { icon: 'settings', title: 'Edit Group Tabs', route_name: 'settings' },
    {icon: 'logout', title: 'Logout', route_name: 'logout'},
]

const menuButtons = [
    {id: 0, icon: 'people_alt', title: 'Users', route_name: 'user.chat.show', isRounded: true, store: () => usersStore},
    {id: 1, icon: 'forum', title: 'Chats', route_name: 'chat.show', isRounded: true, store: () => chatsStore},
]

const menuBottomButtons = {
    avatar: { icon: 'people_alt', avatar_path: avatar_path, title: 'Profile', route_name: 'user.chat.show', isRounded: true},
    logout: { icon: 'forum', title: 'Logout', route_name: 'logout', isRounded: true, color: 'secondary'},
}

const fetchData = async () => {
    const menuStore = menuButtons[selectedButton.value].store();
    // if (!menuStore.getValue) {
    await menuStore.setValue()
    items.value = menuStore.getValue
    // } else {
    //     items.value = menuStore.getValue
    // }
}

const toggleSelectedButton = (id) => {
    selectedButton.value = id
}

watch(selectedButton, fetchData);

onMounted(async () => {
    const menuStore = menuButtons[selectedButton.value].store();
    await menuStore.setValue();
    items.value = menuStore.getValue;
})
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
        <VaSidebar :hidden="!showSidebar" v-model="showSidebar" class="sidebar__content">
            <VaSidebarItem>
                <VaSidebarItemContent>
                    <UserProfileCard @click="showModal = !showModal"/>
                    <UserProfileModalForm v-model="showModal"/>
                </VaSidebarItemContent>
            </VaSidebarItem>
            <VaSidebarItem v-for="elem in menu" :key="elem.icon" :href="route(elem.route_name)" method="post"
                           as="button">
                <VaSidebarItemContent>
                    <VaIcon :name="elem.icon"/>
                    <VaSidebarItemTitle>
                        {{ elem.title }}
                    </VaSidebarItemTitle>
                </VaSidebarItemContent>
            </VaSidebarItem>
        </VaSidebar>
        <div class="sidebar__bottom-menu" :class="{'sidebar__bottom-menu-none': showSidebar }" >
            <div class="sidebar__bottom-btns-top-container">
                <div
                    v-for="btn in menuButtons"
                    :class="{ 'btn-active': btn.id === selectedButton }"
                    class="sidebar__bottom-btn-item"
                >
                    <VaButton @click.prevent="toggleSelectedButton(btn.id)" :icon="btn.icon" :round="btn.isRounded"/>
                    <p class="sidebar__bottom-btn-item-text">{{ btn.title }}</p>
                </div>
            </div>
            <div class="sidebar__bottom-btns-bottom-container">
                <div class="sidebar__bottom-btn-item">
                    <VaAvatar
                        @click="showModal = !showModal"
                        :src="`/storage/${menuBottomButtons.avatar.avatar_path}`"
                        class="sidebar__bottom-avatar-btn"
                    />
                    <p class="sidebar__bottom-btn-item-text">{{ menuBottomButtons.avatar.title }}</p>
                </div>
                <div class="sidebar__bottom-btn-item">
                    <VaButton icon="logout" :href="route(menuBottomButtons.logout.route_name)" method="post" as="button" :round="true" :color="menuBottomButtons.logout.color"/>
                    <p class="sidebar__bottom-btn-item-text">{{ menuBottomButtons.logout.title }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="">
        <ChatMenu :items="items" :route_name="menuButtons[selectedButton].route_name" />
    </div>
    <div class="author">
        Sergei Molotov - 2024
    </div>
</template>

<style scoped>
.sidebar {
    position: relative;
    width: min-content;
    flex-direction: column;
    height: 100vh;
    display: flex;
}
.sidebar__content {
    height: 100%;
}
.author {
    opacity: 0.7;
    color: #e5e7eb;
    position: fixed;
    bottom: 10px;
    right: 10px;
}
.va-sidebar__menu {
}
.va-navbar__left {
    align-self: flex-start !important;
}
.navbar {
    height: min-content;
}
.sidebar__bottom-menu {
    display: flex;
    position: relative;
    flex-direction: column;
    //height: 100%;
    flex-grow: 1;
    height: 100%;
    width: 100%;
}
.sidebar__bottom-menu-none {
    display: none;
}
.sidebar__bottom-btns-top-container {
    display: flex;
    flex-direction: column;
    background-color: rgb(31, 38, 47);
    align-items: flex-start;
    flex-grow: 1;
    width: 100%;
}
.sidebar__bottom-btns-bottom-container {
    display: flex;
    flex-direction: column;
    width: 100%;
    align-self: flex-end;
    background-color: rgb(31, 38, 47);
}
.sidebar__bottom-btn-item:hover {
}
.sidebar__bottom-btn-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 80px;
    width: 100%;
}
.sidebar__bottom-avatar-btn:hover {
    cursor: pointer;
    opacity: 0.7;
}
.sidebar__bottom-btn-item-text {
    opacity: 0.9;
}
.btn-active {
    background-color: rgba(67, 68, 68, 0.47);
    border-radius: 5px 0 0 5px;
}
</style>
