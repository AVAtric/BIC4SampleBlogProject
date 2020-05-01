<template>
    <div class="columns is-multiline">
        <div class="column is-half is-offset-one-quarter">
            <div class="box">
                <form method="POST" action="/message">
                    <input type="hidden" name="blog_id" :value="blogId">
                    <div class="field is-grouped">
                        <p class="control is-expanded">
                            <input class="input" name="body" type="text" placeholder="What do you think about this...">
                        </p>
                        <p class="control">
                            <button type="submit" class="button is-info is-outlined">
                                        <span class="icon is-small">
                                            <i class="fa fa-paper-plane"></i>
                                        </span>
                            </button>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "BlogFormComponent",
        props: {
            blogId: {
                required: true,
                type: Number
            }
        }
    }
</script>

<style scoped>

</style>
