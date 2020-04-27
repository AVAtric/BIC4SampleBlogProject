<template>
    <div class="columns is-multiline">
        <div class="column hero is-bold is-info is-three-fifths is-offset-one-fifth is-small blog-hero">
            <div class="hero-body has-text-centered">
                <div class="container">
                    <h1 class="title" v-text="mainTitle" />
                    <h1 class="subtitle" v-text="subTitle" v-if="subTitle.length" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "HeroComponent",
        props: {
            mainTitle: {
                type: String,
                required: true
            },
            subTitle: {
                type: String,
                default: '',
                required: false
            },
        }
    }
</script>

<style scoped>

</style>
