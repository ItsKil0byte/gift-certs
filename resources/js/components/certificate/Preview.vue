<template>
    <div class="relative flex flex-col lg:sticky lg:top-4 lg:col-span-7">
        <div class="rounded-xl border-2 border-slate-200 bg-white p-6">
            <h2 class="mb-4 text-xl font-bold">Предпросмотр</h2>

            <img
                v-if="preview"
                :src="preview"
                class="aspect-3/2 w-full rounded-lg border-2 border-slate-300 object-cover"
            />

            <div
                v-else
                class="flex aspect-3/2 w-full items-center justify-center rounded-lg border-2 border-dashed border-slate-300 bg-slate-100"
            >
                <span v-if="currentDesign" class="text-bold text-2xl text-slate-700">
                    {{ currentDesign.title }}
                </span>
                <span v-else class="text-slate-400">Выберите дизайн</span>
            </div>

            <h2 class="mt-4 mb-4 text-xl font-bold">Выберите дизайн</h2>

            <div class="grid grid-cols-2 gap-4 md:grid-cols-4 xl:grid-cols-5">
                <div
                    v-for="design in designs"
                    :key="design.id"
                    @click="emit('select-design', design.id)"
                    :class="
                        selectedDesignId === design.id
                            ? 'border-2 border-indigo-500 bg-indigo-100'
                            : 'border border-slate-300'
                    "
                    class="flex aspect-3/2 w-full cursor-pointer items-center justify-center rounded-lg transition-colors"
                >
                    {{ design.title }}
                </div>

                <div>
                    <label
                        class="flex aspect-3/2 w-full cursor-pointer flex-col items-center justify-center gap-2 rounded-lg border-2 border-dashed border-slate-300 transition-colors"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="h-6 w-6"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
                            />
                        </svg>
                        <span>Загрузить свой</span>
                        <input type="file" accept="image/jpeg, image/png" class="hidden" @change="onFileSelected" />
                    </label>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { computed } from 'vue'

const props = defineProps({
    designs: Array,
    selectedDesignId: Number,
    preview: String,
})

const emit = defineEmits(['select-design', 'custom-design'])

const currentDesign = computed(() => {
    return props.designs.find((design) => design.id === props.selectedDesignId)
})

const onFileSelected = (event) => {
    const file = event.target.files[0]

    if (!file) return

    const preview = URL.createObjectURL(file)
    emit('custom-design', { file, preview })

    event.target.value = null
}
</script>
