<template>
    <div class="w-96 mx-auto">
        <div class="mb-4">
            <div class=" mb-3">
                <input v-model="title" class="w-96 border p-2 border-slate-300" type="text" placeholder="Добавить наименование">
            </div>
            <div class="flex mb-3 items-center">
                <textarea v-model="content" class="w-96  border p-2 border-slate-300" placeholder="Добавить описание" cols="45" rows="10"></textarea>
            </div>
            <div class="mb-4">
                <label for="file"></label>
                <input @change="initFile" id="file" type="file">
                <!-- Добавлено условие для отображения сообщения о не выбранном файле -->
                <div v-if="!image" class="text-red-600 text-sm">Файл не выбран</div>
            </div>

            <div class="form-group mb-4">
                <a @click.prevent="update" href="#" class="inline-block bg-green-600 px-3 py-2 text-white">Редактировать</a>
            </div>
        </div>
    </div>
</template>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import {router} from "@inertiajs/vue3";
import {Link} from "@inertiajs/vue3";

export default {
    name: "Edit",

    layout: MainLayout,

    components: {Link},

    props: ['post'],

    data() {
        return {
            title: this.post.title,
            content: this.post.content,
            image: this.post.image,
        }
    },

    methods: {
        update() {
            // Проверка наличия выбранного файла перед отправкой запроса
            if (!this.image) {
                console.error('Не выбран файл');
                return;
            }

            const formData = new FormData();
            formData.append('title', this.title);
            formData.append('content', this.content);
            formData.append('image', this.image);

            axios.patch(`/posts/${this.post.id}`, formData)
                .then(response => {
                    // Обработка успешного ответа
                    console.log('Response:', response);

                    // Переадресация после успешного обновления
                    router.route(response.data.url);
                })
                .catch(error => {
                    // Обработка ошибок
                    console.error('Error:', error);
                });
        }
    }
}
</script>

<style scoped>
/* Ваши стили могут быть добавлены сюда */
</style>
