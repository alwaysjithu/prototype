<template>
    <list></list>
</template>

<script>
    import List from '~/components/List'

    export default {
        layout: 'app',
        middleware: 'auth',
        components: {
            'list': List
        },
        head() {
            return {
                title: 'Dashboard'
            }
        }
    }
</script>
