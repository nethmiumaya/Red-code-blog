<template>
    <div class="min-h-screen flex flex-col bg-gray-100 text-gray-800">
        <!-- Navigation -->
        <nav class="bg-white border-b border-gray-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16 items-center">
                    <!-- Logo -->
                    <div class="flex items-center space-x-2">
                        <img src="/assets/company_logo.png" alt="Company Logo" class="h-10 w-auto" />
                        <Link href="/" class="text-lg font-bold text-gray-900">RedCode Blog</Link>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden sm:flex sm:items-center space-x-6">
                        <Link href="/" class="text-sm font-medium text-gray-700 hover:text-gray-900">Home</Link>
                        <Link :href="route('about')" class="text-sm font-medium text-gray-700 hover:text-gray-900">About</Link>
                        <Link :href="route('communities.index')" class="text-sm font-medium text-gray-700 hover:text-gray-900">Communities</Link>
                    </div>

                    <!-- Authentication Links -->
                    <div class="hidden sm:flex sm:items-center space-x-4">
                        <template v-if="$page.props.auth.auth_check">
                            <BreezeDropdown align="right" width="48">
                                <template #trigger>
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                        {{ $page.props.auth.user.name }}
                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </template>
                                <template #content>
                                    <BreezeDropdownLink :href="route('communities.index')">Communities</BreezeDropdownLink>
                                    <BreezeDropdownLink :href="route('logout')" method="post" as="button">Log Out</BreezeDropdownLink>
                                </template>
                            </BreezeDropdown>
                        </template>
                        <template v-else>
                            <Link :href="route('login')" class="px-4 py-1 text-sm border rounded-md text-gray-700 border-gray-300 hover:bg-gray-100">
                                Login
                            </Link>
                            <Link :href="route('register')" class="px-4 py-1 text-sm rounded-md bg-red-500 text-white hover:bg-red-600">
                                Register
                            </Link>
                        </template>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <div class="flex-grow flex items-center justify-center px-4">
            <div class="w-full max-w-2xl bg-white rounded-xl shadow-xl p-8">
                <h2 class="text-2xl font-bold mb-6">Edit Post for {{ community.name }}</h2>

                <form @submit.prevent="submit" class="space-y-6">
                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                        <input
                            id="title"
                            type="text"
                            v-model="form.title"
                            placeholder="Enter title"
                            class="w-full bg-gray-100 text-gray-800 border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                            autocomplete="title"
                        />
                        <BreezeInputError :message="errors.title" />
                    </div>

                    <!-- URL -->
                    <div>
                        <label for="url" class="block text-sm font-medium text-gray-700 mb-1">Url</label>
                        <input
                            id="url"
                            type="url"
                            v-model="form.url"
                            placeholder="Enter URL"
                            class="w-full bg-gray-100 text-gray-800 border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                            autocomplete="url"
                        />
                        <BreezeInputError :message="errors.url" />
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea
                            id="description"
                            v-model="form.description"
                            rows="4"
                            placeholder="Enter a brief description"
                            class="w-full bg-gray-100 text-gray-800 border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                        ></textarea>
                        <BreezeInputError :message="errors.description" />
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-between mt-6">
                        <button
                            type="button"
                            class="bg-transparent border border-gray-400 text-gray-800 px-6 py-2 rounded-md hover:bg-gray-200 transition"
                            @click="$inertia.visit(route('communities.index'))"
                        >
                            Back
                        </button>
                        <BreezeButton
                            class="bg-red-500 hover:bg-red-600 text-white font-semibold px-6 py-2 rounded-md transition"
                            :class="{ 'opacity-50': form.processing }"
                            :disabled="form.processing"
                        >
                            Update Post
                        </BreezeButton>
                    </div>
                </form>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-[#0d1117] text-white mt-8">
            <div class="max-w-7xl mx-auto px-4 py-10 grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <span class="text-red-500 text-xl">📝</span>
                        <h1 class="text-lg font-bold">RedCode Blog</h1>
                    </div>
                    <p class="text-sm text-gray-400">
                        A platform for interns to share their knowledge, experiences, and insights in the world of programming, design, and technology.
                    </p>
                    <div class="flex space-x-4 mt-4 text-gray-400 text-lg">
                        <a href="#"><i class="fab fa-github"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
                <div>
                    <h2 class="text-sm font-semibold text-gray-300 uppercase mb-4">Navigation</h2>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><Link href="/">Home</Link></li>
                        <li><Link href="/about">About</Link></li>
                        <li><Link :href="route('login')">Login</Link></li>
                        <li><Link :href="route('register')">Register</Link></li>
                    </ul>
                </div>
                <div>
                    <h2 class="text-sm font-semibold text-gray-300 uppercase mb-4">Categories</h2>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="#">Technology</a></li>
                        <li><a href="#">Design</a></li>
                        <li><a href="#">Development</a></li>
                        <li><a href="#">Career</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-6">
                <div class="max-w-7xl mx-auto px-4 py-4 text-center text-xs text-gray-500">
                    &copy; {{ new Date().getFullYear() }} RedCode Blog. All rights reserved.
                </div>
            </div>
        </footer>
    </div>
</template>

<script setup>
import BreezeButton from "@/Components/Button.vue";
import BreezeInputError from "@/Components/InputError.vue";
import BreezeDropdown from "@/Components/Dropdown.vue";
import BreezeDropdownLink from "@/Components/DropdownLink.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    post: Object,
    community: Object,
    errors: Object,
});

const form = useForm({
    title: props.post?.title,
    description: props.post?.description,
    url: props.post?.url,
});

const submit = () => {
    form.put(
        route("communities.posts.update", [props.community.slug, props.post.slug])
    );
};
</script>
