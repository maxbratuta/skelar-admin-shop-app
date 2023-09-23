<template>
    <ShopLayout :auth="auth">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <!-- #TODO : make a list of products -->
                Home Content
            </div>
        </div>
    </ShopLayout>
</template>

<script setup>
import ShopLayout from '@/Layouts/ShopLayout.vue';
import { defineProps } from 'vue';

const { auth, products, filters, meta } = defineProps({
    auth: {
        type: Object,
        default: () => ({
            canLogin: false,
            canRegister: false,
            isAuthenticated: false,
            isAdmin: false
        }),
    },
    products: {
        type: Object,
        default: () => ({
            id: 0,
            name: '',
            image: '',
            price: 0,
            description: '',
            created_at: '',
            updated_at: '',
        }),
    },
    filters: {
        type: Object,
        default: () => ({
            search_value: '',
        }),
    },
    meta: {
        type: Object,
        default: () => ({
            total: 0,
            current_page: 1,
            last_page: 1,
        }),
    },
});
</script>
