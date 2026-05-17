<template>
    <div class="lg:col-span-7 relative lg:sticky lg:top-4 flex flex-col">
        <div class="bg-white p-6 rounded-xl border-2 border-slate-200">
            <h2 class="text-xl font-bold mb-4">Предпросмотр</h2>

            <img v-if="preview" :src="preview"
                class="w-full aspect-3/2 rounded-lg border-2 border-slate-300 object-cover" />

            <div v-else
                class="w-full aspect-3/2 bg-slate-100 rounded-lg border-2 border-dashed border-slate-300 flex items-center justify-center">
                <span v-if="currentDesign" class="text-slate-700 text-2xl text-bold">
                    {{ currentDesign.title }}
                </span>
                <span v-else class="text-slate-400">Выберите дизайн</span>
            </div>

            <h2 class="text-xl font-bold mb-4 mt-4">Выберите дизайн</h2>

            <div class="grid grid-cols-2 md:grid-cols-4 xl:grid-cols-5 gap-4">

                <div v-for="design in designs" :key="design.id" @click="emit('select-design', design.id)"
                    :class="selectedDesignId === design.id ? 'border-2 border-indigo-500 bg-indigo-100' : ' border border-slate-300'"
                    class="w-full aspect-3/2 rounded-lg flex items-center justify-center cursor-pointer transition-colors">
                    {{ design.title }}
                </div>

                <div>
                    <label
                        class="w-full aspect-3/2 rounded-lg border-2 border-dashed border-slate-300 flex items-center justify-center cursor-pointer transition-colors flex-col gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Загрузить свой</span>
                        <input type="file" accept="image/jpeg, image/png" class="hidden" @change="onFileSelected">
                    </label>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { computed } from 'vue';

const props = defineProps({
    designs: Array,
    selectedDesignId: Number,
    preview: String
});

const emit = defineEmits(['select-design', 'custom-design']);

const currentDesign = computed(() => {
    return props.designs.find(design => design.id === props.selectedDesignId);
});

const onFileSelected = (event) => {
    const file = event.target.files[0];

    if (!file) return;

    const preview = URL.createObjectURL(file);
    emit('custom-design', { file, preview });

    event.target.value = null;
};

</script>