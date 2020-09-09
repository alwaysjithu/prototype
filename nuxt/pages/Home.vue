<template>
    <list></list>
</template>

<script>
    import List from '~/components/List'

    export default {
        layout: 'user',
        middleware: 'auth',
        components: {
            'list': List
        }
    }
</script>
