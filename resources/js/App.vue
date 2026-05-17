<script setup>
import axios from 'axios';
import { ref, reactive, onMounted, computed } from 'vue';

// TODO: Убрать в отдельный файл

const api = axios.create({
    baseURL: '/api',
});

const designs = ref([]);
const nominals = ref([]);

const selectedDesign = ref(null);
const selectedNominal = ref(null);

const currentDesign = computed(() => {
    return designs.value.find(design => design.id === selectedDesign.value);
});

const currentNominal = computed(() => {
    return nominals.value.find(nominal => nominal.id === selectedNominal.value);
});

const submit = async () => {
    try {
        const payload = {
            ...form,
            design_id: selectedDesign.value,
            nominal_id: selectedNominal.value,
        };

        console.log(payload);
        // TODO: Отправить на сервер
    } catch (error) {
        console.error(error);
    }
}

const form = reactive({
    custom_design: null,
    custom_nominal: null,
    sender_name: '',
    sender_email: '',
    sender_phone: '',
    receiver_email: '',
    message: '',
    send_now: true,
    send_at: null
})

onMounted(async () => {
    try {
        const designs_response = await api.get('/designs');
        designs.value = designs_response.data.data;

        const nominals_response = await api.get('/nominals');
        nominals.value = nominals_response.data.data;

        console.log(designs.value);
        console.log(nominals.value);
    } catch (error) {
        console.error(error);
    }
})
</script>

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
                            <span v-if="currentDesign" class="text-slate-700 text-2xl text-bold">
                                {{ currentDesign.title }}
                            </span>
                            <span v-else class="text-slate-400">Выберите дизайн</span>
                        </div>

                        <h2 class="text-xl font-bold mb-4 mt-4">Выберите дизайн</h2>
                        <div class="grid grid-cols-4 gap-4">
                            <div v-for="design in designs" :key="design.id" @click="selectedDesign = design.id"
                                :class="selectedDesign === design.id ? 'border-2 border-indigo-500 bg-indigo-100' : ' border border-slate-300'"
                                class="w-full aspect-3/2 rounded-lg flex items-center justify-center cursor-pointer transition-colors">
                                {{ design.title }}
                            </div>
                            <div>
                                <label
                                    class="w-full aspect-3/2 rounded-lg border-2 border-dashed border-slate-300 flex items-center justify-center cursor-pointer transition-colors flex-col gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span>Загрузить свой</span>
                                    <input type="file" accept="image/*" class="hidden">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-5 bg-white p-6 rounded-xl border-2 border-slate-200 flex flex-col gap-4">
                    <h2 class="text-xl font-bold">Настроить сертификат</h2>

                    <div class="flex flex-col gap-4">
                        <h3>1. Сумма</h3>
                        <div class="grid grid-cols-5 gap-4">
                            <div v-for="nominal in nominals" :key="nominal.id" @click="selectedNominal = nominal.id"
                                :class="selectedNominal === nominal.id ? 'border-2 border-indigo-500 bg-indigo-100' : 'border border-slate-300'"
                                class="w-full p-4 rounded-lg flex items-center justify-center cursor-pointer transition-colors">
                                {{ nominal.value }}
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2">
                        <h4 class="text-slate-500">Другая сумма</h4>
                        <input class="border border-slate-300 rounded p-4" type="number" v-model="form.custom_nominal"
                            placeholder="500, 1250, ..." @input="selectedNominal = null">
                    </div>

                    <div class="flex flex-col gap-4">
                        <h3>2. Контакты</h3>

                        <h4 class="text-slate-500">Email получателя</h4>
                        <input class="border border-slate-300 rounded p-4" type="email" v-model="form.receiver_email"
                            placeholder="...">

                        <h4 class="text-slate-500">Имя отправителя</h4>
                        <input class="border border-slate-300 rounded p-4" type="text" v-model="form.sender_name"
                            placeholder="...">

                        <div class="grid grid-cols-2 gap-4">
                            <div class="flex flex-col gap-2">
                                <h4 class="text-slate-500">Телефон отправителя</h4>
                                <input class="border border-slate-300 rounded p-4" type="tel"
                                    v-model="form.sender_phone" placeholder="+7 (999) 999-99-99">
                            </div>
                            <div class="flex flex-col gap-2">
                                <h4 class="text-slate-500">Email отправителя</h4>
                                <input class="border border-slate-300 rounded p-4" type="email"
                                    v-model="form.sender_email" placeholder="...">
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col gap-4">
                        <h3>3. Время отправки</h3>
                        <div class="flex gap-4">
                            <div class="flex items-center gap-2">
                                <input type="radio" id="now" v-model="form.send_now" :value="true">
                                <label for="now">Сейчас</label>
                            </div>

                            <div class="flex items-center gap-2">
                                <input type="radio" id="later" v-model="form.send_now" :value="false">
                                <label for="later">Позже</label>
                            </div>
                        </div>

                        <div v-if="!form.send_now">
                            <div class="flex flex-col gap-2">
                                <h4 class="text-slate-500">Дата и время отправки</h4>
                                <input class="border border-slate-300 rounded p-4" type="datetime-local"
                                    v-model="form.send_at">
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col gap-4">
                        <h3>4. Сообщение</h3>
                        <textarea class="border border-slate-300 rounded p-4 resize-none" v-model="form.message"
                            placeholder="Напишите несколько пожеланий для получателя"></textarea>
                    </div>

                    <div class="grid grid-cols-[2fr_1fr] gap-4 bg-indigo-100 p-6 rounded-lg border-2 border-indigo-200">
                        <div class="flex flex-col gap-2">
                            <h4 class="text-2xl font-black">Итого:</h4>
                            <div class="flex items-center gap-2 text-xl">
                                <span v-if="selectedNominal">{{ currentNominal?.value }} ₽</span>
                                <span v-else>{{ form.custom_nominal || 0 }} ₽</span>
                            </div>
                        </div>
                        <button
                            class="bg-indigo-500 hover:bg-indigo-600 hover:scale-105 active:bg-indigo-700 text-white rounded-lg p-4 font-bold text-2xl transition-transform duration-200 ease-in-out"
                            @click="submit">Оплатить</button>
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