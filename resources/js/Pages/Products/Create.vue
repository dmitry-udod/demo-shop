<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import ProductForm from "@/Pages/Products/Partials/ProductForm.vue";
import { Head } from '@inertiajs/vue3';

const props = defineProps({
    product: Object,
});
</script>

<template>
    <Head title="Create product"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create Product</h2>
        </template>

        <ProductForm :product="product.data" :editing="false" />
    </AuthenticatedLayout>
</template>


<style scoped>

</style>
