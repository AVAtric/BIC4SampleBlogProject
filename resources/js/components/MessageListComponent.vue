<template>
    <div class="box">
        <div v-for="message in messages" class="columns is-multiline">
            <div class="column">
                <div class="card blog-card">
                    <header class="card-header">
                        <p class="card-header-title" v-text="message.blog.title" />
                    </header>
                    <div class="card-content">
                        <div class="content" v-text="message.body" />
                    </div>
                    <footer class="card-footer">
                        <a :href="'/blog/' +  message.blog.slug" class="card-footer-item">
                            <span class="icon">
                                <i class="fa fa-comment"></i>
                            </span>
                        </a>
                        <a :href="'/message/' + message.slug + '/edit'" class="card-footer-item">
                            <span class="icon">
                              <i class="fa fa-edit"></i>
                            </span>
                        </a>
                        <a @click="openDeleteModal(message)"
                                class="card-footer-item">
                            <span class="icon">
                              <i class="fa fa-remove"></i>
                            </span>
                        </a>
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
            messages: {
                type: Array,
                required: true
            }
        },
        methods: {
            openDeleteModal(message) {
                this.$emit('open-modal',
                    {
                        id: message.id,
                        title: 'Delete confirmation',
                        content: 'Do you really want to delete this message?',
                        url: '/message/' + message.slug
                    });
            }
        }
    }
</script>

<style scoped>

</style>
