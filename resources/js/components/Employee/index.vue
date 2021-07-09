<template>
    <div class="create" >
        <div class="row" style="padding: 8px">
            <router-link to="/create-employee" class="btn btn-primary">Add Employee</router-link>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">All Employee</h1>
                                    </div>
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
