<template>
    <AdminLayout :auth="auth">
        <template #title>Product Edit Page</template>

        <div class="max-w-xl mx-auto">
            <div>
                <div class="mb-4">
                    <Link
                        :href="route('admin.web.products.show', { product: product.id })"
                        class="font-medium text-gray-600 hover:underline"
                    >&lt; Back</Link>
                </div>

                <Message
                    :content="message"
                    v-show="isVisible"
                />
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <BreezeValidationErrors class="mb-4"/>

                    <form @submit.prevent="submit">
                        <div>
                            <BreezeLabel
                                for="name"
                                value="Name"
                            />
                            <BreezeInput
                                id="name"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.name"
                                required
                                autofocus
                            />
                        </div>

                        <div class="mt-4">
                            <BreezeLabel
                                for="image"
                                value="Image"
                            />

                            <BreezeInput
                                id="image"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.image"
                            />
                        </div>

                        <div class="mt-4">
                            <BreezeLabel
                                for="price"
                                value="Price"
                            />

                            <BreezeInput
                                id="price"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.price"
                                required
                            />
                        </div>

                        <div class="mt-4">
                            <BreezeLabel
                                for="description"
                                value="Description"
                            />

                            <BreezeInput
                                id="description"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.description"
                                required
                            />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <BreezeButton
                                class="ml-4"
                                :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing"
                            >Update Product</BreezeButton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import BreezeButton from '@/Components/Button.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import Message from '@/Components/Message.vue';
import { Link, useForm } from '@inertiajs/inertia-vue3';
import { defineProps, ref } from 'vue';

const { product } = defineProps({
    auth: Object,
    product: {
        type: Object,
        default: () => ({
            id: 0,
            name: '',
            image: '',
            price: 0,
            description: '',
        }),
    }
});

const isVisible = ref(false);
const message = ref(null);

const form = useForm({
    name: product.name,
    image: product.image,
    price: product.price,
    description: product.description,
});

const submit = () => {
    axios.put(route('admin.api.v1.products.update', { product: product.id }), form)
        .then(response => {
            message.value =  response.data.message;

            isVisible.value = true

            // TODO : move to Message.vue
            setTimeout(() => {
                isVisible.value = false
            }, 5000)
        })
        .catch(error => {
            if (error.response) {
                message.value = error.response.data.message;
                isVisible.value = true;

                if (error.response.data.errors) {
                    message.value = Object.values(error.response.data.errors).flat().join(', ');
                }

                // TODO : move to Message.vue
                setTimeout(() => {
                    isVisible.value = false;
                }, 5000);
            }
        });
};
</script>
