<template>
    <div class="table-container is-fullwidth">
        <table class="table is-fullwidth is-hoverable">
            <thead>
            <tr class="title is-6">
                <table-element element-type="th">Name</table-element>
                <table-element element-type="th">Description</table-element>
                <table-element element-type="th" text-class="has-text-centered">Blogs</table-element>
                <table-element element-type="th">Created</table-element>
                <table-element element-type="th">Modified</table-element>
                <table-element element-type="th"></table-element>
            </tr>
            </thead>
            <tbody>
            <tr v-for="category in categories" :key="category.id">
                <table-element element-type="td">
                    <a :href="'/category/' + category.slug"
                       :title="category.name" v-text="category.name"/>
                </table-element>
                <table-element element-type="td">{{ category.description }}</table-element>
                <table-element element-type="td" text-class="has-text-centered">{{ category.blogs.length }}</table-element>
                <table-element element-type="td">{{ category.created_at | moment('DD.MM.YYYY') }}</table-element>
                <table-element element-type="td">{{ category.updated_at | moment('DD.MM.YYYY') }}</table-element>
                <table-element element-type="td">
                    <p class="buttons">
                        <a :href="'/category/' + category.slug + '/edit'" class="button is-info is-outlined is-small">
                            <span class="icon">
                              <i class="fa fa-edit"></i>
                            </span>
                        </a>
                        <button v-if="!category.blogs.length" @click="openDeleteModal(category)" class="button is-danger is-outlined is-small">
                            <span class="icon">
                              <i class="fa fa-remove"></i>
                            </span>
                        </button>
                    </p>
                </table-element>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "CategoryListComponent",
        props: {
            categories: {
                required: true
            }
        },
        components: {
            TableElement
        },
        methods: {
            openDeleteModal(category) {
                this.$emit('open-modal',
                    {
                        id: category.id,
                        title: category.name,
                        content: 'Do you really want to delete this category?',
                        url: '/category/' + category.slug
                    });
            }
        }
    }
</script>

<style scoped>

</style>
