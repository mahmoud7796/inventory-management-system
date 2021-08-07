<template>
    <div class="create" >
        <div class="row" style="padding: 8px">
            <router-link to="/all-supplier" class="btn btn-primary">All Categories</router-link>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Add Category</h1>
                                    </div>
                                    <form @submit.prevent="catInsert">
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <input v-model="form.name" type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Category Name">
                                                    <small class="text-danger" v-if="errors.name">{{errors.name[0]}}</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block">Save</button>
                                        </div>
                                        <hr>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</template>

<script>
export default {
    created(){
        if(!User.loggedIn()){
            this.$router.push({name: '/'})
        }
    },
    data(){
        return {
            form:{
                name:null,
            },
            errors:{

            },
        }
    },
    methods:{
        catInsert(){
            axios.post('api/cat-store',this.form)
            .then(() =>{
                this.$router.push({name: '/all-category'})
                Notification.success()
            })
            .catch(error => this.errors = error.response.data.errors)

        },
    }

}
</script>

<style scoped>

</style>
