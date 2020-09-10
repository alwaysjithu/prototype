<template>
    <div class="row justify-content-center">
        <div class="col-6">
            <div v-if="error" class="alert alert-danger" role="alert">{{error}}</div>
            <div class="card">
                <div class="card-header">User Login</div>
                <div class="card-body">
                    <form @submit.prevent="userLogin">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" v-model="login.email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" v-model="login.password">
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
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
                login: {
                    email: 'admin@gmail.com',
                    password: 'admin@123',
                },
                error: null
            }
        },
        methods: {
            userLogin() {
                this.error = null
                this.$axios.$post('login', this.login)
                    .then(response => {
                        this.$store.dispatch('setToken', response.data.access_token)
                        this.$router.push('/home')
                    })
                    .catch(error => {
                        this.error = error.response.data.message
                    });
            }
        }
    }
</script>
