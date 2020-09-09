<template>
    <user-login></user-login>
</template>

<script>
    import UserLogin from '~/components/UserLogin'

    export default {
        layout: 'guest',
        components: {
            'userLogin': UserLogin
        }
    }
</script>
