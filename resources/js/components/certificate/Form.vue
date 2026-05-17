<template>
    <div class="flex flex-col gap-4 rounded-xl border-2 border-slate-200 bg-white p-6 lg:col-span-5">
        <h2 class="text-xl font-bold">Настроить сертификат</h2>

        <div class="flex flex-col gap-4">
            <h3>1. Сумма</h3>
            <div class="grid grid-cols-3 gap-4 md:grid-cols-4 xl:grid-cols-5">
                <div
                    v-for="nominal in nominals"
                    :key="nominal.id"
                    @click="emit('select-nominal', nominal.id)"
                    :class="
                        selectedNominalId === nominal.id
                            ? 'border-2 border-indigo-500 bg-indigo-100'
                            : 'border border-slate-300'
                    "
                    class="flex w-full cursor-pointer items-center justify-center rounded-lg p-4 transition-colors"
                >
                    {{ nominal.value }}
                </div>
            </div>
        </div>
        <div class="flex flex-col gap-2">
            <h4 class="text-slate-500">Другая сумма</h4>
            <input
                class="rounded border border-slate-300 p-4"
                type="number"
                v-model="formData.custom_nominal"
                placeholder="500, 1250, ..."
                @input="emit('select-nominal', null)"
            />
        </div>

        <div class="flex flex-col gap-4">
            <h3>2. Контакты</h3>

            <h4 class="text-slate-500">Email получателя</h4>
            <input
                class="rounded border border-slate-300 p-4"
                type="email"
                v-model="formData.receiver_email"
                placeholder="..."
            />

            <h4 class="text-slate-500">Имя отправителя</h4>
            <input
                class="rounded border border-slate-300 p-4"
                type="text"
                v-model="formData.sender_name"
                placeholder="..."
            />

            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <div class="flex flex-col gap-2">
                    <h4 class="text-slate-500">Телефон отправителя</h4>
                    <input
                        class="rounded border border-slate-300 p-4"
                        type="tel"
                        v-model="formData.sender_phone"
                        placeholder="+7 (999) 999-99-99"
                    />
                </div>
                <div class="flex flex-col gap-2">
                    <h4 class="text-slate-500">Email отправителя</h4>
                    <input
                        class="rounded border border-slate-300 p-4"
                        type="email"
                        v-model="formData.sender_email"
                        placeholder="..."
                    />
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-4">
            <h3>3. Время отправки</h3>
            <div class="flex gap-4">
                <div class="flex items-center gap-2">
                    <input type="radio" id="now" v-model="formData.send_now" :value="true" />
                    <label for="now">Сейчас</label>
                </div>

                <div class="flex items-center gap-2">
                    <input type="radio" id="later" v-model="formData.send_now" :value="false" />
                    <label for="later">Позже</label>
                </div>
            </div>

            <div v-if="!formData.send_now">
                <div class="flex flex-col gap-2">
                    <h4 class="text-slate-500">Дата и время отправки</h4>
                    <input
                        class="rounded border border-slate-300 p-4"
                        type="datetime-local"
                        v-model="formData.send_at"
                    />
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-4">
            <h3>4. Сообщение</h3>
            <textarea
                class="resize-none rounded border border-slate-300 p-4"
                v-model="formData.message"
                placeholder="Напишите несколько пожеланий для получателя"
            ></textarea>
        </div>

        <div
            class="grid grid-cols-1 gap-4 rounded-lg border-2 border-indigo-200 bg-indigo-100 p-6 md:grid-cols-[2fr_1fr]"
        >
            <div class="flex flex-col gap-2">
                <h4 class="text-2xl font-black">Итого:</h4>
                <div class="flex items-center gap-2 text-xl">
                    <span v-if="selectedNominalId">{{ currentNominal?.value }} ₽</span>
                    <span v-else>{{ formData.custom_nominal || 0 }} ₽</span>
                </div>
            </div>
            <button
                class="rounded-lg bg-indigo-500 p-4 text-2xl font-bold text-white transition-transform duration-200 ease-in-out hover:scale-105 hover:bg-indigo-600 active:bg-indigo-700"
                @click="emit('submit')"
            >
                Оплатить
            </button>
        </div>
    </div>
</template>

<script setup>
import { computed } from 'vue'

const props = defineProps({
    nominals: Array,
    selectedNominalId: Number,
    formData: Object,
})

const emit = defineEmits(['select-nominal', 'submit'])

const currentNominal = computed(() => {
    return props.nominals.find((nominal) => nominal.id === props.selectedNominalId)
})
</script>
