<template>
    <img
        class="rounded-lg"
        style="width: 100px; height: auto;"
        :src="src"
        :alt="alt"
    />
</template>

<script setup>
    const props = defineProps(['src', 'alt']);
</script>
