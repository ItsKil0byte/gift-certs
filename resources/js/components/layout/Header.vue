<template>
    <header class="bg-white p-4 sm:p-6 rounded-xl border-2 border-slate-200">
        <div class="flex items-center justify-between">

            <!-- Логотип -->
            <div class="text-xl font-bold">Логотип</div>

            <!-- Меню -->
            <nav class="hidden md:flex items-center gap-6">
                <a href="#"
                    class="font-bold text-gray-900 underline-offset-4 hover:underline transition-transform duration-200 ease-in-out">ПРАВИЛА</a>
                <a href="#"
                    class="font-bold text-gray-900 underline-offset-4 hover:underline transition-transform duration-200 ease-in-out">ПОДДЕРЖКА</a>
            </nav>

            <!-- Кнопка мобильного меню -->
            <button @click="isMobileMenuOpen = !isMobileMenuOpen" class="md:hidden p-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>

        <!-- Мобильное меню -->
        <div v-if="isMobileMenuOpen" class="md:hidden flex flex-col gap-4 mt-4 text-center border-t-2 border-slate-100">
            <div class="flex gap-4 mt-4 items-center justify-center">
                <a href="#" class="font-bold text-gray-900">ПРАВИЛА</a>
                <a href="#" class="font-bold text-gray-900">ПОДДЕРЖКА</a>
            </div>
        </div>
    </header>
</template>

<script setup>
import { ref } from 'vue';

const isMobileMenuOpen = ref(false);

</script>