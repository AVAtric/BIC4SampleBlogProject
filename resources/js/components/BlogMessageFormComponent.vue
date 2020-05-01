<template>
    <div class="columns is-multiline">
        <div class="column is-half is-offset-one-quarter">
            <div class="box">
                <query-message :success="false" :fail="form.isFail()"
                               :message="form.failMessage"></query-message>
                <form @submit.prevent="submit">
                    <div class="field is-grouped">
                        <p class="control is-expanded">
                            <input class="input" v-model="form.body" type="text" placeholder="What do you think about this...">
                        </p>
                        <p class="control">
                            <button type="submit" class="button is-info is-outlined">
                                        <span class="icon is-small">
                                            <i class="fa fa-paper-plane"></i>
                                        </span>
                            </button>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    let form = new Form({
        'blog_id': '',
        'body': '',
        'noReset': ['blog_id']
    });

    export default {
        name: "BlogFormComponent",
        components: {
            QueryMessage
        },
        props: {
            blogId: {
                required: true,
                type: Number
            }
        },
        data() {
            return {
                form: form
            }
        },
        created() {
            this.form.blog_id = this.blogId;
        },
        methods: {
            submit() {
                this.form
                    .post('/message')
                    .then(response => {
                        console.log(response);
                    });
            }
        }
    }
</script>

<style scoped>

</style>
