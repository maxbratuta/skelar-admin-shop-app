<template>
    <AdminLayout>
        <template #title>Product Edit Page</template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                [UPDATE_FORM]
            </div>
        </div>

    </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import {defineProps} from 'vue'

const props = defineProps({
    product: {
        type: Object,
        default: () => ({}),
    },
});
</script>
