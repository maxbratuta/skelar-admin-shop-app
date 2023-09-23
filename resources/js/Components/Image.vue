<template>
    <img
        class="rounded-lg bg-gray-300"
        style="width: 100px; height: 100px; max-width: 100px; max-height: 100px; object-fit: fill;"
        :src="imageSrc"
        :alt="alt"
    />
</template>

<script setup>
import { defineProps, computed } from 'vue';

const { src, alt } = defineProps(['src', 'alt']);

const imageSrc = computed(() => src || 'https://placehold.co/250');
</script>

