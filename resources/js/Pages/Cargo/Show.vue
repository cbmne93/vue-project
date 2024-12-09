<script setup>

import { Link, useForm } from '@inertiajs/vue3';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import AppLayout from '@/Layouts/AppLayout.vue';

const props = defineProps({
    cargo: Object,
});

const cargo = props.cargo;

const form = useForm({
    des_cargo: cargo.des_cargo,

});

</script>

<template>
    <AppLayout title="Cargo">
    
        <div class="caja">
            <h1 class="text-3xl font-semibold text-gray-700 mb-3 mt-4">
                <span class="text-indigo-500">Cargos /</span>Visualizar
            </h1>

            <div class="card">

                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <InputLabel for="des_cargo" value="Descripcion" />
                            <TextInput id="des_genero" v-model="form.des_cargo" type="text"
                                class="mt-1 block w-full" disabled />
                        </div>
                    </div>


                    <div class="flex items-center justify-end mt-4">
                        <Link :href="route('cargo.index')" class="btn-nuevo">
                        Atras
                        </Link>
                    </div>


            </div>
        </div>
    </AppLayout>
</template>