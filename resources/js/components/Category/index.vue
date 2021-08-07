<template>
    <div class="create" >
        <div class="row" style="padding: 8px">
            <router-link to="/create-category" class="btn btn-primary">Add Category</router-link>
        </div><br>
        <input v-model="search" type="text" class="form-control" style="width: 300px" placeholder="Search Here"><br>

        <div class="row">
            <div class="col-lg-12 mb-4">
                <!-- Simple Tables -->
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">All Categories</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="category in filterSearch" :key="category.id">
                                <td>{{category.name}}</td>
                                <td>
                                    <router-link :to="{name: '/edit-category', params:{id:category.id}}" class="btn btn-primary">Edit</router-link>
                                    <a @click="deleteItem(category.id)" class="btn btn-danger">Delete</a>
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
            categories:[],
            search:''
        }
    },
    methods:{
        allCat(){
            axios.get('/api/cat-index/')
                .then(({data}) => (this.categories = data))
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
                    axios.get('/api/cat-delete/'+id)
                        .then(() =>{
                            this.categories = this.categories.filter(category => {
                                return category.id != id
                            })
                        })
                        .catch(() => {
                            this.$router.push({name: '/all-category'})
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
            return this.categories.filter(category => {
                return category.name.match(this.search)
            })

        }
    },

    created(){
        this.allCat();
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
