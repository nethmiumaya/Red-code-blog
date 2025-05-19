<!-- resources/js/Components/CreatePostForm.vue -->
<template>
    <div class="bg-white p-6 rounded shadow w-full max-w-lg">
        <form @submit.prevent="submit">
            <div>
                <BreezeLabel for="title" value="Title" />
                <BreezeInput id="title" type="text" class="mt-1 block w-full" v-model="form.title" autofocus />
                <BreezeInputError :message="errors.title" />
            </div>

            <div class="mt-4">
                <BreezeLabel for="url" value="Url" />
                <BreezeInput id="url" type="url" class="mt-1 block w-full" v-model="form.url" />
                <BreezeInputError :message="errors.url" />
            </div>

            <div class="mt-4">
                <BreezeLabel for="description" value="Description" />
                <BreezeInput id="description" type="text" class="mt-1 block w-full" v-model="form.description" />
                <BreezeInputError :message="errors.description" />
            </div>

            <div class="flex justify-end mt-4">
                <BreezeButton :disabled="form.processing">Store</BreezeButton>
            </div>
        </form>
    </div>
</template>

<script setup>
import BreezeButton from "@/Components/Button.vue";
import BreezeInput from "@/Components/Input.vue";
import BreezeInputError from "@/Components/InputError.vue";
import BreezeLabel from "@/Components/Label.vue";
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    community: Object,
    errors: Object,
});

const form = useForm({
    title: "",
    description: "",
    url: "",
});

const submit = () => {
    form.post(route("communities.posts.store", props.community.slug));
};
</script>
