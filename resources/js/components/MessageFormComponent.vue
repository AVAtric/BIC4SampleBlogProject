<template>
    <div class="container">
        <div class="columns is-multiline">
            <div class="card blog-card column is-half is-offset-one-quarter">
                <header class="card-header">
                    <h1 class="card-header-title is-centered" v-text="'Blog: ' + blogTitle"/>
                </header>
                <div class="card-content">
                    <div class="content">
                        <query-message :success="form.isSuccess()" :fail="form.isFail()"
                                       :message="form.failMessage || form.successMessage"></query-message>
                        <form @submit.prevent="submit">
                            <div class="field">
                                <label class="label" for="body">Your message</label>
                                <div class="control">
                                    <textarea id="body" v-model="form.body" class="textarea"></textarea>
                                </div>
                                <p class="help is-danger" v-if="form.errors.has('body')"
                                   v-text="form.errors.get('body')"/>
                            </div>

                            <button type="submit" class="button is-large is-primary is-outlined is-fullwidth">
                                Update
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    let form = new Form({
        'message_id': '',
        'body': '',
        'user_id': '',
        'blog_id': ''
    });

    export default {
        name: "MessageFormComponent",
        components: {
            QueryMessage
        },
        props: {
            currentMessage: {
                required: false,
                type: Object
            },
            blogTitle: {
                required: true,
                type: String
            }
        },
        data() {
            return {
                edit: undefined,
                form: form,
                url: ''
            }
        },
        methods: {
            submit() {
                this.form
                    .put('/message/' + this.currentMessage.slug);
            }
        },
        created() {
                this.form.message_id = this.currentMessage.id;
                this.form.body = this.currentMessage.body;
                this.form.user_id = this.currentMessage.user_id;
                this.form.blog_id = this.currentMessage.blog_id;

                this.form.noReset = ['message_id', 'body', 'blog_id', 'user_id'];
        }
    }
</script>

<style scoped>

</style>
