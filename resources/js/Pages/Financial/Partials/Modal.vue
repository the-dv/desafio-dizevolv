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
        <div class="modal-box w-11/12 max-w-5xl">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="font-bold text-lg">Tarefas: nome do projeto</h3>
            <div class="w-full mt-4 border flex flex-row h-auto">

                <div class="w-3/5 border p-2"></div>

                <!-- right side -->
                <div class="w-2/5     p-2">
                    <h2 class="text-gray-500 text-xl">Comentários</h2>
                    <div class="w-full  mt-4 display flex flex-col  ">
                        <!-- content comentarios -->
                        <div class="w-full h-[50vh] overflow-x-auto flex flex-col gap-4">
                            <!-- comentario -->
                            <div v-for="i in 6" class="w-full p-1 bg-blue-100 rounded-md">
                                <p>Davi silva:</p>
                                <small>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio cumque enim
                                    assumenda
                                    accusantium ipsa praesentium, harum voluptates blanditiis eos saepe qui doloremque
                                    iure
                                    culpa? Ratione veniam officiis itaque quaerat reiciendis.</small>
                            </div>
                        </div>

                        <div class="w-full flex gap-1 flex-row py-3">
                            <textarea class="textarea textarea-bordered w-4/5" placeholder="Bio"></textarea>
                            <button class="1/5 btn btn-sm bg-blue-500 hover:bg-blue-600 text-white">Enviar</button>
                        </div>


                    </div>

                </div>

            </div>
        </div>
    </dialog>
</template>