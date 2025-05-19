<script setup>
import GuestLayout from "@/Layouts/Guest.vue";
import { Link } from "@inertiajs/inertia-vue3";
import PostCard from "@/Components/PostCard.vue";
import Pagination from "@/Components/Pagination.vue";
import CommunityList from "@/Components/CommunityList.vue";
import CreatePostForm from "@/Pages/Communities/Posts/Create.vue";
import { ref } from "vue";

defineProps({
    community: Object,
    posts: Object,
    communities: Object,
    errors: Object,
});

const showModal = ref(false);
</script>

<template>
    <guest-layout>

            <div class="flex justify-between m-2 p-2">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    r/{{ community.name }}
                </h2>
                <button
                    v-if="$page.props.auth.auth_check"
                    @click="showModal = true"
                    class="px-3 py-2 rounded bg-red-500 hover:bg-red-400 text-white"
                >
                    Create Post
                </button>
            </div>


        <section class="flex md:flex-row m-2 p-2">
            <div class="w-8/12">
                <PostCard
                    v-for="post in posts.data"
                    :post="post"
                    :community="community.slug"
                    :key="post.id"
                />
                <div class="mt-4 p-2">
                    <Pagination :links="posts.meta.links" />
                </div>
            </div>

            <div class="w-4/12 p-4">
                <div>
                    <h2 class="font-semibold text-lg p-6 bg-red-500 rounded-t-lg text-white">
                        About {{ community.name }}
                    </h2>
                    <p class="bg-white p-4 rounded-b-lg">{{ community.description }}</p>
                </div>

                <CommunityList class="mt-4" :communities="communities.data">
                    <template #title>Latest Communities</template>
                </CommunityList>
            </div>
        </section>

        <!-- MODAL -->
        <div
            v-if="showModal"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
        >
            <div class="bg-white rounded-lg shadow-xl p-6 relative">
                <button
                    class="absolute top-2 right-2 text-gray-500 hover:text-gray-700"
                    @click="showModal = false"
                >
                    &times;
                </button>
                <CreatePostForm :community="community" :errors="errors" />
            </div>
        </div>
    </guest-layout>
</template>
