<template>
    <table class="table is-striped is-fullwidth is-bordered">
        <thead>
        <tr>
            <th>Title</th>
            <th>User</th>
            <th>Messages</th>
            <th>Create date</th>
            <th>Modification date</th>
            <th>Preview</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>Title</th>
            <th>User</th>
            <th>Messages</th>
            <th>Create date</th>
            <th>Modification date</th>
            <th>Preview</th>
        </tr>
        </tfoot>
        <tbody>
        <tr v-for="blog in blogs">
            <th>{{ blog.title }}</th>
            <td>{{ blog.user.name }}</td>
            <td>{{ blog.messages.length }}</td>
            <td>{{ blog.created_at }}</td>
            <td>{{ blog.updated_at }}</td>
            <td>
                <a :href="'/blog/' + blog.slug" :title="blog.title">{{ blog.title }}</a>
            </td>
        </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        name: "BlogListComponent",
        props: ['blogList'],
        data () {
            return {
                blogs: []
            }
        },
        mounted() {
            this.blogs = this.blogList;
        }
    }
</script>

<style scoped>

</style>
