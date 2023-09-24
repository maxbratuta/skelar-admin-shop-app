<template>
    <AdminLayout :auth="auth">
        <template #title>Dashboard</template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                Here will be your magic 🪄
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { defineProps } from 'vue';

const { auth } = defineProps({
    auth: Object,
});

</script>
