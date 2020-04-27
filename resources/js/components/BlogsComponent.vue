<template>
    <div class="container">
        <hero main-title="Blogs"></hero>
        <div class="columns is-multiline">
            <div class="column is-three-fifths is-offset-one-fifth">
                <div class="box custom-box" v-if="hasBlogs">
                    <blog-list :blog-list="blogs"></blog-list>
                </div>
                <error-box message="No blogs found" v-if="!hasBlogs"></error-box>
            </div>
        </div>
    </div>
</template>

<script>
    import BlogList from './BlogListComponent';
    import ErrorBox from "./base/ErrorBoxComponent";

    export default {
        components:{
            BlogList,
            ErrorBox
        },
        name: "BlogsComponent",
        data() {
            return {
                'blogs': []
            }
        },
        props: {
            allBlogs: {
                type: Array,
                required: true
            }
        },
        created() {
            this.blogs = this.allBlogs;
        },
        computed: {
            hasBlogs() {
                return !!this.blogs.length;
            }
        }

    }
</script>

<style scoped>

</style>
