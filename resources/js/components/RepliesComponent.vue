<template>
    <div class="container">
        <hero main-title="My Replies"></hero>
        <div class="columns is-multiline">
            <div class="column is-three-fifths is-offset-one-fifth">
                <div class="box custom-box" v-if="hasReplies">
                    <message-list :my-messages="replies"></message-list>
                </div>
                <error-box message="No replies found" v-if="!hasReplies"></error-box>
            </div>
        </div>
    </div>
</template>

<script>
    import MessageList from "./MessageListComponent";
    import ErrorBox from "./base/ErrorBoxComponent";

    export default {
        name: "RepliesComponent",
        components: {
            MessageList,
            ErrorBox
        },
        data: function() {
            return {
                replies: []
            }
        },
        props:{
            allReplies: {
                required: true
            }
        },
        created() {
            if(this.allReplies instanceof Object)
                Object.keys(this.allReplies).forEach((item) => {
                    this.replies.push(this.allReplies[item]);
                });
            else
                this.replies = this.allReplies;
        },
        mounted() {
            this.$options.interval = setInterval(this.updateReplies, 10000);
        },
        computed: {
            hasReplies() {
                return !!this.replies.length;
            }
        },
        methods: {
            updateReplies() {
                axios.get('/list/messages')
                .then(response => {
                    this.replies = response.data;
                });
            }
        }
    }
</script>

<style scoped>

</style>
