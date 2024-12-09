<script>

import { Link, router } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import Pagination from '@/Shared/Pagination.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import ButtonClear from '@/Components/ButtonClear.vue';


export default {
    components: {
        AppLayout, Pagination, Link, TextInput, PrimaryButton, ButtonClear
    },
    props: {
        cargos: Object,
        prop_search: String,
    },
    data() {
        return {
            search: this.prop_search
        }
    },
    methods: {
        customSearch() {
            router.get(route('cargo.index', {
                search: this.search
            }))
        },
        customClear() {
            router.get(route('cargo.index'))
        }
    }
}


</script>

<template>

    <AppLayout title="Cargo">

        <div class="caja">
            <h1 class="text-3xl font-semibold text-gray-700 mb-3 mt-4">
                <span class="text-indigo-500">Cargos </span>
            </h1>

            <div class="card">

                <!-- BOTON CREAR -->
                <div class=" px-6 py-4 flex items-center justify-start">
                    <Link :href="route('cargo.create')" class="btn-nuevo">
                    Nuevo
                    </Link>
                </div>

                <!-- FILTRO DE BUSQUEDA -->
                <div class="px-6 py-4 flex items-center">
                    <TextInput v-model="search" type="text" placeholder="Ingrese un texto para la busqueda"
                        class="flex-1 mx-3" />
                    <PrimaryButton @click="customSearch">Filtrar</PrimaryButton>
                    <ButtonClear class="mx-3" @click="customClear">Limpiar</ButtonClear>
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
                                    Descripcion
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Estado
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="cargo in cargos.data" :key="cargo.id" class="table-tbody-tr">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ cargo.id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ cargo.des_cargo }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <span class=" text-sm font-medium me-2 px-2.5 py-0.5 rounded"
                                            :class="cargo.state == 'ACTIVO' ? 'bg-green-100 text-green-800  dark:bg-green-900 dark:text-green-300' : 'bg-red-100 text-red-800  dark:bg-red-900 dark:text-red-300'">
                                            {{ cargo.state }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">

                                    <Link :href="route('cargo.edit', cargo)"
                                        class="mr-3 font-black text-blue-600 dark:text-blue-500 hover:underline">
                                    <i class="fas fa-edit"></i>
                                    </Link>
                                    <Link :href="route('cargo.show', cargo)"
                                        class="mr-3 font-black text-green-600 dark:text-green-500 hover:underline">
                                    <i class="fa-solid fa-eye"></i>
                                    </Link>
                                </td>
                            </tr>

                        </tbody>
                    </table>

                    <Pagination :pagination="cargos"></Pagination>

                </div>

            </div>
        </div>
    </AppLayout>
</template>