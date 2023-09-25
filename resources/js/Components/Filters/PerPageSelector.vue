<template>
    <select
        v-model="selected"
        @change="update"
        class="block pl-3 pr-10 py-2 text-sm border-gray-300 focus:outline-none focus:ring-blue-500
               focus:border-blue-500 sm:text-sm rounded-md"
    >
        <option :value="5">5 per page</option>
        <option :value="10">10 per page</option>
        <option :value="20">20 per page</option>
        <option :value="50">50 per page</option>
    </select>
</template>

<script setup>
import { ref, onMounted, defineProps, defineEmits } from 'vue';

const emit = defineEmits(['update:perPage']);

const { perPage } = defineProps({
    perPage: {
        type: Number,
        default: 10
    }
});

const selected = ref(perPage);

const update = () => {
    emit('update:perPage', selected.value);
};

onMounted(() => {
    const urlParams = new URLSearchParams(window.location.search);

    const urlPerPage = urlParams.get('per_page');

    if (urlPerPage) {
        selected.value = Number(urlPerPage);
    }
});
</script>
