<template>
    <div class="flex justify-between p-8 w-96 mx-auto">
        <div class="form-group mb-4">
            <Link :href="route('notes.index')" class="inline-block bg-sky-600 px-3 py-2 text-white">Заметки</Link>
        </div>
        <div class="form-group mb-4">
            <Link :href="route('posts.index')" class="inline-block bg-green-600 px-3 py-2 text-white">Посты</Link>
        </div>
        <div class="form-group mb-4">
            <Link :href="route('videos.index')" class="inline-block bg-purple-600 px-3 py-2 text-white">Видео</Link>
        </div>
        <div class="form-group mb-4">
            <Link as="button" method="post" :href="route('logout')" class="inline-block bg-rose-600 px-3 py-2 text-white">Выйти</Link>
        </div>
    </div>
    <hr class="mb-4">
    <slot />

</template>

<script>
import {Link} from "@inertiajs/vue3";

export default {
    name: "MainLayout",

    components: {Link},
}
</script>

<style scoped>

</style>
