<template>
    <div class="container">
        <hero main-title="Categories"></hero>
        <div class="columns is-multiline">
            <div class="column is-three-fifths is-offset-one-fifth">
                <success-box :message="successMessage" v-if="showSuccessMessage"></success-box>
                <div class="box custom-box" v-if="hasCategories">
                    <category-list :categories="categories" v-on:open-modal="setModal"></category-list>
                </div>
                <error-box message="No categories found" v-if="!hasCategories"></error-box>
            </div>
        </div>
        <delete-modal :title="modalTitle" :delete-url="modalUrl" :active="modalActive" :content="modalContent"
                      :entry-id="modalId" v-on:close-modal="toggleModal"></delete-modal>
    </div>
</template>

<script>
    import CategoryList from './CategoryListComponent';

    export default {
        components:{
            CategoryList,
            ErrorBox,
            SuccessBox,
            DeleteModal
        },
        name: "CategoriesComponent",
        data() {
            return {
                categories: [],
                modalActive: false,
                modalTitle: '',
                modalContent: '',
                modalUrl: '',
                modalId: 0,
                successMessage: ''
            }
        },
        props: {
            allCategories: {
                type: Array,
                required: true
            }
        },
        methods: {
            toggleModal(info) {
                this.modalActive = !this.modalActive;

                if(info.id !== 0) {
                    this.categories = _.remove(this.categories, cat => cat.id !== info.id);
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
        created() {
            this.categories = this.allCategories;
        },
        computed: {
            hasCategories() {
                return !!this.categories.length;
            },
            showSuccessMessage() {
                return this.successMessage !== '';
            }
        }

    }
</script>

<style scoped>

</style>
