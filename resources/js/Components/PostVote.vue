<template>
    <div
        class="flex flex-col h-full w-12 p-2 bg-red-50 text-center rounded-l-lg border border-red-200"
    >
        <UpVoteLink
            :slug="post.slug"
            :class="{
        'text-red-600': post.postVotes[0] && post.postVotes[0].vote == 1,
      }"
        />
        <div
            class="p-2 my-2 font-bold text-gray-800"
            :class="{
        'text-red-600': post.postVotes[0] && post.postVotes[0].vote == 1,
        'text-red-400': post.postVotes[0] && post.postVotes[0].vote == -1,
      }"
        >
            {{ post.votes }}
        </div>
        <DownVoteLink
            :slug="post.slug"
            :class="{
        'text-red-400': post.postVotes[0] && post.postVotes[0].vote == -1,
      }"
        />
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import UpVoteLink from "./UpVoteLink.vue";
import DownVoteLink from "./DownVoteLink.vue";

defineProps({
    post: Object,
});
</script>

<style>
</style>
