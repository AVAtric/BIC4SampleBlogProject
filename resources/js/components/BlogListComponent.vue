<template>
    <div class="table-container is-fullwidth">
        <table class="table is-fullwidth is-hoverable">
            <thead>
            <tr class="title is-6">
                <table-element element-type="th">Title</table-element>
                <table-element element-type="th">User</table-element>
                <table-element element-type="th" text-class="has-text-centered">Messages</table-element>
                <table-element element-type="th">Create date</table-element>
                <table-element element-type="th">Modification date</table-element>
            </tr>
            </thead>
            <tbody>
            <tr v-for="blog in blogs" :key="blog.id">
                <table-element element-type="td">
                    <a :href="'/blog/' + blog.slug"
                       :title="blog.title">
                        {{ blog.title }}&nbsp;<i class="fa fa-link"></i>
                    </a>
                </table-element>
                <table-element element-type="td">{{ blog.user.name }}</table-element>
                <table-element element-type="td" text-class="has-text-centered">{{ blog.messages.length }}</table-element>
                <table-element element-type="td">{{ blog.created_at | moment('DD.MM.YYYY') }}</table-element>
                <table-element element-type="td">{{ blog.updated_at | moment('DD.MM.YYYY') }}</table-element>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "BlogListComponent",
        props: ['blogList'],
        components: {
            TableElement
        },
        data() {
            return {
                blogs: [],
                currentDateTime: ''
            }
        },
        created() {
            this.updateDateTime();
        },
        mounted() {
            this.blogs = this.blogList;
            this.$options.interval = setInterval(this.updateDateTime, 1000);
        },
        beforeDestroy() {
            clearInterval(this.$options.interval);
        },
        methods: {
            updateDateTime() {
                this.currentDateTime = this.$moment().format('DD.MM.YYYY hh:mm:ss');
            }
        },
        computed: {
            updated() {
                return this.currentDateTime;
            }
        }
    }
</script>

<style scoped>

</style>
