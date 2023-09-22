<template>
    <AdminLayout>
        <template #title>Product Edit Page</template>

        <Message
            :content="message"
            v-show="isVisible"
        />

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <BreezeValidationErrors class="mb-4" />

                <form @submit.prevent="submit">
                    <div>
                        <BreezeLabel for="name" value="Name" />
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
    </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import BreezeButton from '@/Components/Button.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import Message from '@/Components/Message.vue';
import { useForm } from '@inertiajs/inertia-vue3';
import { defineProps, ref } from 'vue';

const props = defineProps({
    product: {
        type: Object,
        default: () => ({}),
    }
});

const isVisible = ref(false);
const message = ref(null);

const form = useForm({
    name: props.product.name,
    image: props.product.image,
    price: props.product.price,
    description: props.product.description,
});

const notification = ref();

const showSuccessNotification = () => {
    notification.value.showNotification('Це повідомлення успіху', 'success');
};

const showWarningNotification = () => {
    notification.value.showNotification('Це попередження', 'warning');
};

const showErrorNotification = () => {
    notification.value.showNotification('Це повідомлення про помилку', 'error');
};


const submit = () => {
    axios.put(route('admin.api.products.update', { product: props.product.id }), form)
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
                message.value =  error.response.data.message;

                isVisible.value = true;

                // TODO : move to Message.vue
                setTimeout(() => {
                    isVisible.value = false;
                }, 5000);
            }});
};
</script>
