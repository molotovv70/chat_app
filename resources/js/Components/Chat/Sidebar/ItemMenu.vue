<script setup>

import ChatItem from "@/Components/Chat/Sidebar/Item.vue";
import {toRefs} from "vue";

const props = defineProps({
    items: {
        type: Array,
        default: [],
    },
    route_name: {
        type: String,
        required: true,
    }
})

const { items, route_name } = toRefs(props);

</script>

<template>
    <div class="item-menu">
        <ChatItem v-for="item in items" :item="item" :id="item.id" :route_name="route_name" />
    </div>
</template>

<style scoped>
.item-menu {
    display: flex;
    background-color: rgb(41, 45, 53);
    height: 100%;
    width: 250px;
    flex-direction: column;
}
</style>
