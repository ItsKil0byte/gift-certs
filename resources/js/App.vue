<template>
    <div class="flex flex-col bg-slate-50 min-h-screen p-4 gap-4">

        <Header />

        <main class="grow">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 items-start">
                <!-- Left side -->
                <Preview :designs="designs" :selected-design-id="selectedDesign"
                    @select-design="(id) => selectedDesign = id"
                    @custom-design="customDesign = $event, selectedDesign = null" />

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
const customDesign = ref(null);

const selectedDesign = ref(null);
const selectedNominal = ref(null);

const form = reactive({
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
        const data = new FormData();

        if (customDesign.value) {
            data.append('custom_design', customDesign.value);
        } else {
            data.append('design_id', selectedDesign.value);
        }

        if (form.custom_nominal) {
            data.append('custom_nominal', form.custom_nominal);
        } else {
            data.append('nominal_id', selectedNominal.value);
        }

        data.append('sender_name', form.sender_name);
        data.append('sender_email', form.sender_email);
        data.append('sender_phone', form.sender_phone);
        data.append('receiver_email', form.receiver_email);
        data.append('message', form.message);
        data.append('send_now', form.send_now);

        if (!form.send_now) {
            data.append('send_at', form.send_at);
        }

        await api.post('/certificates', data);
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