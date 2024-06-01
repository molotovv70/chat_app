<script setup>

import ChatItem from "@/Components/Chat/Sidebar/Item.vue";
import {ref, toRefs} from "vue";

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

const searchInput = ref();

</script>

<template>
    <div class="item-menu">
        <div class="search-input">
            <VaInput
                v-model="searchInput"
                class=""
                placeholder="Search..."
            >
                <template #appendInner>
                    <VaButton icon="search" color="Shadow" icon-color="TextPrimary" round />
                </template>
            </VaInput>
        </div>
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
.search-input {
    padding: 15px 5px;
    background-color: #1f262f;
}
</style>
