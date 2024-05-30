<script setup>
import { Link } from '@inertiajs/vue3';
defineProps({
    item: {
        type: Object,
        default: {}
    },
    route_name: {
        type: String,
        required: true,
    }
})
</script>

<template>
    <Link :href="route(route_name, {id: item.id,})" class="item-item">
<!--    <div class="item-item">-->
        <div class="item-item__img-container" v-if="item.avatar_path">
            <img class="item-item__img" :src="`/storage/${item.avatar_path}`" alt="">
        </div>
        <div class="item-item__img-container" v-else>
            <VaIcon class="item-item__img" :size="80" color="#ffffff" name="account_circle" />
        </div>
        <div class="item-item__content">
            <span class="item-item__title">{{ item.name }}</span>
            <p class="item-item__last-message">{{ item.last_message }}</p>
        </div>
<!--    </div>-->
    </Link>
</template>

<style scoped>
.item-item {
    display: flex;
    align-items: center;
    height: 120px;
}
.item-item:hover {
    background-color: #6b7280;
    cursor: pointer;
}
.item-item__img {
    width: 80px;
    height: 80px;
    border-radius: 100%;
    margin: auto;
}
.item-item__img-container {
    display: flex;
    align-content: center;
    width: 150px;
    height: 100%;
}
.item-item__content {
    width: 60%;
    font-size: 1.25em;
}
.item-item__title {
    font-weight: 700;
}
.item-item__last-message {
    font-size: 0.75em;
    opacity: 0.7;
}
</style>
