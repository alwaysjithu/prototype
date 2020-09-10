require('dotenv').config()

module.exports = {
    mode: 'universal',
    env: {
        baseUrl: process.env.API_URL
    },
    router: {
        linkExactActiveClass: 'active'
    },
    modules: [
        'bootstrap-vue/nuxt',
        '@nuxtjs/axios',
        ['@nuxtjs/dotenv', {systemvars: true}],
    ],
    head: {
        title: process.env.APP_NAME,
        meta: [
            {charset: 'utf-8'},
            {name: 'viewport', content: 'width=device-width, initial-scale=1'},
            {rel: 'favicon', href: 'favicon.ico'},
        ],
        link: [
            {rel: 'stylesheet', href: 'https://fonts.googleapis.com/css2?family=Roboto&display=swap'}
        ],
        script: [
            {src: 'https://code.jquery.com/jquery-3.2.1.slim.min.js'},
            {src: 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js'},
            {src: 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'}
        ]
    }
}
