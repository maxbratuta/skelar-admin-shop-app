<template>
    <img
        class="rounded-lg bg-gray-300"
        :style="styleObject"
        :src="imageSrc"
        :alt="alt"
    />
</template>

<script setup>
import { defineProps, computed } from 'vue';

const { src, alt, size } = defineProps({
    src: {
        type: String,
        default: '',
    },
    alt: {
        type: String,
        default: '',
    },
    size: {
        type: String,
        default: '250px',
    },
});

const imageSrc = computed(() => src || 'https://placehold.co/250');

const styleObject = computed(() => ({
    width: size,
    height: size,
    maxWidth: size,
    maxHeight: size,
    objectFit: 'cover',
}));

</script>

