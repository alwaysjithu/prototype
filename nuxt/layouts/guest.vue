<template>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <nuxt-link class="nav-link" to="/">Home</nuxt-link>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <nuxt-link class="nav-link" to="/login">Login</nuxt-link>
                    </li>
                </ul>
            </div>
        </nav>
        <nuxt></nuxt>
    </div>
</template>

<style>
    body {
        font-family: 'Roboto', sans-serif;
    }
</style>
