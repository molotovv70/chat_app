<script setup>
const props = defineProps({
    size: {
        type: Number,
        default: 64
    },
})

</script>

<template>
    <div class="profile-card__user-icon">
        <VaIcon name="account_circle" :size="size" />
    </div>
</template>

<style scoped>

</style>
