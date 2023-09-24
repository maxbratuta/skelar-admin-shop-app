<template>
    <ShopLayout :auth="auth">
        <template #title>Home page</template>

        <ItemsFilters
            class="bg-white overflow-hidden shadow-sm sm:rounded-lg relative p-4"
            :filters="filters"
            :meta="meta"
            :route-name="'shop.web.home.index'"
        >
            <ProductCardWrapper
                :products="products"
                :size="'200px'"
            />
        </ItemsFilters>
    </ShopLayout>
</template>

<script setup>
import ShopLayout from '@/Layouts/ShopLayout.vue';
import { defineProps } from 'vue';
import ProductCardWrapper from '@/Components/Shop/Product/ProductCardWrapper.vue';
import ItemsFilters from '@/Components/Filters/ItemsFilters.vue';

const { auth, products, filters, meta } = defineProps({
    auth: Object,
    products: Object,
    filters: Object,
    meta: Object,
});
</script>
