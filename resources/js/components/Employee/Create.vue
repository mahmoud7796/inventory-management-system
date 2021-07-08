<template>
    <div class="create" >
        <div class="row" style="padding: 8px">
            <router-link to="/all-employee" class="btn btn-primary">All Employee</router-link>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Add Employee</h1>
                                    </div>
                                    <form @submit.prevent="register" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <input v-model="form.name" type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Your Full Name">
                                                    <small class="text-danger" v-if="errors.name">{{errors.name[0]}}</small>
                                                </div>

                                                <div class="col-md-6">
                                                    <input v-model="form.email" type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Your E-mail">
                                                    <small class="text-danger" v-if="errors.email">{{errors.email[0]}}</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <input v-model="form.address" type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Your Address">
                                                    <small class="text-danger" v-if="errors.address">{{errors.address[0]}}</small>
                                                </div>

                                                <div class="col-md-6">
                                                    <input v-model="form.salary" type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Your Salary">
                                                    <small class="text-danger" v-if="errors.salary">{{errors.salary[0]}}</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <input v-model="form.date" type="date" class="form-control" id="exampleInputFirstName">
                                                    <small class="text-danger" v-if="errors.date">{{errors.date[0]}}</small>
                                                </div>

                                                <div class="col-md-6">
                                                    <input v-model="form.nid" type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Your Nid">
                                                    <small class="text-danger" v-if="errors.nid">{{errors.nid[0]}}</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <input v-model="form.phone" type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Your Phone">
                                                    <small class="text-danger" v-if="errors.phone">{{errors.phone[0]}}</small>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <input type="file" class="custom-file-input" id="customFile">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                    <small class="text-danger" v-if="errors.email">{{errors.email[0]}}</small>
                                                </div>

                                                <div class="col-md-6">
                                                    <img src="form.photo" style="height: 40px; width: 40px;">
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
                email:null,
                password:null,
                password_confirmation:null
            },
            errors:{

            },
        }
    },
    methods:{
        register(){
            axios.post('api/auth/register',this.form)
                .then(res => {   User.responseAfterLogin(res)
                    Toast.fire({
                        icon: 'success',
                        title: 'Signed in successfully'
                    })
                    this.$router.push({name:'/home'})
                })
                .catch(error => this.errors = error.response.data.errors)
        }
    }

}
</script>

<style scoped>

</style>
