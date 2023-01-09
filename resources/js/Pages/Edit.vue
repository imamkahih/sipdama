<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Inertia } from "@inertiajs/inertia";
import { Head } from "@inertiajs/inertia-vue3";
import { ref } from "vue";

const props = defineProps({
    mahasiswa: Object,
});
const mahasiswa = ref();
mahasiswa.value = props.mahasiswa;
const handleSubmit = () => {
    const data = {
        id: mahasiswa.value.id,
        nama: mahasiswa.value.nama,
        nim: mahasiswa.value.nim,
        prodi: mahasiswa.value.prodi,
        semester: mahasiswa.value.semester,
        kelas: mahasiswa.value.kelas,
        angkatan: mahasiswa.value.angkatan,
    };
    Inertia.post("/mahasiswa/update", data);
};
</script>

<template>
    <Head title="Edit" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex flex-col p-6 text-gray-900">
                        <input
                            type="text"
                            placeholder="Nama"
                            class="input w-full my-3"
                            v-model="mahasiswa.nama"
                            required
                        />
                        <input
                            type="text"
                            placeholder="NIM"
                            class="input w-full my-3"
                            v-model="mahasiswa.nim"
                            required
                        />
                        <input
                            type="text"
                            placeholder="Prodi"
                            class="input w-full my-3"
                            v-model="mahasiswa.prodi"
                            required
                        />
                        <input
                            type="text"
                            placeholder="Semester"
                            class="input w-full my-3"
                            v-model="mahasiswa.semester"
                            required
                        />
                        <input
                            type="text"
                            placeholder="Kelas"
                            class="input w-full my-3"
                            v-model="mahasiswa.kelas"
                            required
                        />
                        <input
                            type="text"
                            placeholder="Tahun Angkatan"
                            class="input w-full my-3"
                            v-model="mahasiswa.angkatan"
                            required
                        />
                        <button
                            class="btn btn-primary"
                            type="submit"
                            @click="handleSubmit()"
                        >
                            Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
