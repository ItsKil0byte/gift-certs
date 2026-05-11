<template>
    <div class="flex flex-col bg-slate-50 min-h-screen p-4 gap-4">
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

        <!-- Main -->
        <main class="grow">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 items-start">
                <div class="sticky top-4 bg-white p-6 rounded-xl border-2 border-slate-200">
                    <div
                        class="w-full aspect-3/2 bg-slate-100 rounded-lg border-2 border-dashed border-slate-300 flex items-center justify-center">
                        Предварительный просмотр
                    </div>
                </div>
                <div class="bg-white p-6 rounded-xl border-2 border-slate-200 flex flex-col gap-6">
                    <div
                        class="h-48 bg-slate-100 rounded-lg border-2 border-dashed border-slate-300 flex items-center justify-center">
                        Дизайны
                    </div>
                    <div
                        class="h-32 bg-slate-100 rounded-lg border-2 border-dashed border-slate-300 flex items-center justify-center">
                        Номиналы
                    </div>
                    <div
                        class="h-64 bg-slate-100 rounded-lg border-2 border-dashed border-slate-300 flex items-center justify-center">
                        Контакты
                    </div>
                    <div
                        class="h-32 bg-slate-100 rounded-lg border-2 border-dashed border-slate-300 flex items-center justify-center">
                        Время
                    </div>
                    <div
                        class="h-64 bg-slate-100 rounded-lg border-2 border-dashed border-slate-300 flex items-center justify-center">
                        Сообщение
                    </div>
                    <div
                        class="h-32 bg-slate-100 rounded-lg border-2 border-dashed border-slate-300 flex items-center justify-center">
                        Оплата
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer
            class="flex-none h-64 md:h-48 grid grid-cols-1 md:grid-cols-[200px_1fr_200px] gap-4 bg-white p-6 rounded-xl border-2 border-slate-200">
            <div
                class="w-full h-full bg-slate-100 rounded-lg border-2 border-dashed border-slate-300 flex items-center justify-center">

            </div>
            <div
                class="w-full h-full bg-slate-100 rounded-lg border-2 border-dashed border-slate-300 flex items-center justify-center">
                Подвал
            </div>
            <div
                class="w-full h-full bg-slate-100 rounded-lg border-2 border-dashed border-slate-300 flex items-center justify-center">

            </div>
        </footer>
    </div>
</template>