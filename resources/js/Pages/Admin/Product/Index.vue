<template>
    <AdminLayout>
        <template #title>Products</template>

        <div class="relative">
            <div class="flex items-center justify-between pb-4">
                <Pagination :meta="meta"/>
                <SearchInput :value="filters.search"/>
            </div>

            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">ID</th>
                    <th scope="col" class="px-6 py-3">Image</th>
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Price</th>
                    <th scope="col" class="px-6 py-3">Description</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
                </thead>

                <tbody>
                <tr v-if="products.length === 0">
                    <td colspan="6" class="px-6 py-2 text-center text-gray-500">No Products Found</td>
                </tr>

                <tr
                    v-for="product in products"
                    class="bg-white border-b hover:bg-gray-50"
                >
                    <td class="px-6 py-2">{{ product.id }}</td>
                    <td class="px-6 py-2">
                        <Image :src="product.image" :alt="product.name"/>
                    </td>
                    <td class="px-6 py-2">{{ product.name }}</td>
                    <td class="px-6 py-2">{{ product.price }}</td>
                    <td class="px-6 py-2" style="width: 500px;">{{ product.description }}</td>
                    <td class="px-6 py-2">
                        <Link
                            :href="route('admin.web.products.show', { product: product.id })"
                            class="font-medium text-blue-600 hover:underline"
                        >Show</Link>
                    </td>
                </tr>
                </tbody>
            </table>

            <div class="flex items-center justify-between pt-4">
                <Pagination :meta="meta"/>
                <div class="relative"></div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import Pagination from '@/Components/Pagination.vue';
import {Link} from '@inertiajs/inertia-vue3';
import {defineProps} from 'vue'
import Image from '@/Components/Image.vue';
import SearchInput from '@/Components/SearchInput.vue';

const props = defineProps({
    products: {
        type: Object,
        default: () => ({}),
    },
    meta: {
        type: Object,
        default: () => ({}),
    },
    filters: {
        type: String,
    },
});
</script>
