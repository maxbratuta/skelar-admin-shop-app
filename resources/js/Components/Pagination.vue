<template>
    <div class="flex justify-center items-center">
        <div class="hidden mr-2 text-sm text-gray-600 lg:block">{{ meta.total }} items</div>

        <div
            class="flex space-x-1 items-top"
            v-if="meta.last_page > 1"
        >
            <button
                :disabled="noPreviousPage"
                :class="{'opacity-50': noPreviousPage}"
                @click="loadPage(1)"
                class="inline-flex justify-center items-center w-11 h-11 text-gray-700 bg-white rounded border
                       border-gray-200 shadow-sm outline-none hover:bg-gray-50 lg:h-9 lg:w-9 lg:text-sm focus:ring-1
                       focus:ring-blue-500 focus:border-blue-500"
            >
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-4 h-4 lg:h-3 lg:w-3"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M11 19l-7-7 7-7"
                    />
                </svg>
            </button>

            <button
                :disabled="noPreviousPage"
                :class="{'opacity-50': noPreviousPage}"
                @click="loadPage(meta.current_page - 1)"
                class="inline-flex justify-center items-center w-11 h-11 text-gray-700 bg-white rounded border
                       border-gray-200 shadow-sm outline-none hover:bg-gray-50 lg:h-9 lg:w-9 focus:ring-1
                       focus:ring-blue-500 focus:border-blue-500"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-4 h-4 lg:h-3 lg:w-3"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>

            <div class="flex flex-col space-y-2 md:flex-row md:space-y-0 md:items-center md:space-x-1">
                <input
                    type="text"
                    @keydown.enter="loadPage(page)"
                    v-model="page"
                    class="px-2 w-11 h-11 text-center rounded border border-gray-400 shadow-sm lg:h-9 lg:w-9 lg:text-sm
                           focus:ring-blue-500 focus:border-blue-500"
                />
                <div class="px-2 text-gray-600 lg:text-sm">of {{ meta.last_page }}</div>
            </div>

            <button
                :disabled="noNextPage"
                :class="{'opacity-50': noNextPage}"
                @click="loadPage(meta.current_page + 1)"
                class="inline-flex justify-center items-center w-11 h-11 text-gray-700 bg-white rounded border
                       border-gray-300 shadow-sm outline-none hover:bg-gray-50 lg:h-9 lg:w-9 focus:ring-1
                       focus:ring-blue-500 focus:border-blue-500"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-4 h-4 lg:h-3 lg:w-3"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 5l7 7-7 7"
                    />
                </svg>
            </button>

            <button
                :disabled="noNextPage"
                :class="{'opacity-50': noNextPage}"
                @click="loadPage(meta.last_page)"
                class="inline-flex justify-center items-center w-11 h-11 text-gray-700 bg-white rounded border
                       border-gray-300 shadow-sm outline-none hover:bg-gray-50 lg:h-9 lg:w-9 focus:ring-1
                       focus:ring-blue-500 focus:border-blue-500"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-4 h-4 lg:h-3 lg:w-3"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M13 5l7 7-7 7M5 5l7 7-7 7"
                    />
                </svg>
            </button>
        </div>
    </div>
</template>

<script setup>
import { ref, watch, computed, defineProps } from 'vue';
import { Inertia } from '@inertiajs/inertia';

const props = defineProps({
    meta: {
        type: Object,
        default: () => ({
            current_page: 1,
            last_page: 1,
            total: 0,
        }),
    },
});

const page = ref(props.meta.current_page);

const noPreviousPage = computed(() => page.value - 1 <= 0);
const noNextPage = computed(() => page.value + 1 > props.meta.last_page);

watch(() => props.meta.current_page, (newPage) => {
    page.value = newPage;
});

const loadPage = (page) => {
    Inertia.get(window.location.href, { page }, { preserveState: true });
};

</script>
