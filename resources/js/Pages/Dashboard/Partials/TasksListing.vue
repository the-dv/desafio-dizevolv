<script setup>

import { BeakerIcon, CurrencyDollarIcon, UserGroupIcon, CodeBracketIcon, BanknotesIcon, ChartBarSquareIcon } from '@heroicons/vue/24/outline'
</script>

<template>

    <h1 class="text-center text-gray-500 text-3xl mb-8">Departamentos</h1>
    <div class="w-full flex flex-col md:flex-row gap-4 justify-center">

        <div class="w-100 md:w-1/6 h-auto shadow-md py-4 border rounded-md flex flex-col justify-center items-center ">
            <h1 class="text-xl text-gray-500 my-2 font-bold">Financeiro</h1>

            <div class="bg-green-100 rounded-full w-40 h-40 flex justify-center items-center">
                <CurrencyDollarIcon class="w-16 text-green-500 " />
            </div>

            <p class="my-2">1/2 concluidos</p>


        </div>

        <div class="w-100 md:w-1/6 h-auto shadow-md py-4 border rounded-md flex flex-col justify-center items-center ">
            <h1 class="text-xl text-gray-500 my-2 font-bold">Desenvolvimento</h1>

            <div class="bg-indigo-100 rounded-full w-40 h-40 flex justify-center items-center">
                <CodeBracketIcon class="w-16 text-indigo-500 " />
            </div>

            <p class="my-2">1/2 concluidos</p>


        </div>


        <div class="w-100 md:w-1/6 h-auto shadow-md py-4 border rounded-md flex flex-col justify-center items-center ">
            <h1 class="text-xl text-gray-500 my-2 font-bold">Vendas</h1>

            <div class="bg-yellow-100 rounded-full w-40 h-40 flex justify-center items-center">
                <BanknotesIcon class="w-16 text-yellow-500 " />
            </div>

            <p class="my-2">1/2 concluidos</p>


        </div>


        <div class="w-100 md:w-1/6 h-auto shadow-md py-4 border rounded-md flex flex-col justify-center items-center ">
            <h1 class="text-xl text-gray-500 my-2 font-bold">Marketing</h1>

            <div class="bg-blue-100 rounded-full w-40 h-40 flex justify-center items-center">
                <ChartBarSquareIcon class="w-16 text-blue-500 " />
            </div>

            <p class="my-2">1/2 concluidos</p>


        </div>


        <div class="w-100 md:w-1/6 h-auto shadow-md py-4 border rounded-md flex flex-col justify-center items-center ">
            <h1 class="text-md text-gray-500 my-2 text-center leading-5 font-bold">Atendimento <br> ao cliente</h1>

            <div class="bg-orange-100 rounded-full w-40 h-40 flex justify-center items-center">
                <UserGroupIcon class="w-16 text-orange-500 " />
            </div>

            <p class="my-2">1/2 concluidos</p>


        </div>

    </div>


</template>