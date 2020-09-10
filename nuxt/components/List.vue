<template>
    <div class="row">
        <div class="col">
            <div v-if="error" class="alert alert-danger my-2" role="alert">{{error}}</div>
        </div>
        <div class="col-auto">
            <button type="button" class="btn btn-danger my-2" @click="logout">Logout</button>
        </div>
        <div class="col-12">
            <table class="table table-bordered mb-2">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="row in list">
                    <td>{{row.name}}</td>
                    <td>{{row.email}}</td>
                    <td>{{row.mobile}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                list: null,
                error: null
            }
        },
        mounted() {
            this.getData();
        },
        methods: {
            getData() {
                this.$axios.$get('users').then(response => {
                    this.list = response.data;
                }).catch(error => {
                    this.error = error.response.data.message
                });
            },
            logout() {
                this.$axios.$post('logout').then(response => {
                    this.$store.dispatch('logout');
                    this.$router.push('/login');
                }).catch(error => {
                    this.error = error.response.data.message
                });
            }
        }
    }
</script>
