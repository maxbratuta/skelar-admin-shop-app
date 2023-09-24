<template>
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
            <td
                colspan="6"
                class="px-6 py-2 text-center text-gray-500"
            >No Products Found</td>
        </tr>

        <tr
            v-for="product in products"
            :key="product.id"
            class="bg-white border-b hover:bg-gray-50"
        >
            <td class="px-6 py-2">{{ product.id }}</td>
            <td class="px-6 py-2">
                <Image
                    :size="size"
                    :src="product.image"
                    :alt="product.name"
                />
            </td>

            <td class="px-6 py-2">{{ product.name }}</td>
            <td class="px-6 py-2">{{ product.price }}</td>
            <td
                class="px-6 py-2"
                style="width: 500px;"
            >{{ product.description }}</td>
            <td class="px-6 py-2">
                <Link
                    :href="route('admin.web.products.show', { product: product.id })"
                    class="font-medium text-blue-600 hover:underline"
                >Show</Link>
            </td>
        </tr>
        </tbody>
    </table>
</template>

<script setup>
import { defineProps } from 'vue';
import Image from '@/Components/Image.vue';
import { Link } from '@inertiajs/inertia-vue3';

const { products, size } = defineProps({
    products: {
        type: Object,
        default: () => ({}),
    },
    size: {
        type: String,
        default: '100px',
    },
});
</script>

