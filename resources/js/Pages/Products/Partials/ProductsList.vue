<script setup>
const props = defineProps(['products']);
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="relative rounded-xl overflow-auto">
        <div class="shadow-sm overflow-hidden my-8">
            <table class="border-collapse table-auto w-full text-sm">
                <thead>
                <tr>
                    <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Name</th>
                    <th class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Price, $</th>
                </tr>
                </thead>
                <tbody class="bg-white dark:bg-slate-800">
                <tr v-for="product in products" :key="product.id">
                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                        <Link :href="route('products.update', product.id)" class="text-sm text-gray-700 dark:text-gray-500 underline">
                            {{ product.name }}
                        </Link>
                    </td>
                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
                        {{ product.price }}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>



<style scoped>

</style>
