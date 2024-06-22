<script setup>
import { ref, onMounted } from 'vue';
const modalID = ref('2');
const showModalLogin = ref(false);

const showModal = () => {
    const modal = document.getElementById(modalID.value);
    if (modal) modal.showModal();
};

onMounted(() => {
    modalID.value = 'modal_' + Math.floor(Math.random() * 10000000);
});

</script>

<template>
   <div class=" justify-items-center justify-center flex">
    <button @click="showModal" class="btn btn-primary btn-xs h-10">Criar novo projeto</button>
</div>
    <dialog :id="modalID" class="modal">
        <div class="modal-box p-8 md:p-10 lg:p-12 xl:p-16 m-4 md:m-8 lg:m-10 xl:m-12 max-w-screen-md">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            
            <h3 class="font-bold text-lg mb-6">Criar Novo Projeto</h3>
                    <div class="form-group pl mb-3">
                        <label for="projectName">Nome do Projeto:</label>
                        <input type="text" id="projectName" v-model="projectName" class="input input-bordered" required>
                    </div>
                    <div class="form-group pl mb-3">
                        <label for="projectName">Descrição do Projeto:</label>
                        <input type="text" id="projectName" v-model="projectName" class="input input-bordered">
                    </div>

                    <div class="form-group pl mb-3">
                        <label for="startDate">Data de Início:</label>
                        <input type="date" id="startDate" v-model="startDate" class="input input-bordered" required>
                    </div>
                    <div class="form-group pl mb-3">
                        <label for="endDate">Data do Prazo:</label>
                        <input type="date" id="endDate" v-model="endDate" class="input input-bordered">
                    </div>
                    <div class="form-group pl mb-3">
                        <button type="submit" class="btn btn-primary">Criar Projeto</button>
                    </div>
                </form>
            </div>
        </dialog>
</template>