<template>
    <div class="flex flex-col bg-slate-50 min-h-screen p-4 gap-4">

        <Header />

        <main class="grow">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 items-start">
                <!-- Left side -->
                <Preview :designs="designs" :selected-design-id="selectedDesign"
                    @select-design="(id) => selectedDesign = id" />

                <!-- Right side -->
                <Form :nominals="nominals" :selected-nominal-id="selectedNominal" :form-data="form"
                    @select-nominal="(id) => selectedNominal = id" @submit="submit" />
            </div>
        </main>

        <Footer />
    </div>
</template>

<script setup>
import api from './services/api';

import { ref, reactive, onMounted } from 'vue';

import Header from './components/layout/Header.vue';
import Footer from './components/layout/Footer.vue';
import Preview from './components/certificate/Preview.vue';
import Form from './components/certificate/Form.vue';

const designs = ref([]);
const nominals = ref([]);

const selectedDesign = ref(null);
const selectedNominal = ref(null);

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

onMounted(async () => {
    try {
        const designs_response = await api.get('/designs');
        designs.value = designs_response.data.data;

        const nominals_response = await api.get('/nominals');
        nominals.value = nominals_response.data.data;
    } catch (error) {
        console.error(error);
    }
})
</script>