<template>
    <div class="table-container is-fullwidth">
        <table class="table is-fullwidth is-hoverable">
            <thead>
            <tr class="title is-6">
                <table-element element-type="th">Title</table-element>
                <table-element element-type="th">User</table-element>
                <table-element element-type="th" text-class="has-text-centered">Replies</table-element>
                <table-element element-type="th">Created</table-element>
                <table-element element-type="th">Modified</table-element>
                <table-element element-type="th"></table-element>
            </tr>
            </thead>
            <tbody>
            <tr v-for="blog in blogs" :key="blog.id">
                <table-element element-type="td">
                    <a :href="'/blog/' + blog.slug"
                       :title="blog.title">
                        <i class="fa fa-comment"></i>&nbsp;{{ blog.title }}
                    </a>
                </table-element>
                <table-element element-type="td">{{ blog.user.name }}</table-element>
                <table-element element-type="td" text-class="has-text-centered">{{ blog.messages.length }}
                </table-element>
                <table-element element-type="td">{{ blog.created_at | moment('DD.MM.YYYY') }}</table-element>
                <table-element element-type="td">{{ blog.updated_at | moment('DD.MM.YYYY') }}</table-element>
                <table-element element-type="td">
                    <p class="buttons" v-if="user.id === blog.user.id">
                        <a :href="'/blog/' + blog.slug + '/edit'" class="button is-info is-outlined is-small">
                            <span class="icon">
                              <i class="fa fa-edit"></i>
                            </span>
                        </a>
                        <a :href="'/blog/' + blog.slug + '/destroy'" class="button is-danger is-outlined is-small">
                            <span class="icon">
                              <i class="fa fa-remove"></i>
                            </span>
                        </a>
                    </p>
                </table-element>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "BlogListComponent",
        props: {
            blogList: {
                required: true
            },
            user: {
                required: true
            }
        },
        components: {
            TableElement
        },
        data() {
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
