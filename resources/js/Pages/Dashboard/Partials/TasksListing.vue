<script setup>

</script>

<template>

    <h1 class="text-center text-gray-500 text-3xl mb-8">Departamentos</h1>
    <div class="w-full flex flex-col md:flex-row gap-4 justify-center">

        <div v-for="i in 5"
            class="w-100 md:w-1/6 h-auto shadow-md py-4 border rounded-md flex flex-col justify-center items-center ">
            <h1 class="text-2xl text-gray-500 my-2">Nome categoria</h1>

            <div class="bg-gray-200 rounded-full w-40 h-40"></div>

            <p class="my-2">1/2 concluidos</p>


        </div>

    </div>


</template>