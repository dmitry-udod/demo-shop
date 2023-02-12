<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, Link} from '@inertiajs/vue3';
import ProductsList from "@/Pages/Products/Partials/ProductsList.vue";

const props = defineProps({
    products: Object,
});
</script>

<template>
    <Head title="Products"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Products</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex justify-end p-4 text-gray-900">
                        <Link :href="route('products.create')"
                              class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Create product
                        </Link>
                    </div>

                    <ProductsList :products="products.data"/>

                    <div v-if="products.links">
                        <div class="flex justify-end p-4">
                            <Link v-if="products.links.prev" :href="products.links.prev" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Prev</Link>
                            <Link v-if="products.links.next" :href="products.links.next" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Next</Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
