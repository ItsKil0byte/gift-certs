<template>

    <!-- TODO: Разбить на компоненты -->

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
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 items-start">
                <div class="lg:col-span-7 relative lg:sticky lg:top-4 flex flex-col">

                    <!-- Preview -->
                    <div class="bg-white p-6 rounded-xl border-2 border-slate-200">
                        <h2 class="text-xl font-bold mb-4">Предпросмотр</h2>
                        <div
                            class="w-full aspect-3/2 bg-slate-100 rounded-lg border-2 border-dashed border-slate-300 flex items-center justify-center">
                            Сертификат
                        </div>

                        <h2 class="text-xl font-bold mb-4 mt-4">Выберите дизайн</h2>
                        <div
                            class="h-32 bg-slate-100 rounded-lg border-2 border-dashed border-slate-300 flex items-center justify-center">
                            Слайдер дизайнов
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-5 bg-white p-6 rounded-xl border-2 border-slate-200 flex flex-col gap-6">
                    <h2 class="text-xl font-bold">Настроить сертификат</h2>

                    <div
                        class="h-32 bg-slate-100 rounded-lg border-2 border-dashed border-slate-300 flex items-center justify-center">
                        1. Номинал
                    </div>

                    <div
                        class="h-64 bg-slate-100 rounded-lg border-2 border-dashed border-slate-300 flex items-center justify-center">
                        2. Контакты
                    </div>

                    <div
                        class="h-32 bg-slate-100 rounded-lg border-2 border-dashed border-slate-300 flex items-center justify-center">
                        3. Дата и время
                    </div>

                    <div
                        class="h-48 bg-slate-100 rounded-lg border-2 border-dashed border-slate-300 flex items-center justify-center">
                        4. Сообщение
                    </div>

                    <div
                        class="h-32 bg-indigo-50 rounded-lg border-2 border-indigo-100 flex items-center justify-center text-indigo-900 font-bold">
                        Итого к оплате и кнопка
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