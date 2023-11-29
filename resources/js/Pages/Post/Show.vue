<template>
    <div class="w-96 mx-auto">
        <div class="form-group mb-4">
            <Link :href="route('posts.index')" class="inline-block bg-sky-600 px-3 py-2 text-white">Назад</Link>
        </div>
        <div class="pb-4">{{post.id}}</div>
        <div class="pb-4">{{post.title}}</div>
        <div class="pb-4">{{post.content}}</div>
        <div class="pb-4"><img :src="post.image" alt="preview"></div>
            <div class="form-group mb-4">
                <Link :href="route('posts.edit', post.id)" class="inline-block bg-green-600 px-3 py-2 text-white">Редактировать</Link>
            </div>
        <div class="form-group mb-4">
            <Link as="button" method="delete" :href="route('posts.destroy', post.id)" class="inline-block bg-rose-600 px-3 py-2 text-white">Удалить</Link>
        </div>
            <hr class="mt-4">
        </div>
</template>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import {Link} from "@inertiajs/vue3";

export default {
    name: "Show",

    props:['post'],

    components: {Link},

    layout: MainLayout
}
</script>

<style scoped>

</style>
