<template>
    <div class="container">
        <hero :main-title="category.name" :sub-title="category.description" />
        <div class="columns is-multiline">
            <div class="column is-three-fifths is-offset-one-fifth">
                <div class="box custom-box" v-if="hasBlogs">
                    <blog-list :blog-list="this.categoryBlogs" :user="user" :show-category="false" v-on:open-modal="setModal"></blog-list>
                </div>
                <error-box message="No blogs found" v-if="!hasBlogs"></error-box>
            </div>
        </div>
        <delete-modal :title="modalTitle" :delete-url="modalUrl" :active="modalActive" :content="modalContent"
                      :entry-id="modalId" v-on:close-modal="toggleModal"></delete-modal>
    </div>
</template>

<script>
    import BlogList from './BlogListComponent';

    export default {
        name: "CategoryComponent",
        components: {
            ErrorBox,
            BlogList,
            DeleteModal
        },
        data() {
            return {
                modalActive: false,
                modalTitle: '',
                modalContent: '',
                modalUrl: '',
                modalId: 0,
                successMessage: '',
                categoryBlogs: []
            }
        },
        methods: {
            toggleModal(info) {
                this.modalActive = !this.modalActive;

                if(info.id !== 0) {
                    this.categoryBlogs = _.remove(this.categoryBlogs, blg => blg.id !== info.id);
                    this.successMessage = info.message;
                }
            },
            setModal(data) {
                this.modalId = data.id;
                this.modalTitle = data.title;
                this.modalContent = data.content;
                this.modalUrl = data.url;
                this.toggleModal({id: 0});
            }
        },
        props: {
            category: {
                required: true
            },
            user: {
                required: true
            },
            blogs: {
                required: true
            }
        },
        created() {
            this.categoryBlogs = this.blogs;
        },
        computed: {
            hasBlogs() {
                return !!this.categoryBlogs.length;
            },
            showSuccessMessage() {
                return this.successMessage !== '';
            }
        }
    }
</script>

<style scoped>

</style>
