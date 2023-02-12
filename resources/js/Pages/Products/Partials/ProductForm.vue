<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextArea from '@/Components/TextArea.vue';
import TextInput from '@/Components/TextInput.vue';
import {useForm, Link} from "@inertiajs/vue3";

const props = defineProps({
    product: Object,
    editing: Boolean,
});

const form = useForm(props.product);
const submit = () => {
    if (props.editing) {
        form.put(route('products.update', props.product));
        return;
    }
    form.post(route('products.store'));
};
</script>

<template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <form @submit.prevent="submit" class="space-y-6">
                    <div>
                        <InputLabel for="name" value="Name"/>
                        <TextInput
                            id="name"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.name"
                            required
                            autofocus
                        />
                        <InputError class="mt-2" :message="form.errors.name"/>
                    </div>

                    <div>
                        <InputLabel for="price" value="Price"/>
                        <TextInput
                            id="price"
                            type="number"
                            class="mt-1 block w-full"
                            v-model="form.price"
                            required
                            min="0.10" max="10000.00" step="0.01"
                        />
                        <InputError class="mt-2" :message="form.errors.price"/>
                    </div>

                    <div>
                        <InputLabel for="description" value="Description"/>
                        <TextArea
                            id="description"
                            class="mt-1 block w-full"
                            v-model="form.description"
                            rows="5"
                        />
                        <InputError class="mt-2" :message="form.errors.description"/>
                    </div>

                    <div class="flex justify-center items-center">
                        <Link :href="route('products')" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">
                            Cancel
                        </Link>
                        <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Save
                        </PrimaryButton>
                    </div>
                </form>

            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
