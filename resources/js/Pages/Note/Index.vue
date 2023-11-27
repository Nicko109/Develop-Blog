<template>
<div>
    <div class="form-group mb-4">
        <Link :href="route('notes.create')" class="inline-block bg-sky-600 px-3 py-2 text-white">Добавить</Link>
    </div>
    <div class="mb-4" v-for="note in notes">
        <div>{{note.id}}</div>
        <div class="pb-4">{{note.title}}</div>
        <div class="form-group mb-4">
            <Link :href="route('notes.show', note.id)" class="inline-block bg-purple-600 px-3 py-2 text-white">Посмотреть</Link>
        </div>
        <div class="form-group mb-4">
            <Link :href="route('notes.edit', note.id)" class="inline-block bg-green-600 px-3 py-2 text-white">Редактировать</Link>
        </div>
        <div class="form-group mb-4">
            <Link method="delete" :href="route('notes.destroy', note.id)" class="inline-block bg-rose-600 px-3 py-2 text-white">Удалить</Link>
        </div>
        <hr class="mt-4">
    </div>
</div>
</template>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import {Link} from "@inertiajs/vue3";

export default {
    name: "Index",

    props:['notes'],

    components: {Link},

    layout: MainLayout
}
</script>

<style scoped>

</style>
