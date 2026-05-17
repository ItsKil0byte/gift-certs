<template>
    <header class="rounded-xl border-2 border-slate-200 bg-white p-4 sm:p-6">
        <div class="flex items-center justify-between">
            <!-- Логотип -->
            <div class="text-xl font-bold">Логотип</div>

            <!-- Меню -->
            <nav class="hidden items-center gap-6 md:flex">
                <a
                    href="#"
                    class="font-bold text-gray-900 underline-offset-4 transition-transform duration-200 ease-in-out hover:underline"
                    >ПРАВИЛА</a
                >
                <a
                    href="#"
                    class="font-bold text-gray-900 underline-offset-4 transition-transform duration-200 ease-in-out hover:underline"
                    >ПОДДЕРЖКА</a
                >
            </nav>

            <!-- Кнопка мобильного меню -->
            <button @click="isMobileMenuOpen = !isMobileMenuOpen" class="p-2 md:hidden">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="size-8"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
                    />
                </svg>
            </button>
        </div>

        <!-- Мобильное меню -->
        <div v-if="isMobileMenuOpen" class="mt-4 flex flex-col gap-4 border-t-2 border-slate-100 text-center md:hidden">
            <div class="mt-4 flex items-center justify-center gap-4">
                <a href="#" class="font-bold text-gray-900">ПРАВИЛА</a>
                <a href="#" class="font-bold text-gray-900">ПОДДЕРЖКА</a>
            </div>
        </div>
    </header>
</template>

<script setup>
import { ref } from 'vue'

const isMobileMenuOpen = ref(false)
</script>
