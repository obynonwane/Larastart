<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create a Company</div>

                    <div class="card-body">
                          <form action="" @submit.prevent="createCompany()">
                    
                    
                                <div class="form-group">
                                    <input v-model="form.companyname" type="text" name="companyname"
                                        placeholder="Company Name"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('companyname') }">
                                    <has-error :form="form" field="companyname"></has-error>
                                </div>


                            <div class="form-group">

                                    
                                    <textarea  class="form-control" v-model="form.companyaddress" id="inputExperience" placeholder="Company Address"></textarea>
                                    <has-error :form="form" field="companyaddress"></has-error>
                                
                            </div>
                        
                        <button  type="submit" class="btn btn-primary">Create</button>
            
                  </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header ">Company List</div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="company in companies" :key="company.id">
                                    <td>{{company.id}}</td>
                                    <td>{{company.companyname}}</td>
                                    <td>{{company.companyaddress}}</td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        
    </div>
</template>

<script>
    export default {
        name:'Company',
        data(){
            return{
                companies:{},
                 form:new Form({
                    id:'',
                    companyname:'',
                    companyaddress:''
                })
            }
        },
        methods:{
            loadCompany(){
                axios.get("api/company").then(({ data }) => (this.companies = data.data))
            },
            createCompany(){
                this.$Progress.start()
                this.form.post('api/company')
                .then(() => {
                
                toast.fire({
                type: 'success',
                title: 'Company Created Succesfully'
                })

                Fire.$emit('AfterCreate')

                this.$Progress.finish()
                  
                   

                })
                .catch(() => {
                  this.$Progress.fail()
                })

                
            }

        },
        mounted() {
            console.log('Component mounted.')
        },
        created(){
            this.loadCompany()
             Fire.$on('AfterCreate',() => {
                this.loadCompany()
            })
        }
    }
</script>

<style>

</style>
