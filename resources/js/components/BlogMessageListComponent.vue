<template>
    <div>
        <div v-for="message in blogMessages" class="columns is-multiline">
            <div class="column is-half is-offset-one-quarter">
                <div class="card">
                    <div class="card-content">
                        <div class="media">
                            <div class="media-content">
                                <p class="title is-4" v-text="message.user.name"/>
                                <p class="subtitle is-6" v-text="message.created_at"/>
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
                type: Object,
                required: true
            }
        }
    }
</script>

<style scoped>

</style>
