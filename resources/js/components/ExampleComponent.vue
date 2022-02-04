<template>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Lista Employees: {{employees.length}} </div>

                    <div class="card-body">
                        <ul>
                            <li v-for="employee, i in filteredEmployees" :key="i">
                                {{employee.first_name}} {{employee.last_name}} - <a @click="deleteEmp(employee.id)" class="btn btn-danger btn-sm mb-3" >DELETE</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                employees: [],
            }
        },
        mounted() {
            this.getAllEmployees()
        },
        computed: {
            filteredEmployees(){
                return this.employees;
            }
        },
        methods: {
            getAllEmployees(){

                axios.get('/emps/list')
                    .then((result) => {
                        
                        const data = result.data;
                        this.employees= data;
                    }).catch((err) => {
                        
                        console.error(err);
                    });
            },
            deleteEmp(id){

                axios.get(`/emp/list/${id}`)
                    .then((result) => {
                        
                        const data = result.data;
                        if (data) {
                            const ind = this.getIndById(this.employees, id);
                            this.employees.splice(ind, 1);
                        }
                    }).catch((err) => {
                        
                        console.error(err);
                    });
            },
            getIndById(array, id) {

                for (let x=0;x<array.length;x++) {

                    const elem = array[x];
                    if (elem.id == id) 
                        return x;
                }

                return -1;
            },
        },
    }
</script>
