<!--<template>-->
<!--    <form @submit.prevent="submit">-->
<!--        <div>-->
<!--            <BreezeLabel for="name" value="Name" />-->
<!--            <BreezeInput-->
<!--                id="name"-->
<!--                type="text"-->
<!--                class="mt-1 block w-full"-->
<!--                v-model="form.name"-->
<!--                autofocus-->
<!--                autocomplete="name"-->
<!--            />-->
<!--            <BreezeInputError :message="errors.name" />-->
<!--        </div>-->

<!--        <div class="mt-4">-->
<!--            <BreezeLabel for="description" value="Description" />-->
<!--            <BreezeInput-->
<!--                id="description"-->
<!--                type="text"-->
<!--                class="mt-1 block w-full"-->
<!--                v-model="form.description"-->
<!--                autocomplete="description"-->
<!--            />-->
<!--            <BreezeInputError :message="errors.description" />-->
<!--        </div>-->

<!--        <div class="flex items-center justify-end mt-4">-->
<!--            <BreezeButton-->
<!--                class="ml-4"-->
<!--                :class="{ 'opacity-25': form.processing }"-->
<!--                :disabled="form.processing"-->
<!--            >-->
<!--                Store-->
<!--            </BreezeButton>-->
<!--        </div>-->
<!--    </form>-->
<!--</template>-->

<!--<script setup>-->
<!--import BreezeButton from "@/Components/Button.vue";-->
<!--import BreezeInput from "@/Components/Input.vue";-->
<!--import BreezeInputError from "@/Components/InputError.vue";-->
<!--import BreezeLabel from "@/Components/Label.vue";-->
<!--import { useForm } from "@inertiajs/inertia-vue3";-->
<!--import { defineProps } from "vue";-->

<!--defineProps({-->
<!--    errors: Object,-->
<!--});-->

<!--const form = useForm({-->
<!--    name: "",-->
<!--    description: "",-->
<!--    slug: "",-->
<!--});-->

<!--const submit = () => {-->
<!--    form.post(route("communities.store"));-->
<!--};-->
<!--</script>-->
