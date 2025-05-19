<template>
    <div v-if="show" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-lg">
            <div class="flex justify-between items-center p-4 border-b">
                <h3 class="text-lg font-semibold">{{ title }}</h3>
                <button @click="close" class="text-gray-500 hover:text-gray-700">&times;</button>
            </div>
            <div class="p-4">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script setup>
defineProps({
    show: Boolean,
    title: String,
});

const emit = defineEmits(["close"]);

const close = () => {
    emit("close");
};
</script>

<style scoped>
/* Add any additional styling if needed */
</style>
