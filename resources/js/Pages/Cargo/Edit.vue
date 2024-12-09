<script setup>

import { useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps({
    cargo: Object,
});

const cargo = props.cargo;

const form = useForm({
    des_cargo: cargo.des_cargo,
    state: cargo.state,
});


const submit = () => {
    form.put(route('cargo.update', cargo.id), { form });
};


</script>

<template>
    <AppLayout title="Cargo">

        <div class="caja">
            <h1 class="text-3xl font-semibold text-gray-700 mb-3 mt-4">
                <span class="text-indigo-500">Cargos /</span>Editar
            </h1>

            <div class="card">

                <form @submit.prevent="submit">
                    <div class="grid grid-cols-1 gap-6">

                        <div>
                            <InputLabel for="des_cargo" value="Descripcion" />
                            <TextInput id="des_genero" v-model="form.des_cargo" type="text" class="mt-1 block w-full" />
                            <InputError class="mt-2" :message="form.errors.des_cargo" />
                        </div>

                        <div>
                            <InputLabel for="state" value="Estado" />
                            <select v-model="form.state" class="rounded-md w-full border-gray-300">
                                <option value="ACTIVO">ACTIVO</option>
                                <option value="INACTIVO">INACTIVO</option>
                            </select>
                            <InputError class="mt-2" :message="form.errors.state" />
                        </div>

                    </div>


                    <div class="flex items-center justify-end mt-4">
                        <PrimaryButton class="ms-4">
                            Actualizar
                        </PrimaryButton>
                    </div>

                </form>

            </div>
        </div>
    </AppLayout>
</template>