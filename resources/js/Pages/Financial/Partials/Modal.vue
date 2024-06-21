<script setup>
import { ref, onMounted } from 'vue';
const modalID = ref('');
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
    <button @click="showModal" class="btn btn-primary btn-xs">Tarefas do projeto</button>

    <dialog :id="modalID" class="modal">
        <div class="modal-box">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="font-bold text-lg">Tarefas: nome do projeto</h3>
            <div class="w-full mt-4">
                ..
            </div>
        </div>
    </dialog>
</template>