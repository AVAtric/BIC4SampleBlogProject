<template>
    <div class="columns is-multiline">
        <div class="column is-half is-offset-one-quarter">
            <article class="panel">
                <div class="panel-heading">
                    <div class="level">
                        <div class="level-left">
                            <p class="level-item has-text-centered" v-text="this.blog.title"/>
                        </div>
                        <div class="level-right">
                            <p class="level-item has-text-centered">
                                <small><strong class="custom-strong">{{ this.blog.user.name }}</strong> posted on&nbsp;{{ this.blog.created_at | moment('DD.MM.YYYY') }}</small>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="panel-block markdown-body" v-html="this.markdownBody"/>
            </article>
        </div>
    </div>
</template>

<script>
    import marked from 'marked';
    import DOMPurify from 'dompurify';

    export default {
        name: "BlogDetailComponent",
        props: {
            blog: {
                required: true
            }
        },
        computed: {
            markdownBody() {
                return marked(this.blog.body, {
                    breaks: true,
                    gfm: true,
                    headerIds: false,
                    sanitizer: DOMPurify.sanitize
                });
            }
        }
    }
</script>

<style scoped>
    .custom-strong {
        color: #fff;
    }
</style>
