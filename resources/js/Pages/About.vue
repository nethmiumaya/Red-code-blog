<script setup>
import { PenSquare, Code, FileText, UserCircle } from "lucide-vue-next";
import BreezeGuestLayout from "@/Layouts/Guest.vue";
import { Head } from "@inertiajs/inertia-vue3";
</script>

<template>
    <BreezeGuestLayout>
        <Head title="About" />
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-6 md:p-8">
                    <h1 class="text-3xl font-bold text-gray-900 mb-6">About RedCode Blog</h1>

                    <div class="prose max-w-none">
                        <p class="text-lg text-gray-700 mb-6">
                            RedCode Blog is a platform designed for interns to share their knowledge, experiences, and insights in the world of programming, design, and technology.
                        </p>

                        <h2 class="text-2xl font-bold text-gray-900 mt-8 mb-4">Our Mission</h2>
                        <p class="text-gray-700 mb-6">
                            We believe in the power of knowledge sharing. Our mission is to create a collaborative space where interns can document their journey, share their learnings, and help others navigate the exciting world of technology.
                        </p>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 my-8">
                            <div class="bg-red-50 p-6 rounded-lg border border-gray-100">
                                <div class="flex items-center mb-4">
                                    <PenSquare class="w-6 h-6 text-red-500 mr-2" />
                                    <h3 class="text-xl font-bold text-gray-800">Share Knowledge</h3>
                                </div>
                                <p class="text-gray-600">
                                    Document your experiences, tutorials, and technical insights to help others learn from your journey.
                                </p>
                            </div>

                            <div class="bg-red-50 p-6 rounded-lg border border-gray-100">
                                <div class="flex items-center mb-4">
                                    <Code class="w-6 h-6 text-red-500 mr-2" />
                                    <h3 class="text-xl font-bold text-gray-800">Technical Growth</h3>
                                </div>
                                <p class="text-gray-600">
                                    Explore cutting-edge technologies and share your experiments, project experiences, and learning paths.
                                </p>
                            </div>

                            <div class="bg-red-50 p-6 rounded-lg border border-gray-100">
                                <div class="flex items-center mb-4">
                                    <UserCircle class="w-6 h-6 text-red-500 mr-2" />
                                    <h3 class="text-xl font-bold text-gray-800">Build Community</h3>
                                </div>
                                <p class="text-gray-600">
                                    Connect with fellow interns and professionals to expand your network and create meaningful relationships.
                                </p>
                            </div>

                            <div class="bg-red-50 p-6 rounded-lg border border-gray-100">
                                <div class="flex items-center mb-4">
                                    <FileText class="w-6 h-6 text-red-500 mr-2" />
                                    <h3 class="text-xl font-bold text-gray-800">Document Journey</h3>
                                </div>
                                <p class="text-gray-600">
                                    Keep a record of your professional growth, challenges overcome, and lessons learned throughout your internship.
                                </p>
                            </div>
                        </div>

                        <h2 class="text-2xl font-bold text-gray-900 mt-8 mb-4">Join Our Community</h2>
                        <p class="text-gray-700 mb-3">
                            RedCode Blog is open to all interns interested in sharing their technical journey. Whether you're working on web development, mobile apps, data science, or design, your experiences are valuable to our community.
                        </p>
                        <p class="text-gray-700">
                            Register today to start sharing your knowledge and connecting with other passionate interns in the technology field.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </BreezeGuestLayout>
</template>
