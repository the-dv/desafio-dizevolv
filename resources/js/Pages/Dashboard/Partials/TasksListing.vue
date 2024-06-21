<script setup>
import { CurrencyDollarIcon, UserGroupIcon, CodeBracketIcon, BanknotesIcon, ChartBarSquareIcon } from '@heroicons/vue/24/outline'
import { Link } from '@inertiajs/vue3';

</script>

<template>

    <h1 class="text-center text-gray-500 text-3xl mb-8">Departamentos</h1>
    <div class="w-full flex flex-col md:flex-row gap-4 justify-center">

        <Link :href="route('financial.index')" method="get" as="button">
        <div
            class="w-full p-4 h-[30vh] shadow-md py-4 border rounded-md flex flex-col justify-center items-center hover:shadow-xl transition-all">
            <h1 class="text-xl text-gray-500 my-2 font-bold">Financeiro</h1>

            <div class="bg-green-100 rounded-full w-40 h-40 flex justify-center items-center">
                <CurrencyDollarIcon class="w-16 text-green-500 " />
            </div>

            <p class="my-2">1/2 concluidos</p>

        </div>
        </Link>

        <Link :href="route('financial.index')" method="get" as="button">
        <div
            class="w-full p-4 h-[30vh] shadow-md py-4 border rounded-md flex flex-col justify-center items-center hover:shadow-xl transition-all">
            <h1 class="text-xl text-gray-500 my-2 font-bold">Desenvolvimento</h1>

            <div class="bg-indigo-100 rounded-full w-40 h-40 flex justify-center items-center">
                <CodeBracketIcon class="w-16 text-indigo-500 " />
            </div>

            <p class="my-2">1/2 concluidos</p>


        </div>
        </Link>

        <Link :href="route('financial.index')" method="get" as="button">
        <div
            class="w-full p-4 h-[30vh] shadow-md py-4 border rounded-md flex flex-col justify-center items-center hover:shadow-xl transition-all">
            <h1 class="text-xl text-gray-500 my-2 font-bold">Vendas</h1>

            <div class="bg-yellow-100 rounded-full w-40 h-40 flex justify-center items-center">
                <BanknotesIcon class="w-16 text-yellow-500 " />
            </div>

            <p class="my-2">1/2 concluidos</p>


        </div>
        </Link>

        <Link :href="route('financial.index')" method="get" as="button">
        <div
            class="w-full p-4 h-[30vh] shadow-md py-4 border rounded-md flex flex-col justify-center items-center hover:shadow-xl transition-all">
            <h1 class="text-xl text-gray-500 my-2 font-bold">Marketing</h1>

            <div class="bg-blue-100 rounded-full w-40 h-40 flex justify-center items-center">
                <ChartBarSquareIcon class="w-16 text-blue-500 " />
            </div>

            <p class="my-2">1/2 concluidos</p>


        </div>
        </Link>

        <Link :href="route('financial.index')" method="get" as="button">
        <div
            class="w-full p-4 h-[30vh] shadow-md py-4 border rounded-md flex flex-col justify-center items-center hover:shadow-xl transition-all">
            <h1 class="text-md text-gray-500 my-2 text-center leading-4 font-bold">Atendimento <br> ao cliente</h1>

            <div class="bg-orange-100 rounded-full w-40 h-40 flex justify-center items-center">
                <UserGroupIcon class="w-16 text-orange-500 " />
            </div>

            <p class="my-2">1/2 concluidos</p>


        </div>
        </Link>
    </div>


</template>