<template>
    <img
        class="rounded-lg"
        style="width: 100px; height: auto;"
        :src="imageSrc"
        :alt="alt"
    />
</template>

<script setup>
import { defineProps, computed } from 'vue';

const { src, alt } = defineProps(['src', 'alt']);

const imageSrc = computed(() => src || 'https://placehold.co/250');
</script>
