<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';

defineProps({
    products: Object,
})
</script>

<template>
    <Head title="Products" />

    <AdminLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Products
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h1>Product List</h1>


                        <div class="flex flex-wrap -mx-4">
                            <div v-for="product in products" :key="product.id" class="w-full md:w-1/2 lg:w-1/3 px-4 mb-4">
                                <div class="max-w-sm rounded overflow-hidden shadow-lg">
                                    <img src="https://placehold.co/250" :alt="product.name" class="w-full">
                                    <div class="px-6 py-4">
                                        <div class="font-bold text-xl mb-2">{{ product.name }}</div>
                                        <p class="text-gray-700 text-base">
                                            {{ product.description }}
                                        </p>
                                    </div>
                                    <div class="px-6 py-4">
                                        <span class="bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">{{ product.category }}</span>
                                        <span class="bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700">Price: {{ product.price }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>
