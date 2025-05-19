<script setup>
import BreezeButton from "@/Components/Button.vue";
import BreezeCheckbox from "@/Components/Checkbox.vue";
import BreezeGuestLayout from "@/Layouts/Guest.vue";
import BreezeInput from "@/Components/Input.vue";
import BreezeLabel from "@/Components/Label.vue";
import BreezeValidationErrors from "@/Components/ValidationErrors.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <BreezeGuestLayout>
        <Head title="Log in" />



            <div class="flex shadow-lg rounded-xl overflow-hidden max-w-5xl w-full bg-white">
                <!-- Left Image Panel -->
                <div class="hidden md:block md:w-1/2 relative">
                    <img src="/assets/login_page.png" alt="Travelista Tours" class="absolute inset-0 w-full h-full object-cover" />
                    <div class="bg-black/40 h-full w-full text-white flex flex-col justify-center items-center text-center p-6 absolute inset-0">
                        <h2 class="text-3xl font-bold">RedCode Solution </h2>
                        <p class="mt-2">Travel is the only purchase that enriches you in ways beyond material wealth</p>
                    </div>
                </div>

                <!-- Right Form Panel -->
                <div class="w-full md:w-1/2 p-8">
                    <BreezeValidationErrors class="mb-4" />

                    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                        {{ status }}
                    </div>

                    <h2 class="text-3xl font-bold text-red-600 mb-2">Welcome</h2>
                    <p class="text-gray-600 mb-6">Login with Email</p>

                    <form @submit.prevent="submit" class="space-y-4">
                        <div>
                            <BreezeLabel for="email" value="Email" />
                            <BreezeInput
                                id="email"
                                type="email"
                                class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                                v-model="form.email"
                                required
                                autofocus
                                autocomplete="username"
                            />
                        </div>

                        <div>
                            <BreezeLabel for="password" value="Password" />
                            <BreezeInput
                                id="password"
                                type="password"
                                class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                                v-model="form.password"
                                required
                                autocomplete="current-password"
                            />
                        </div>

                        <div class="flex justify-between items-center">
                            <label class="flex items-center text-sm">
                                <BreezeCheckbox name="remember" v-model:checked="form.remember" />
                                <span class="ml-2 text-gray-600">Remember me</span>
                            </label>

                            <Link
                                v-if="canResetPassword"
                                :href="route('password.request')"
                                class="text-sm text-red-500 hover:underline"
                            >
                                Forgot password?
                            </Link>
                        </div>

                        <BreezeButton
                            class="w-full bg-red-600 hover:bg-red-700 text-white py-2 rounded-md text-center"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Log In
                        </BreezeButton>

                        <div class="flex items-center justify-center my-4">
                            <span class="text-gray-400 text-sm">or</span>
                        </div>

                        <!-- Social Login Buttons -->
                        <div class="flex space-x-4 justify-center">
                            <button class="bg-white border rounded-md px-4 py-2 shadow-sm hover:bg-gray-50">
                                <img src="/assets/icons/fb.png" class="w-5 h-5 inline-block" alt="Facebook" />
                            </button>
                            <button class="bg-white border rounded-md px-4 py-2 shadow-sm hover:bg-gray-50">
                                <img src="/assets/icons/linkdin.png" class="w-5 h-5 inline-block" alt="LinkedIn" />
                            </button>
                            <button class="bg-white border rounded-md px-4 py-2 shadow-sm hover:bg-gray-50">
                                <img src="/assets/icons/insta.png" class="w-5 h-5 inline-block" alt="Instagram" />
                            </button>
                        </div>

                        <p class="text-center text-sm text-gray-600 mt-4">
                            Don’t have an account?
                            <Link :href="route('register')" class="text-red-500 hover:underline">Register Now</Link>
                        </p>
                    </form>
                </div>
            </div>

    </BreezeGuestLayout>
</template>
