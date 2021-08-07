<template>
    <div class="create" >
        <div class="row" style="padding: 8px">
            <router-link to="/all-supplier" class="btn btn-primary">All Supplier</router-link>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Add Supplier</h1>
                                    </div>
                                    <form @submit.prevent="supInsert" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <input v-model="form.shop_name" type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Your Full Name">
                                                    <small class="text-danger" v-if="errors.shop_name">{{errors.shop_name[0]}}</small>
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
                                                    <input type="file" class="custom-file-input" id="customFile" @change="image">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                    <small class="text-danger" v-if="errors.photo">{{errors.photo[0]}}</small>
                                                </div>

                                                <div class="col-md-6">
                                                    <img :src="form.photo" style="height: 40px; width: 40px;">
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
                shop_name:null,
                email:null,
                address:null,
                phone:null,
                photo:null,
            },
            errors:{

            },
        }
    },
    methods:{
        image(event){
            let file = event.target.files[0];
            if(file.size > 1048770 ){
                Notification.image_validation()
            }else{
                let reader = new FileReader();
                reader.onload = event =>{
                    this.form.photo = event.target.result;
                     console.log(event.target.result);
                };
                reader.readAsDataURL(file);
            }
            },
        supInsert(){
            axios.post('api/sup-store',this.form)
            .then(() =>{
                this.$router.push({name: '/all-supplier'})
                Notification.success()
            })
            .catch(error => this.errors = error.response.data.errors)

        },
    }

}
</script>

<style scoped>

</style>
