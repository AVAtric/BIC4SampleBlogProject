<template>
    <div class="alert" role="alert"
         v-bind:class="{'alert-success': success, 'alert-danger': fail}"
         v-if="show()">
        {{message}}
    </div>
</template>

<script>
    export default {
        name: "QueryMessage",

        props: {
            success:{
                type: Boolean,
                required: true
            },
            fail: {
                type: Boolean,
                required: true
            },
            message: {
                required: true
            }
        },

        methods: {
            show() {
                return (this.success || this.fail);
            }
        }
    }
</script>