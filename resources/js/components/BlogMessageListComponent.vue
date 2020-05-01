<template>
    <div>
        <div v-for="message in messages" :key="message.id" class="columns is-multiline">
            <div class="column is-half is-offset-one-quarter">
                <div class="card">
                    <div class="card-content">
                        <div class="media">
                            <div class="media-content">
                                <p class="title is-4" v-text="message.user.name"/>
                                <p class="subtitle is-6">{{ message.created_at  | moment('DD.MM.YYYY') }}</p>
                            </div>
                        </div>

                        <div class="content" v-text="message.body"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "BlogMessageListComponent",
        props:{
            blogMessages: {
                required: true
            },
            blogSlug: {
                required: true
            },
            newMessage: {
                type: Object
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
            this.$options.interval = setInterval(this.updateMessages, 10000);
        },
        methods: {
            updateMessages() {
                axios.get('/list/messages/' + this.blogSlug)
                    .then(response => {
                        this.$emit('sync-messages', response.data);
                        this.messages = response.data.reverse();
                    });
            }
        },
        watch: {
            newMessage(newVal, oldVal) {
                console.log(this.messages);
                console.log(newVal);
                console.log(oldVal);
                if(!this.messages.length)
                    this.messages.push(newVal);

                if(this.messages.filter( message => message.id !== newVal.id) && newVal !== oldVal)
                    this.messages.unshift(newVal);
            }
        }
    }
</script>

<style scoped>

</style>
