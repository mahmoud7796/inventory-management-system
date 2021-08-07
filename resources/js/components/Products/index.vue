<template>
    <div class="create" >
        <div class="row" style="padding: 8px">
            <router-link to="/create-product" class="btn btn-primary">Add Products</router-link>
        </div><br>
        <input v-model="search" type="text" class="form-control" style="width: 300px" placeholder="Search Here"><br>

        <div class="row">
            <div class="col-lg-12 mb-4">
                <!-- Simple Tables -->
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">All Products</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th>Product</th>
                                <th>Category</th>
                                <th>Supplier</th>
                                <th>Code</th>
                                <th>Buy</th>
                                <th>Sell</th>
                                <th>Root</th>
                                <th>Buy Date</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="product in filterSearch" :key="product.id">
                                <td>{{product.name}}</td>
                                <td>{{product.category.name}}</td>
                                <td>{{product.supplier.shop_name}}</td>
                                <td>{{product.code}}</td>
                                <td>{{product.buy}}</td>
                                <td>{{product.sell}}</td>
                                <td>{{product.root}}</td>
                                <td>{{product.buy_date}}</td>
                                <td><img class="img" :src="product.image"></td>
                                <td>
                               <router-link :to="{name: '/edit-product', params:{id:product.id}}" class="btn btn-primary">Edit</router-link>
                                    <a @click="deleteItem(product.id)" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
        </div>

    </div>

</template>

<script>
export default {
    data() {
        return {
            products:[],
            search:''
        }
    },
    methods:{
        allProduct(){
            axios.get('/api/pro-index/')
                .then(({data}) => (this.products = data))
                .catch()
        },
        deleteItem(id){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.get('/api/pro-delete/'+id)
                        .then(() =>{
                            this.products = this.products.filter(product => {
                                return product.id != id
                            })
                        })
                        .catch(() => {
                            this.$router.push({name: '/all-product'})
                        })
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
        }
    },
    computed:{
        filterSearch(){
            return this.products.filter(product => {
                return product.name.match(this.search)
            })

        }
    },

    created(){
        this.allProduct();
        if (!User.loggedIn()) {
            this.$router.push({name: '/'})
        }
    }
}

</script>

<style scoped>
.img{
    width: 50px;
    height: 50px;
}

</style>
