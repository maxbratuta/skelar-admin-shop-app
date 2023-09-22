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
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <!-- #TODO : make a list of products -->
                Home Content
            </div>
        </div>
    </ShopLayout>
</template>
