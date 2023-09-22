<template>
    <!-- TODO : improve colorful messages -->
    <div
        class="mb-4 bg-gray-300 border-gray-500 text-gray-700 border-l-4 p-4"
        role="alert"
    >
        <p>{{ content }}</p>
    </div>
</template>

<script setup>
import { defineProps } from 'vue';

const props = defineProps({
    content: String,
});

</script>

<style>
.bg-gray-300 {
    background-color: #e2e8f0;
}
</style>
