<template>
    <div class="container">
        <blog-detail :blog="blog"></blog-detail>
        <blog-message-form :blog-id="blog.id" @new-message="sendNewMessage"></blog-message-form>
        <blog-message-list v-if="hasMessages" :blog-messages="messages" :blog-slug="blog.slug" :new-message="newMessage" @sync-messages="syncMessages"></blog-message-list>
        <div v-if="!hasMessages" class="columns is-multiline">
            <div class="column is-half is-offset-one-quarter">
                <error-box message="No messages found" v-if="!hasMessages"></error-box>
            </div>
        </div>
    </div>
</template>

<script>
    import ErrorBox from "./base/ErrorBoxComponent";
    import BlogDetail from "./BlogDetailComponent";
    import BlogMessageForm from "./BlogMessageFormComponent";

    export default {
        name: "BlogComponent",
        components: {
            ErrorBox,
            BlogDetail,
            BlogMessageForm
        },
        props: {
            currentBlog: {
                required: true
            },
            currentMessages: {
                required: true
            },
        },
        data () {
          return {
              blog: [],
              messages: [],
              newMessage: {}
          }
        },
        methods: {
            sendNewMessage(message) {
                this.newMessage = message;

                if(!this.messages.length)
                    this.messages.push(message);
            },
            syncMessages(allMessages) {
                if(this.messages !== allMessages)
                    this.messages = allMessages.reverse();
            }
        },
        created() {
            this.blog = this.currentBlog;

            if(this.currentMessages instanceof Object)
                Object.keys(this.currentMessages).forEach((item) => {
                    this.messages.push(this.currentMessages[item]);
                });
            else
                this.messages = this.currentMessages;
        },
        computed: {
            hasMessages() {
                return !!this.messages.length;
            }
        }
    }
</script>

<style scoped>

</style>
