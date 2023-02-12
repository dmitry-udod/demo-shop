<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import ProductForm from "@/Pages/Products/Partials/ProductForm.vue";

const props = defineProps({
    product: Object,
});
</script>

<template>
    <Head title="Edit product"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit product</h2>
        </template>

        <ProductForm :product="product.data" :editing="true" />

    </AuthenticatedLayout>
</template>


<style scoped>

</style>
