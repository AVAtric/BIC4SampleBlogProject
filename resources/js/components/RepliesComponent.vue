<template>
    <div class="container">
        <hero main-title="My Replies"></hero>
        <div class="columns is-multiline">
            <div class="column is-three-fifths is-offset-one-fifth">
                <div class="box custom-box" v-if="hasReplies">
                    <message-list :messages="replies" v-on:open-modal="setModal"></message-list>
                </div>
                <error-box message="No replies found" v-if="!hasReplies"></error-box>
            </div>
        </div>
        <delete-modal :title="modalTitle" :delete-url="modalUrl" :active="modalActive" :content="modalContent"
                      :entry-id="modalId" v-on:close-modal="toggleModal"></delete-modal>
    </div>
</template>

<script>
    import MessageList from "./MessageListComponent";

    export default {
        name: "RepliesComponent",
        components: {
            MessageList,
            ErrorBox,
            DeleteModal
        },
        data() {
            return {
                replies: [],
                modalActive: false,
                modalTitle: '',
                modalContent: '',
                modalUrl: '',
                modalId: 0,
                successMessage: ''
            }
        },
        props:{
            allReplies: {
                required: true
            }
        },
        created() {
            if(this.allReplies instanceof Object)
                Object.keys(this.allReplies).forEach(item =>
                    this.replies.push(this.allReplies[item]));
            else
                this.replies = this.allReplies;
        },
        mounted() {
            this.$options.interval = setInterval(this.updateReplies, 5000);
        },
        computed: {
            hasReplies() {
                return !!this.replies.length;
            },
            showSuccessMessage() {
                return this.successMessage !== '';
            }
        },
        methods: {
            updateReplies() {
                axios.get('/list/messages')
                    .then(response => this.replies = response.data);
            },
            toggleModal(info) {
                this.modalActive = !this.modalActive;

                if(info.id !== 0) {
                    this.replies = _.remove(this.replies, rep => rep.id !== info.id);
                    this.successMessage = info.message;
                }
            },
            setModal(data) {
                this.modalId = data.id;
                this.modalTitle = data.title;
                this.modalContent = data.content;
                this.modalUrl = data.url;
                this.toggleModal({id: 0});
            }
        }
    }
</script>

<style scoped>

</style>
