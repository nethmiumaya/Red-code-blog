<template>
    <div class="min-h-screen flex flex-col bg-gray-100">
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
        <main class="flex-grow max-w-7xl mx-auto mt-6 px-4 sm:px-6 lg:px-8">
            <Head title="All Communities" />

            <!-- Create Modal -->
            <div v-if="showModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                <div class="bg-white w-full max-w-md p-6 rounded shadow-lg relative">
                    <button class="absolute top-2 right-2 text-gray-600 hover:text-black" @click="showModal = false">
                        ✖
                    </button>
                    <h2 class="text-lg font-bold mb-4">Create Community</h2>
                    <form @submit.prevent="submit">
                        <div>
                            <BreezeLabel for="name" value="Name" />
                            <BreezeInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" autofocus autocomplete="name" />
                            <BreezeInputError :message="errors.name" />
                        </div>
                        <div class="mt-4">
                            <BreezeLabel for="description" value="Description" />
                            <BreezeInput id="description" type="text" class="mt-1 block w-full" v-model="form.description" autocomplete="description" />
                            <BreezeInputError :message="errors.description" />
                        </div>
                        <div class="flex justify-end mt-4">
                            <BreezeButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Store
                            </BreezeButton>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Community List Section -->
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="px-4 sm:px-6 lg:px-8">
                        <div class="flex justify-end">
                            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                                <button
                                    @click="showModal = true"
                                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-red-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto"
                                >
                                    Add Community
                                </button>
                            </div>
                        </div>

                        <!-- Table & Pagination -->
                        <div class="mt-8 flex flex-col">
                            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-300">
                                            <thead class="bg-gray-50">
                                            <tr>
                                                <th class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                                                <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Slug</th>
                                                <th class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                                    <span class="sr-only">Edit</span>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-200 bg-white">
                                            <tr v-for="community in communities.data" :key="community.id">
                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                                    <Link :href="route('frontend.communities.show', community.slug)" class="text-blue-500 hover:text-blue-700 font-semibold">
                                                        {{ community.name }}
                                                    </Link>
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ community.slug }}</td><td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                <Link :href="route('communities.edit', community.slug)" class="text-indigo-600 hover:text-indigo-900 mr-3">
                                                    <i class="fas fa-edit"></i> <!-- Edit Icon -->
                                                </Link>
                                                <Link :href="route('communities.destroy', community.slug)" class="text-red-600 hover:text-red-900" method="delete" as="button" type="button">
                                                    <i class="fas fa-trash"></i> <!-- Delete Icon -->
                                                </Link>
                                            </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <div class="m-2 p-2">
                                            <Pagination :links="communities.links" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </main>

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
import { ref } from "vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import Pagination from "../../Components/Pagination.vue";
import BreezeDropdown from "@/Components/Dropdown.vue";
import BreezeDropdownLink from "@/Components/DropdownLink.vue";
import BreezeButton from "@/Components/Button.vue";
import BreezeInput from "@/Components/Input.vue";
import BreezeInputError from "@/Components/InputError.vue";
import BreezeLabel from "@/Components/Label.vue";

defineProps({
    communities: Object,
    errors: Object,
});

// Modal state
const showModal = ref(false);

// Form logic
const form = useForm({
    name: "",
    description: "",
});

const submit = () => {
    form.post(route("communities.store"), {
        onSuccess: () => {
            showModal.value = false;
            form.reset();
        }
    });
};

const editModal = ref(false);
const selectedCommunity = ref(null);


const openEditModal = (community) => {
    selectedCommunity.value = community;
    form.name = community.name;
    form.description = community.description;
    editModal.value = true;
};
</script>
