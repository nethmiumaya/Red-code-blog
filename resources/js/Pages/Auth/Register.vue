<script setup>
import BreezeButton from "@/Components/Button.vue";
import BreezeGuestLayout from "@/Layouts/Guest.vue";
import BreezeInput from "@/Components/Input.vue";
import BreezeInputError from "@/Components/InputError.vue";
import BreezeLabel from "@/Components/Label.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

defineProps({
    errors: Object,
});

const form = useForm({
    name: "",
    username: "",
    email: "",
    password: "",
    password_confirmation: "",
    terms: false,
});

const submit = () => {
    form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <BreezeGuestLayout>
        <Head title="Register" />

       
            <div class="flex shadow-lg rounded-xl overflow-hidden max-w-5xl w-full bg-white">
                <!-- Left Image Panel -->
                <div class="hidden md:block md:w-1/2 relative">
                    <img src="/assets/login_page.png" alt="Register Background" class="absolute inset-0 w-full h-full object-cover" />
                    <div class="bg-black/40 h-full w-full text-white flex flex-col justify-center items-center text-center p-6 absolute inset-0">
                        <h2 class="text-3xl font-bold">RedCode Solution</h2>
                        <p class="mt-2">Every great journey starts with a simple registration</p>
                    </div>
                </div>

                <!-- Right Form Panel -->
                <div class="w-full md:w-1/2 p-8">
                    <h2 class="text-3xl font-bold text-red-600 mb-2">Create Account</h2>
                    <p class="text-gray-600 mb-6">Register with your details</p>

                    <form @submit.prevent="submit" class="space-y-4">
                        <div>
                            <BreezeLabel for="name" value="Name" />
                            <BreezeInput
                                id="name"
                                type="text"
                                class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                                v-model="form.name"
                                autofocus
                                autocomplete="name"
                            />
                            <BreezeInputError :message="errors.name" />
                        </div>

                        <div>
                            <BreezeLabel for="username" value="Username" />
                            <BreezeInput
                                id="username"
                                type="text"
                                class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                                v-model="form.username"
                                autocomplete="username"
                            />
                            <BreezeInputError :message="errors.username" />
                        </div>

                        <div>
                            <BreezeLabel for="email" value="Email" />
                            <BreezeInput
                                id="email"
                                type="email"
                                class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                                v-model="form.email"
                                autocomplete="email"
                            />
                            <BreezeInputError :message="errors.email" />
                        </div>

                        <div>
                            <BreezeLabel for="password" value="Password" />
                            <BreezeInput
                                id="password"
                                type="password"
                                class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                                v-model="form.password"
                                autocomplete="new-password"
                            />
                            <BreezeInputError :message="errors.password" />
                        </div>

                        <div>
                            <BreezeLabel for="password_confirmation" value="Confirm Password" />
                            <BreezeInput
                                id="password_confirmation"
                                type="password"
                                class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                                v-model="form.password_confirmation"
                                autocomplete="new-password"
                            />
                        </div>

                        <BreezeButton
                            class="w-full bg-red-600 hover:bg-red-700 text-white py-2 rounded-md"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Register
                        </BreezeButton>

                        <p class="text-center text-sm text-gray-600 mt-4">
                            Already registered?
                            <Link :href="route('login')" class="text-red-500 hover:underline">Login</Link>
                        </p>
                    </form>
                </div>
            </div>

    </BreezeGuestLayout>
</template>
