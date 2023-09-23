<template>
    <AdminLayout :auth="auth">
        <template #title>Product Page</template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <table class="w-full text-left">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th
                            scope="col"
                            class="px-4 py-2 text-right"
                            style="width: 150px;"
                        >Title</th>
                        <th
                            scope="col"
                            class="px-4 py-2"
                        >Value</th>
                    </tr>

                    </thead>
                    <tbody>
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-4 py-2 text-right">ID:</td>
                        <td class="px-4 py-2">{{ product.id }}</td>
                    </tr>
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-4 py-2 text-right">Name:</td>
                        <td class="px-4 py-2">{{ product.name }}</td>
                    </tr>
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-4 py-2 text-right">Image:</td>
                        <td class="px-4 py-2">
                            <Image
                                :src="product.image"
                                :alt="product.name"
                            />
                        </td>
                    </tr>
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-4 py-2 text-right">Price:</td>
                        <td class="px-4 py-2">{{ product.price }}</td>
                    </tr>
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-4 py-2 text-right">Description:</td>
                        <td class="px-4 py-2">{{ product.description }}</td>
                    </tr>
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-4 py-2 text-right">Created At:</td>
                        <td class="px-4 py-2">{{ product.created_at }}</td>
                    </tr>
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-4 py-2 text-right">Updated At:</td>
                        <td class="px-4 py-2">{{ product.updated_at }}</td>
                    </tr>
                    </tbody>
                </table>

                <div class="pt-8 flex justify-end">
                    <Link
                        :href="route('admin.web.products.edit', { product: product.id })"
                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent
                               rounded-md font-semibold text-xs text-white uppercase tracking-widest
                               hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900
                               focus:shadow-outline-gray"
                    >Edit</Link>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { defineProps } from 'vue'
import { Link } from '@inertiajs/inertia-vue3'
import Image from '@/Components/Image.vue';

const { auth, product } = defineProps({
    auth: {
        type: Object,
        default: () => ({
            user: null
        }),
    },
    product: {
        type: Object,
        default: () => ({
            id: 0,
            name: '',
            image: '',
            price: 0,
            description: '',
            created_at: '',
            updated_at: ''
        }),
    },
});
</script>
