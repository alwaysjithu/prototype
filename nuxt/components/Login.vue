<template>
    <div class="row justify-content-center">
        <div class="col-6">
            <div v-if="error" class="alert alert-danger my-3" role="alert">{{error}}</div>
            <div class="card mt-3">
                <div class="card-body">
                    <form @submit.prevent="login">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" v-model="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" v-model="password">
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                email: '',
                password: '',
                error: null
            }
        },
        methods: {
            login() {
                this.error = null
                this.$axios.$post('login', {
                    email: this.email,
                    password: this.password
                }).then(response => {
                    this.$store.dispatch('setToken', response.data.access_token)
                    this.$router.push('/home')
                }).catch(error => {
                    this.error = error.response.data.message
                });
            }
        }
    }
</script>
