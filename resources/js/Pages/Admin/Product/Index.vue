<template>
    <AdminLayout :auth="auth">
        <template #title>Products</template>

        <ItemsFilters
            :filters="filters"
            :meta="meta"
            :route-name="'admin.web.products.index'"
        >
            <ProductTable :products="products"/>
        </ItemsFilters>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { defineProps } from 'vue'
import ItemsFilters from '@/Components/Filters/ItemsFilters.vue';
import ProductTable from '@/Components/Admin/Product/ProductTable.vue';

const { auth, products, filters, meta } = defineProps({
    auth: Object,
    products: Object,
    filters: Object,
    meta: Object,
});
</script>
