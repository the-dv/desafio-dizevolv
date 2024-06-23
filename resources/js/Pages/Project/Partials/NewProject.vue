<script setup>
import { useForm, usePage } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
const modalID = ref('2');
const showModalLogin = ref(false);

const props = defineProps(['departments', 'user_id']);

const showModal = () => {
    const modal = document.getElementById(modalID.value);
    if (modal) modal.showModal();
};

onMounted(() => {
    modalID.value = 'modal_' + Math.floor(Math.random() * 10000000);
});


// envio para a base

const form = useForm({
    title: '',
    description: '',
    start_date: '',
    end_date: '',
    department_id: props.departments,
    user_id: props.user_id
});

const submit = () => {
    form.post(route('project.store'), {
        onSuccess: () => {
            window.location.reload();
        }

    });
};

</script>

<template>
    <div class=" justify-items-center justify-center flex">
        <button @click="showModal" class="btn btn-primary btn-xs h-10">Criar novo projeto</button>
    </div>
    <dialog :id="modalID" class="modal">
        <div class="modal-box p-8 md:p-10 lg:p-12 xl:p-16 m-4 md:m-8 lg:m-10 xl:m-12 max-w-screen-md">
            <form @submit.prevent="submit">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>

                <h3 class="font-bold text-lg mb-6">Criar Novo Projeto</h3>
                <div class="form-group pl mb-3">
                    <label for="projectName">Nome do Projeto:</label>
                    <input type="text" id="projectName" v-model="form.title" class="input input-bordered" required>
                </div>
                <div class="form-group pl mb-3">
                    <label for="projectName">Descrição do Projeto:</label>
                    <input type="text" id="projectName" v-model="form.description" class="input input-bordered">
                </div>

                <div class="form-group pl mb-3">
                    <label for="startDate">Data de Início:</label>
                    <input type="date" id="startDate" v-model="form.start_date" class="input input-bordered" required>
                </div>
                <div class="form-group pl mb-3">
                    <label for="endDate">Data do Prazo:</label>
                    <input type="date" id="endDate" v-model="form.end_date" class="input input-bordered">
                </div>
                <div class="form-group pl mb-3">
                    <button type="submit" class="btn btn-primary">Criar Projeto</button>
                </div>
            </form>
        </div>
    </dialog>
</template>