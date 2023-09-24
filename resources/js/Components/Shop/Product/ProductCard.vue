<template>
    <div class="flex flex-col items-center w-fit max-w-sm p-5 bg-white border border-gray-200 rounded-lg shadow">
        <Image
            :size="size"
            :src="product.image"
            :alt="product.name"
        />

        <div class="w-full">
            <h5 class="mt-4 mb-2 text-xl font-semibold tracking-tight text-gray-900">{{ product.name }}</h5>

            <div class="flex items-center justify-between">
                <span class="text-3xl font-bold text-gray-900">{{ product.price }}</span>

                <Link
                    :href="route('shop.web.products.show', { product: product.id })"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none
                           focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                >Show</Link>
            </div>
        </div>
    </div>
</template>

<script setup>
import { defineProps } from 'vue';
import Image from '@/Components/Image.vue';
import { Link } from '@inertiajs/inertia-vue3';

const { product, size } = defineProps({
    product: {
        type: Object,
        default: () => ({
            id: 0,
            name: '',
            image: '',
            price: 0,
            description: '',
        }),
    },
    size: {
        type: String,
        default: '250px',
    },
});
</script>

