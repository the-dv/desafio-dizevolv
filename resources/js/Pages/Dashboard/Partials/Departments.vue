<script setup>
import { CurrencyDollarIcon, UserGroupIcon, CodeBracketIcon, BanknotesIcon, ChartBarSquareIcon } from '@heroicons/vue/24/outline'
import { Link } from '@inertiajs/vue3';

const props = defineProps(['departments']);

</script>

<template>

    <h1 class="text-center text-gray-500 text-3xl mb-8">Departamentos</h1>
    <div class="w-full flex flex-col md:flex-row gap-4 justify-center">

        <Link v-for="(i, index) in props.departments" :key="index" :href="route(i.uri)" method="get" as="button">
        <div
            class="w-full p-4 h-[30vh] shadow-md py-4 border rounded-md flex flex-col justify-center items-center hover:shadow-xl transition-all">
            <h1 class="text-xl text-gray-500 my-2 font-bold">{{ i.name }} </h1>

            <div v-if="i.id == 1" class="bg-green-100 rounded-full w-40 h-40 flex justify-center items-center">
                <CurrencyDollarIcon class="w-16 text-green-500 " />
            </div>

            <div v-if="i.id == 2" class="bg-indigo-100 rounded-full w-40 h-40 flex justify-center items-center">
                <CodeBracketIcon class="w-16 text-indigo-500 " />
            </div>

            <div v-if="i.id == 3" class="bg-yellow-100 rounded-full w-40 h-40 flex justify-center items-center">
                <BanknotesIcon class="w-16 text-yellow-500 " />
            </div>

            <div v-if="i.id == 4" class="bg-blue-100 rounded-full w-40 h-40 flex justify-center items-center">
                <ChartBarSquareIcon class="w-16 text-blue-500 " />
            </div>

            <div v-if="i.id == 5" class="bg-orange-100 rounded-full w-40 h-40 flex justify-center items-center">
                <UserGroupIcon class="w-16 text-orange-500 " />
            </div>

            <p class="my-2">1/2 concluidos</p>

        </div>
        </Link>

    </div>

</template>