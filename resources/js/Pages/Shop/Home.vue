<script setup>
import ShopLayout from '@/Layouts/ShopLayout.vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    isAuthenticated: Boolean,
    isAdmin: Boolean,
    products: Array
})
</script>

<template>
    <ShopLayout
        :canLogin="canLogin"
        :canRegister="canRegister"
        :isAuthenticated="isAuthenticated"
        :isAdmin="isAdmin"
    >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <!-- #TODO : make a list of products -->
            Home Content
        </h2>
    </ShopLayout>
</template>
