<template>
    <!-- Header -->
    <header
        class="flex-none h-52 md:h-32 grid md:grid-cols-[200px_1fr_200px] gap-4 bg-white p-6 rounded-xl border-2 border-slate-200">
        <!-- Logo -->
        <div
            class="w-full h-full bg-slate-100 rounded-lg border-2 border-dashed border-slate-300 flex items-center justify-center">
            Логотип
        </div>

        <!-- TODO: Сделать burger menu для мобильной версии -->

        <!-- Navigation -->
        <nav
            class="w-full h-full bg-slate-100 rounded-lg border-2 border-dashed border-slate-300 flex items-center justify-center">
            <ul class="flex gap-4">
                <li><a href="#">ПРАВИЛА</a></li>
                <li><a href="#">ПОДДЕРЖКА</a></li>
            </ul>
        </nav>

        <!-- Button -->
        <button
            class="w-full h-full bg-slate-100 rounded-lg border-2 border-dashed border-slate-300 flex items-center justify-center">
            <a href="#">Обратная связь</a>
        </button>
    </header>
</template>