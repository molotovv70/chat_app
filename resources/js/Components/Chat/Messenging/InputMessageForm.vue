<script setup>

</script>

<template>
    <VaInput
        v-model="value"
        class="mb-6"
        placeholder="Your Message..."
    >
        <template #appendInner>
            <VaButton
                icon="send"
                color="primary"
                round
            />
        </template>
    </VaInput>
</template>

<style scoped>
.va-button {
}
</style>
