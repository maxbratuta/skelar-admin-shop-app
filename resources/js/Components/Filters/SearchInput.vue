<template>
    <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg
                class="w-5 h-5 text-gray-500"
                aria-hidden="true"
                fill="currentColor"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path fill-rule="evenodd"
                      d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414
                         1.414l-4.816-4.816A6 6 0 012 8z"
                      clip-rule="evenodd"
                ></path>
            </svg>
        </div>

        <input
            type="text"
            id="table-search"
            v-model="internalValue"
            class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80
                   bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
            placeholder="Search"
        />
    </div>
</template>

<script setup>
import { ref, watch, defineProps, onMounted } from 'vue';
import { debounce } from 'lodash';

const props = defineProps({
    value: String,
});

const emits = defineEmits(['update:value']);

let internalValue = ref(props.value || '');

const searchWithDebounce = debounce((newValue) => {
    emits('update:value', newValue);
}, 500);

onMounted(() => {
    const urlParams = new URLSearchParams(window.location.search);

    internalValue.value = urlParams.get('search') || '';
});

watch(internalValue, (newValue) => {
    searchWithDebounce(newValue);
});
</script>
