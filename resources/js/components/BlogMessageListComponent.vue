<template>
    <div>
        <div v-for="message in messages" :key="message.id" class="columns is-multiline">
            <div class="column is-half is-offset-one-quarter">
                <div class="card">
                    <div class="card-content">
                        <div class="media">
                            <div class="media-content">
                                <div class="level">
                                    <div class="level-left">
                                        <div class="level-item">
                                            <div>
                                                <p class="heading">
                                                    <time :datetime="message.created_at">
                                                        {{ message.created_at | moment('HH:mm - DD.MM.YYYY') }}
                                                    </time>
                                                </p>
                                                <p class="title">{{ message.user.name }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="level-right">
                                        <div class="level-item">
                                            <a v-if="currentUser.id === message.user.id" class="buttons">
                                                <a :href="'/message/' + message.slug + '/edit'"
                                                   class="button is-info is-outlined is-small">
                                                    <span class="icon">
                                                      <i class="fa fa-edit"></i>
                                                    </span>
                                                </a>
                                                <button @click="openDeleteModal(message)"
                                                        class="button is-danger is-outlined is-small">
                                                    <span class="icon">
                                                      <i class="fa fa-remove"></i>
                                                    </span>
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="content">
                            <p v-text="message.body"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "BlogMessageListComponent",
        props: {
            blogMessages: {
                required: true
            },
            blogSlug: {
                required: true
            },
            newMessage: {
                type: Object
            },
            currentUser: {
                required: true
            }
        },
        data() {
            return {
                messages: []
            }
        },
        created() {
            this.messages = this.blogMessages.reverse();
        },
        mounted() {
            this.$options.interval = setInterval(this.updateMessages, 2500);
        },
        methods: {
            updateMessages() {
                axios.get('/list/messages/' + this.blogSlug)
                    .then(response => {
                        this.messages = response.data.reverse();

                        if (this.blogMessages !== this.messages.reverse())
                            this.$emit('sync-messages', response.data);
                    });
            },
            openDeleteModal(message) {
                this.$emit('open-modal',
                    {
                        id: message.id,
                        title: 'Delete confirmation',
                        content: 'Do you really want to delete this message?',
                        url: '/message/' + message.slug
                    });
            }
        },
        watch: {
            newMessage(newVal, oldVal) {
                if (!this.messages.length)
                    this.messages.push(newVal);

                if (this.messages.filter(message => message.id !== newVal.id) && newVal !== oldVal)
                    this.messages.unshift(newVal);

                newVal = {};
            },
            blogMessages(newVal) {
                this.messages = newVal;
            }
        }
    }
</script>

<style scoped>

</style>
