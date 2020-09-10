<template>
    <div class="row justify-content-center">
        <div class="col-8">
            <div v-if="error" class="alert alert-danger" role="alert">{{error}}</div>
            <pre v-if="result">{{result}}</pre>
            <div class="card">
                <div class="card-header">User Form Data</div>
                <div class="card-body">
                    <form @submit.prevent="userData">
                        <div class="form-group row">
                            <label for="listId" class="col-sm-3 col-form-label">List Id</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="listId" v-model="formData.listId">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="webFormId" class="col-sm-3 col-form-label">Web Form Id</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="webFormId" v-model="formData.webFormId">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="email" v-model="formData.email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" v-model="formData.name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="format" class="col-sm-3 col-form-label">Format</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="format" v-model="formData.format">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lead" class="col-sm-3 col-form-label">Lead</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="lead" v-model="formData.lead">
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
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
                formData: {
                    listId: 1,
                    webFormId: 1,
                    email: 'testFromApp6@mailinator.com',
                    name: 'Test From App With Custom Fields',
                    format: 'text',
                    lead: 'no'
                },
                error: null,
                result: null
            }
        },
        methods: {
            userData() {
                this.error = null
                this.result = null
                this.$axios.$post('postData', this.formData)
                    .then(response => {
                        this.result = response.data
                    })
                    .catch(error => {
                        this.error = error.response.data.message
                    });
            }
        }
    }
</script>
