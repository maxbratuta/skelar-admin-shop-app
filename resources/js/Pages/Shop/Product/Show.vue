<template>
    <ShopLayout :auth="auth">
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
                                :size="'100px'"
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
                    </tbody>
                </table>
            </div>
        </div>
    </ShopLayout>
</template>

<script setup>
import ShopLayout from '@/Layouts/ShopLayout.vue';
import { defineProps } from 'vue'
import Image from '@/Components/Image.vue';

const { auth, product } = defineProps({
    auth: Object,
    product: {
        type: Object,
        default: () => ({
            name: '',
            image: '',
            price: 0,
            description: '',
        }),
    },
});
</script>
