<template>
<div>
    <div class="form-group mb-4">
        <Link :href="route('notes.index')" class="inline-block bg-sky-600 px-3 py-2 text-white">Назад</Link>
    </div>
    <div class="mb-4">
        <textarea v-model="title" class="rounded-full border-gray-300" type="text" placeholder="Добавить заметку"></textarea>
    </div>
    <div class="form-group mb-4">
        <a @click.prevent="store" href="#" class="inline-block bg-sky-600 px-3 py-2 text-white">Добавить</a>
    </div>
</div>
</template>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import {router} from "@inertiajs/vue3";
import {Link} from "@inertiajs/vue3";

export default {
    name: "Create",

    layout: MainLayout,

    components: {Link},

    data() {
        return {
            title: '',
        }
    },

    methods: {
        store() {
            router.post('/notes', {title: this.title})
        }
    }

}
</script>

<style scoped>

</style>
