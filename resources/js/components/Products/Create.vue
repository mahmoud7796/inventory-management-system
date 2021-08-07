<template>
    <div class="create" >
        <div class="row" style="padding: 8px">
            <router-link to="/all-Product" class="btn btn-primary">All Products</router-link>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Add Product</h1>
                                    </div>
                                    <form @submit.prevent="proInsert" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <label>Product Name</label>
                                                    <input v-model="form.name" type="text" class="form-control" placeholder="Enter Product Name">
                                                    <small class="text-danger" v-if="errors.name">{{errors.name[0]}}</small>
                                                </div>

                                                <div class="col-md-6">
                                                    <label>Product Code</label>
                                                    <input v-model="form.code" type="text" class="form-control" placeholder="Enter Product Code">
                                                    <small class="text-danger" v-if="errors.code">{{errors.code[0]}}</small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <label>Product Category</label>
                                                    <select v-model="form.category_id" class="form-control">
                                                        <option  v-for="category in categories" :value="category.id">{{category.name}}</option>
                                                    </select>
                                                    <small class="text-danger" v-if="errors.category_id">{{errors.category_id[0]}}</small>
                                                </div>

                                                <div class="col-md-6">
                                                    <label>Product Supplier</label>
                                                    <select v-model="form.supplier_id" class="form-control" >
                                                        <option v-for="supplier in suppliers" :value="supplier.id">{{supplier.shop_name}}</option>
                                                    </select>
                                                    <small class="text-danger" v-if="errors.supplier_id">{{errors.supplier_id[0]}}</small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-4">
                                                    <label>Product Root</label>
                                                    <input v-model="form.root" type="text" class="form-control" placeholder="Enter Product Root">
                                                    <small class="text-danger" v-if="errors.root">{{errors.root[0]}}</small>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Buying Price</label>
                                                    <input v-model="form.buy" type="text" class="form-control" placeholder="Enter Buying Price">
                                                    <small class="text-danger" v-if="errors.buy">{{errors.buy[0]}}</small>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>selling Price</label>
                                                    <input v-model="form.sell" type="text" class="form-control" placeholder="Enter selling Price">
                                                    <small class="text-danger" v-if="errors.sell">{{errors.sell[0]}}</small>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <label>Buy Date</label>
                                                    <input v-model="form.buy_date" type="date" class="form-control">
                                                    <small class="text-danger" v-if="errors.buy_date">{{errors.buy_date[0]}}</small>
                                                </div>

                                                <div class="col-md-6">
                                                    <label>Product Quantity </label>
                                                    <input v-model="form.quantity" type="text" class="form-control" placeholder="Enter Quantity">
                                                    <small class="text-danger" v-if="errors.quantity">{{errors.quantity[0]}}</small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <input type="file" class="custom-file-input" id="customFile" @change="image">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                    <small class="text-danger" v-if="errors.image">{{errors.image[0]}}</small>
                                                </div>

                                                <div class="col-md-6">
                                                    <img :src="form.image" style="height: 40px; width: 40px;">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block">Save</button>
                                        </div>
                                        <hr>
                                    </form>
                                    <hr>
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

    data(){
        return {
            form:{
                name:null,
                category_id:null,
                supplier_id:null,
                code:null,
                buy:null,
                sell:null,
                root:null,
                buy_date:null,
                quantity:null,
                image:null,
            },
            errors:{

            },
            categories:{},
            suppliers:{},
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
                    this.form.image = event.target.result;
                     console.log(event.target.result);
                };
                reader.readAsDataURL(file);
            }
            },
        proInsert(){
            axios.post('api/pro-store',this.form)
            .then(() =>{
                this.$router.push({name: '/all-product'})
                Notification.success()
            })
            .catch(error => this.errors = error.response.data.errors)

        },
    },
    created(){
        if(!User.loggedIn()){
            this.$router.push({name: '/'})
        }
        axios.get('/api/sup-index/')
            .then(({data}) => (this.suppliers = data))
        axios.get('/api/cat-index/')
            .then(({data}) => (this.categories = data))
    },
}
</script>

<style scoped>

</style>
