<template>
    <div class="box">
        <div v-for="message in myMessages" class="columns is-multiline">
            <div class="column">
                <div class="card blog-card">
                    <header class="card-header">
                        <p class="card-header-title" v-text="message.blog.title" />
                    </header>
                    <div class="card-content">
                        <div class="content" v-text="message.body" />
                    </div>
                    <footer class="card-footer">
                        <a :href="'/blog/' +  message.blog.slug" class="card-footer-item">Open blog</a>
                    </footer>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "MessageListComponent",
        props:{
            myMessages: {
                type: Object,
                required: true
            }
        }
    }
</script>

<style scoped>

</style>
