<template>
    <user-form></user-form>
</template>

<script>
    import UserForm from '~/components/UserForm'

    export default {
        layout: 'guest',
        components: {
            'userForm': UserForm
        },head() {
            return {
                title: 'Form Data'
            }
        }
    }
</script>
