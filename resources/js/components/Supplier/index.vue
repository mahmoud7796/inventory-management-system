<template>
    <div class="create" >
        <div class="row" style="padding: 8px">
            <router-link to="/create-employee" class="btn btn-primary">Add Employee</router-link>
        </div><br>
        <input v-model="search" type="text" class="form-control" style="width: 300px" placeholder="Search Here"><br>

        <div class="row">
            <div class="col-lg-12 mb-4">
                <!-- Simple Tables -->
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">All Employees</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Salary</th>
                                <th>Date</th>
                                <th>phone</th>
                                <th>Photo</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="employee in filterSearch" :key="employee.id">
                                <td>{{employee.name}}</td>
                                <td>{{employee.email}}</td>
                                <td>{{employee.salary}}</td>
                                <td>{{employee.date}}</td>
                                <td>{{employee.phone}}</td>
                                <td><img class="img" :src="employee.photo"></td>
                                <td>
                                    <router-link :to="{name: '/edit-employee', params:{id:employee.id}}" class="btn btn-primary">Edit</router-link>
                                    <a @click="deleteItem(employee.id)" class="btn btn-danger">Delete</a>
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
            employees:[],
            search:''
        }
    },
    methods:{
        allEmployee(){
            axios.get('/api/index/')
                .then(({data}) => (this.employees = data))
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
                    axios.get('/api/delete/'+id)
                        .then(() =>{
                            this.employees = this.employees.filter(employee => {
                                return employee.id != id
                            })
                        })
                        .catch(() => {
                            this.$router.push({name: '/all-employee'})
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
            return this.employees.filter(employee => {
                return employee.name.match(this.search)
            })

        }
    },

    created(){
        this.allEmployee();
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
