<script>

import { Link, router } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import Pagination from '@/Shared/Pagination.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';


export default {
    components: {
        AppLayout, Pagination, Link, InputLabel, TextInput, PrimaryButton
    },

    props: {
        empleados: Object,
        prop_date_from: String,
        prop_date_to: String,
        prop_search: String,

    },

    data() {
        return {
            date_from: this.prop_date_from,
            date_to: this.prop_date_to,
            search: this.prop_search
        }
    },
    methods: {
        customSearch() {
            router.get(route('empleado.index', {
                date_from: this.date_from,
                date_to: this.date_to,
                search: this.search
            }))
        }
    }
}


</script>

<template>

    <AppLayout title="Empleado">

        <div class="caja">
            <h1 class="text-3xl font-semibold text-gray-700 mb-3 mt-4">
                <span class="text-indigo-500">Empleados </span>
            </h1>

            <div class="card">

                <!-- BOTON CREAR -->
                <div class=" px-6 py-4 flex items-center justify-start">
                    <Link :href="route('empleado.create')" class="btn-nuevo">
                    Nuevo
                    </Link>
                </div>

                <!-- FILTROS -->
                <div class="px-6 py-4 flex items-center">

                    <div>
                        <InputLabel for="date_from" value="Fecha Desde" />
                        <TextInput id="date_from" v-model="date_from" type="date" class="mt-1 block w-full" />
                    </div>
                    <div class="mx-2">
                        <InputLabel for="date_to" value="Fecha Hasta" />
                        <TextInput id="date_to" v-model="date_to" type="date" class="mt-1 block w-full" />
                    </div>
                    <div class="flex-1 mt-4 mx-2">
                        <TextInput v-model="search" type="text" placeholder="Ingrese un texto para la busqueda"
                            class="mt-1 block w-full" />
                    </div>

                    <div class="mt-6 space-x-2">
                        <PrimaryButton @click="customSearch">Filtrar</PrimaryButton>
                        <Link :href="route('empleado.index')" class="btn-white">
                        Limpiar
                        </Link>
                    </div>

                </div>



                <!-- TABLA DE CONTENIDO -->
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="table-content">
                        <thead class="table-thead">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Id
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Cedula
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nombres
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Apellidos
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Fecha
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Cargo
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Genero
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="e in empleados.data" :key="e.id" class="table-tbody-tr">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ e.id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ e.cedula }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ e.primer_nombre + ' ' + e.segundo_nombre }} 
                                </td>
                                <td class="px-6 py-4">
                                    {{ e.primer_apellido + ' ' + e.segundo_apellido }} 
                                </td>
                                <td class="px-6 py-4">
                                    {{ e.fecha_entrada }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ e.cargo.des_cargo }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ e.genero.des_genero }}
                                </td>

                                <td class="px-6 py-4">

                                    <Link :href="route('empleado.edit', e)"
                                        class="mr-3 font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    <i class="fas fa-edit"></i>
                                    </Link>
                                    <Link :href="route('empleado.show', e)"
                                        class="mr-3 font-black text-green-600 dark:text-green-500 hover:underline">
                                    <i class="fa-solid fa-eye"></i>
                                    </Link>
                                </td>
                            </tr>

                        </tbody>
                    </table>

                    <Pagination :pagination="empleados"></Pagination>

                </div>

            </div>
        </div>
    </AppLayout>
</template>