<script setup>

import ChatItem from "@/Components/Chat/Sidebar/Item.vue";
import {computed, ref, toRefs} from "vue";

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

const searchInput = ref("");

const filteredItems = computed(() => {
    if (searchInput.value.length < 2) {
        return items.value;
    }
    return items.value.filter(item => {
        return item.name.toLowerCase().includes(searchInput.value.toLowerCase());
    });
});

</script>

<template>
    <div class="item-menu">
        <div class="search-input">
            <VaInput
                v-model="searchInput"
                placeholder="Search..."
            >
                <template #appendInner>
                    <VaButton icon="search" color="Shadow" icon-color="TextPrimary" round />
                </template>
            </VaInput>
        </div>
        <ChatItem v-for="item in filteredItems" :item="item" :id="item.id" :route_name="route_name" />
        <div class="search-input__not-found text-center" v-if="searchInput&&!filteredItems.length">
            <span class="text-center w-full">Items Not Found</span>
        </div>
    </div>
</template>

<style scoped>
.item-menu {
    display: flex;
    background-color: rgb(41, 45, 53);
    height: 100%;
    width: 300px;
    flex-direction: column;
}
.search-input {
    padding: 15px 5px;
    background-color: #1f262f;
}
.search-input__not-found {
    display: flex;
    align-items: center;
    height: 120px;
    background-color: rgba(218, 66, 66, 0.14);
    font-weight: 700;
    text-align: center;
    font-size: 1.25em;
    cursor: pointer;
}
</style>
