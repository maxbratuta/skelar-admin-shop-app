<template>
    <div class="relative">
        <div class="flex items-center justify-between pb-4">
            <div class="flex flex-row">
                <PerPageSelector
                    class="mr-4"
                    :perPage="perPageValue"
                    @update:perPage="updatePerPage"
                />

                <Pagination :meta="meta"/>
            </div>

            <SearchInput
                :value="searchValue"
                @update:value="updateSearch"
            />
        </div>

        <slot/>

        <div class="flex items-center justify-between pt-4">
            <Pagination :meta="meta"/>
            <div class="relative"></div>
        </div>
    </div>
</template>

<script setup>
import { defineProps, ref } from 'vue';
import PerPageSelector from "@/Components/Filters/PerPageSelector.vue";
import Pagination from '@/Components/Pagination.vue';
import SearchInput from '@/Components/Filters/SearchInput.vue';
import { Inertia } from '@inertiajs/inertia';

const { filters, meta, routeName } = defineProps(['filters', 'meta', 'routeName']);

const perPageValue = ref(filters.per_page);
const searchValue = ref(filters.search_value);

const updatePerPage = (perPage) => {
    filters.per_page = perPage;

    updateFilters();
};

const updateSearch = (search) => {
    filters.search_value = search;

    updateFilters();
};

const updateFilters = () => {
    const params = {
        per_page: filters.per_page,
    };

    if (filters.search_value) {
        params.search = filters.search_value;
    }

    Inertia.get(
        route(routeName),
        params,
        {
            preserveState: true,
            replace: true
        }
    );
};
</script>

