<template>
    <footer class="bg-gray-900 text-white py-8 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-3 gap-8">
            <!-- Brand Info -->
            <div>
                <h2 class="text-lg font-semibold flex items-center">
                    <span class="mr-2 text-red-500">📝</span>
                    RedCode Blog
                </h2>
                <p class="mt-2 text-sm">
                    A platform for interns to share knowledge in programming, design, and tech.
                </p>
            </div>

            <!-- Navigation -->
            <div>
                <h3 class="text-sm font-semibold mb-2">Navigation</h3>
                <ul class="space-y-1 text-sm">
                    <li><Link href="/">Home</Link></li>
                    <li><Link href="/resources/js/Pages/About">About</Link></li>
                    <li><Link href="/login">Login</Link></li>
                    <li><Link href="/register">Register</Link></li>
                </ul>
            </div>

            <!-- Categories -->
            <div>
                <h3 class="text-sm font-semibold mb-2">Categories</h3>
                <ul class="space-y-1 text-sm">
                    <li><Link href="#">Technology</Link></li>
                    <li><Link href="#">Design</Link></li>
                    <li><Link href="#">Development</Link></li>
                    <li><Link href="#">Career</Link></li>
                </ul>
            </div>
        </div>

        <div class="mt-6 text-center text-xs text-gray-400">
            &copy; 2025 RedCode Blog. All rights reserved.
        </div>
    </footer>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3'
</script>

