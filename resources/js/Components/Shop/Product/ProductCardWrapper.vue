<template>
    <div
        v-if="products.length > 0"
        class="product-wrapper py-4"
    >
        <ProductCard
            v-for="product in products"
            :key="product.id"
            :product="product"
            :size="size"
        />
    </div>

    <div
        v-else
        class="text-center text-gray-500"
    >
        <p>No Products Found</p>
    </div>
</template>

<script setup>
import { defineProps } from 'vue';
import ProductCard from '@/Components/Shop/Product/ProductCard.vue';

const { products, size } = defineProps({
    products: {
        type: Object,
        default: () => ({}),
    },
    size: {
        type: String,
        default: '250px'
    }
});
</script>

<style>
.product-wrapper {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 16px;
    place-items: center;
}
</style>
