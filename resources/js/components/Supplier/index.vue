<template>
    <div class="create" >
        <div class="row" style="padding: 8px">
            <router-link to="/create-supplier" class="btn btn-primary">Add Supplier</router-link>
        </div><br>
        <input v-model="search" type="text" class="form-control" style="width: 300px" placeholder="Search Here"><br>

        <div class="row">
            <div class="col-lg-12 mb-4">
                <!-- Simple Tables -->
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">All Supplier</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th>Shop Name</th>
                                <th>E-mail</th>
                                <th>phone</th>
                                <th>Photo</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="supplier in filterSearch" :key="supplier.id">
                                <td>{{supplier.shop_name}}</td>
                                <td>{{supplier.email}}</td>
                                <td>{{supplier.phone}}</td>
                                <td><img class="img" :src="supplier.photo"></td>
                                <td>
                                    <router-link :to="{name: '/edit-supplier', params:{id:supplier.id}}" class="btn btn-primary">Edit</router-link>
                                    <a @click="deleteItem(supplier.id)" class="btn btn-danger">Delete</a>
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
            suppliers:[],
            search:''
        }
    },
    methods:{
        allSup(){
            axios.get('/api/sup-index/')
                .then(({data}) => (this.suppliers = data))
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
                    axios.get('/api/sup-delete/'+id)
                        .then(() =>{
                            this.suppliers = this.suppliers.filter(supplier => {
                                return supplier.id != id
                            })
                        })
                        .catch(() => {
                            this.$router.push({name: '/all-supplier'})
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
            return this.suppliers.filter(supplier => {
                return supplier.shop_name.match(this.search)
            })

        }
    },

    created(){
        this.allSup();
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
