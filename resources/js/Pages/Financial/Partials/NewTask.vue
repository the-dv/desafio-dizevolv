<script setup>
import { ref } from 'vue';
const isOpen = ref(false);


const handleShow = (() => {
    isOpen.value = !isOpen.value;
});
</script>
<template>

    <div class="w-full absolute  bg-white z-50 p-1  bottom-0 flex gap-3 shadow-lg rounded-md border">
        <div v-if="isOpen" class="w-4/5 flex flex-col gap-2 ">
            <input type="text" placeholder="Titulo da tarefa" class="input input-bordered w-full" />
            <div class=" flex gap-2">
                <div class="flex flex-col w-full">
                    <label>Data inicio</label>
                    <input type="date" class="input input-bordered">
                </div>
                <div class="flex flex-col w-full">
                    <label>Data prazo</label>
                    <input type="date" class="input input-bordered">
                </div>

            </div>
            <textarea class="textarea textarea-bordered w-full" placeholder="Descricao da tarefa..."></textarea>
        </div>
        <div class="flex flex-col gap-2 mt-3 ">
            <div>
            <button @click="handleShow" class="btn btn-primary btn-xs h-8 ">Adicionar Tarefa</button>
            </div>
            
            <div>
            <button v-if="isOpen" @click="handleShow" class="text-sm btn-warning text-red-700 p-1 mt-28 align-bottom ml-6 ">Fechar</button>
            </div>
        
        </div>
    </div>



</template>