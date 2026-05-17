<template>
    <div class="flex min-h-screen flex-col gap-4 bg-slate-50 p-4">
        <Header />

        <main class="grow">
            <div class="grid grid-cols-1 items-start gap-4 lg:grid-cols-12">
                <Preview
                    :designs="designs"
                    :selected-design-id="selectedDesign"
                    :preview="customDesign?.preview"
                    @select-design="setDesign"
                    @custom-design="setCustomDesign"
                />

                <Form
                    :nominals="nominals"
                    :selected-nominal-id="selectedNominal"
                    :form-data="form"
                    @select-nominal="(id) => (selectedNominal = id)"
                    @submit="submit"
                />
            </div>
        </main>

        <Footer />
    </div>
</template>

<script setup>
import api from './services/api'

import { ref, reactive, onMounted } from 'vue'

import Header from './components/layout/Header.vue'
import Footer from './components/layout/Footer.vue'
import Preview from './components/certificate/Preview.vue'
import Form from './components/certificate/Form.vue'

const designs = ref([])
const nominals = ref([])

const customDesign = ref(null)
const selectedDesign = ref(null)
const selectedNominal = ref(null)

const form = reactive({
    custom_nominal: null,
    sender_name: '',
    sender_email: '',
    sender_phone: '',
    receiver_email: '',
    message: '',
    send_now: true,
    send_at: null,
})

const clearPreview = () => {
    if (customDesign.value?.preview) {
        URL.revokeObjectURL(customDesign.value.preview)
    }
}

const setCustomDesign = (payload) => {
    clearPreview()
    customDesign.value = payload
    selectedDesign.value = null
}

const setDesign = (id) => {
    selectedDesign.value = id
    clearPreview()
    customDesign.value = null
}

const submit = async () => {
    try {
        const data = new FormData()

        // Дизайн
        if (customDesign.value) data.append('custom_design', customDesign.value.file)
        else if (selectedDesign.value) data.append('design_id', selectedDesign.value)

        // Номинал
        if (form.custom_nominal) data.append('nominal_id', form.custom_nominal)
        else if (selectedNominal.value) data.append('nominal_id', selectedNominal.value)

        // Обязательные поля
        data.append('sender_name', form.sender_name)
        data.append('sender_email', form.sender_email)
        data.append('receiver_email', form.receiver_email)
        data.append('send_now', form.send_now)

        // Необязательные поля
        if (form.sender_phone) data.append('sender_phone', form.sender_phone)
        if (form.message) data.append('message', form.message)
        if (!form.send_now && form.send_at) data.append('send_at', form.send_at)

        await api.post('/certificates', data)

        // TODO: Обработка успешного ответа
    } catch (error) {
        console.error(error)
    }
}

onMounted(async () => {
    try {
        const [designsResponse, nominalsResponse] = await Promise.all([api.get('/designs'), api.get('/nominals')])

        designs.value = designsResponse.data.data
        nominals.value = nominalsResponse.data.data
    } catch (error) {
        console.error(error)
    }
})
</script>
