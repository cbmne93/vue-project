<script setup>

import { useForm, Link } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';


const form = useForm({
    cedula: '',
    primer_nombre: '',
    segundo_nombre: '',
    primer_apellido: '',
    segundo_apellido: '',
    fecha_entrada: '',
    cargo_id: '',
    genero_id: '',

});


const submit = () => {
    form.post(route('empleado.store'), { form });
};

const props = defineProps({
    cargos: Array,
    generos: Array,
});

</script>

<template>
    <AppLayout title="Empleado">
    
        <div class="caja">
            <h1 class="text-3xl font-semibold text-gray-700 mb-3 mt-4">
                <span class="text-indigo-500">Empleados /</span>Crear
            </h1>

            <div class="card">

                <form @submit.prevent="submit">
                    <div class="grid grid-cols-2 gap-6">

                        <div>
                            <InputLabel for="cedula" value="Cedula" />
                            <TextInput id="cedula" v-model="form.cedula" type="text" class="mt-1 block w-full" />
                            <InputError class="mt-2" :message="form.errors.cedula" />
                        </div>
                        <div>
                            <InputLabel for="primer_nombre" value="Primer Nombre" />
                            <TextInput id="primer_nombre" v-model="form.primer_nombre" type="text" class="mt-1 block w-full" />
                            <InputError class="mt-2" :message="form.errors.primer_nombre" />
                        </div>
                        <div>
                            <InputLabel for="segundo_nombre" value="Segundo Nombre" />
                            <TextInput id="segundo_nombre" v-model="form.segundo_nombre" type="text" class="mt-1 block w-full" />
                            <InputError class="mt-2" :message="form.errors.segundo_nombre" />
                        </div>
                        <div>
                            <InputLabel for="primer_apellido" value="Primer Apellido" />
                            <TextInput id="primer_apellido" v-model="form.primer_apellido" type="text" class="mt-1 block w-full" />
                            <InputError class="mt-2" :message="form.errors.primer_apellido" />
                        </div>
                        <div>
                            <InputLabel for="segundo_apellido" value="Segundo Apellido" />
                            <TextInput id="segundo_apellido" v-model="form.segundo_apellido" type="text" class="mt-1 block w-full" />
                            <InputError class="mt-2" :message="form.errors.segundo_apellido" />
                        </div>
                        <div>
                            <InputLabel for="fecha_entrada" value="Fecha de Ingreso" />
                            <TextInput id="fecha_entrada" v-model="form.fecha_entrada" type="date" class="mt-1 block w-full" />
                            <InputError class="mt-2" :message="form.errors.fecha_entrada" />
                        </div>
                        <div>
                            <InputLabel for="cargo_id" value="Cargo" />
                            <select v-model="form.cargo_id" class="rounded-md w-full border-gray-300">
                                <option value="" selected disabled>Seleccionar una opcion</option>
                                <option v-for="c in cargos" :key="c.id" :value="c.id">{{ c.des_cargo }}</option>
                            </select>
                            <InputError class="mt-2" :message="form.errors.cargo_id" />
                        </div>
                        <div>
                            <InputLabel for="genero_id" value="Genero" />
                            <select v-model="form.genero_id" class="rounded-md w-full border-gray-300">
                                <option value="" selected disabled>Seleccionar una opcion</option>
                                <option v-for="g in generos" :key="g.id" :value="g.id">{{ g.des_genero }}</option>
                            </select>
                            <InputError class="mt-2" :message="form.errors.genero_id" />
                        </div>

                    </div>


                    <div class="flex items-center justify-end mt-4">
                        <PrimaryButton>Registrar</PrimaryButton>
                        <Link :href="route('empleado.index')" class="btn-white mx-3 px-4 py-2">
                        Cancelar
                        </Link>
                    </div>

                </form>

            </div>
        </div>
    </AppLayout>
</template>