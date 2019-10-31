<template>
    <div class="container">
        <div class="row mt-5">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Emplyees Table</h3>

                <div class="card-tools">
                    <button class="btn btn-success" @click="newModal">Add Employee <i class="fas fa-user-plus fa-fw"></i></button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Email</th>
                      <th>Type</th>
                      
                      <th>Registered At</th>
                      <th>Modify</th>
                      <th>View</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="user in users" :key="user.id">
                      <td>{{user.id}}</td>
                      <td>{{user.firstname}}</td>
                      <td>{{user.lastname}}</td>
                      <td>{{user.email}}</td>
                      <td>{{user.type}}</td>
                      
                      
                      
                      
                      <td>{{user.created_at | myDate}}</td>
                      <td>
                          <a href="#" @click="editModal(user)">
                              <i class="fa fa-user blue"></i>
                          </a>
                          /
                          <a href="#" @click="deleteUser(user.id)">
                              <i class="fa fa-trash red"></i>
                          </a>
                      </td>
                      <td>
                          <a href="#" @click="viewModal(user)" class="btn btn-success">
                              view-Info
                          </a>
                    </td>
                    </tr>
                   
                  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>

            <!-- Modal -->
            <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" v-show="!editmode" id="addNewLabel">Add New Employee</h5>
                    <h5 class="modal-title" v-show="editmode" id="addNewLabel">Updates Employee's Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" @submit.prevent="editmode ? updateUser() : createUser()">
                    <div class="modal-body">
                    

                              <div class="form-group">
                                    <label for="firstname" class="col-xs-2 control-label">First Name</label>
                                    <input v-model="form.firstname" type="text" name="firstname"
                                    
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('firstname') }">
                                    <has-error :form="form" field="firstname"></has-error>
                                </div>

                                <div class="form-group">
                                    <label for="lastname" class="col-xs-2 control-label">Last Name</label>
                                    <input v-model="form.lastname" type="text" name="lastname"
                                    
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('lastname') }">
                                    <has-error :form="form" field="lastname"></has-error>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-xs-2 control-label">Employee Email</label>
                                    <input v-model="form.email" type="text" name="email"
                                        
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                                    <has-error :form="form" field="email"></has-error>
                                </div>

                                

                                <div class="form-group">
                                    <label for="company" class="col-xs-2 control-label">Employee Company</label>
                                    <select v-model="form.company" type="text" name="company" id="company"
                                        placeholder="Company"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('company') }">
                                        <option  v-for="company in companies" :key="company.id" :value="company.id">{{company.companyname}}</option>
                                        
                                    </select>
                                    <has-error :form="form" field="type"></has-error>
                                </div>


                                <div class="form-group">
                                    <label for="usertype" class="col-xs-2 control-label">Employee Type</label>
                                    <select v-model="form.type" type="text" name="type" id="type"
                                        placeholder="Type"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('type') }">
                                        <option value="admin">Admin</option>
                                        <option value="user">Standard User</option>
                                    </select>
                                    <has-error :form="form" field="type"></has-error>
                                </div>

                                  <div class="form-group">
                                        <label for="photo" class="col-xs-2 control-label">Employee Profile Photo</label>
                                        <div class="col-sm-12">
                                            <input type="file" @change="updateProfile" name="photo" class="form-input">
                                        </div>
                                </div>

                                <div class="form-group">
                                    <input v-model="form.password" type="password" name="password"
                                        placeholder="Password"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                                    <has-error :form="form" field="password"></has-error>
                                </div>

                                


                    </div>
              
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button v-show="editmode" type="submit" class="btn btn-success">Update</button>
                        <button v-show="!editmode" type="submit" class="btn btn-primary">Create</button>
                    </div>
                  </form>
                </div>
            </div>
            </div>



            <!-- Modal -->
            <div class="modal fade" id="viewUser" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" v-show="!editmode" id="addNewLabel">Employee Details</h5>
                    
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form>
                    <div class="modal-body">
                    

                              <div class="form-group">
                                    <label for="firstname" class="col-xs-2 control-label">First Name</label>
                                    <input v-model="form.firstname" type="text" name="firstname"
                                    
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('firstname') }" readonly>
                                    <has-error :form="form" field="firstname"></has-error>
                                </div>

                                <div class="form-group">
                                    <label for="lastname" class="col-xs-2 control-label">Last Name</label>
                                    <input v-model="form.lastname" type="text" name="lastname"
                                    
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('lastname') }" readonly>
                                    <has-error :form="form" field="lastname"></has-error>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-xs-2 control-label">Employee Email</label>
                                    <input v-model="form.email" type="text" name="email"
                                        
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('email') }" readonly>
                                    <has-error :form="form" field="email"></has-error>
                                </div>
                                
                                

                                <div class="form-group">
                                    <label for="company" class="col-xs-2 control-label">Employee Company</label>
                                    <select v-model="form.company" type="text" name="company" id="usercompany"
                                        placeholder="Company"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('company') }" disabled>
                                        <option  v-for="company in companies" :key="company.id" :value="company.id" >{{company.companyname}}</option>
                                        
                                    </select>
                                    <has-error :form="form" field="type"></has-error>
                                </div>
                    </div>
              
                    <div class="modal-footer">

                    </div>
                  </form>
                </div>
            </div>
            </div>




    </div>
    
</template>

<script>
import { setInterval } from 'timers';
    export default {
        data(){
            
            return{
                editmode:false,
                companies:{},
                users: {},
                form:new Form({
                    id:'',
                    firstname: '',
                    lastname: '',
                    email: '',
                    password: '',
                    company: '',
                    photo: ''
                })
            }
        },
        methods:{
            updateProfile(e){            
                let file = e.target.files[0];
                console.log(file)
                let reader = new FileReader();
                if(file['size'] < 2111775 ){
                     reader.onloadend = (file) => {
                    this.form.photo = reader.result;
                    }
                    reader.readAsDataURL(file);
                }else{
                    swal.fire({
                         type: 'error',
                         title: 'Ooops...',
                         text: 'You are uploading a Large File Max 2mb required'
                        } 
                    )

                    $('#addNew').modal('hide')
                }
            },
        
            loadCompany(){
                axios.get("api/company").then(({ data }) => (this.companies = data.data))
            },
            updateUser(){

                this.$Progress.start()
                // console.log('Editting Data');
                this.form.put('api/user/'+this.form.id)
                .then(() => {

                

                $('#addNew').modal('hide')
                
                 swal.fire(
                            'Updated!',
                            'User Information Updated.',
                            'success'
                            )

                this.$Progress.finish()

                Fire.$emit('AfterCreate')
                    

                })
                .catch(() => {
                     this.$Progress.fail()
                })
            },
            editModal(user){
                this.editmode = true;
                this.form.reset();
                $('#addNew').modal('show')
                this.form.fill(user)
            },
            viewModal(user){
                $('#viewUser').modal('show')
                this.form.fill(user)
            },
               newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show')
            },
            deleteUser(id){
                swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {

                   if (result.value){
                         //send a request to the server 
                    this.form.delete('api/user/' + id).then(()=>{

                             
                            swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                            )
                        
                        Fire.$emit('AfterCreate')//refresh afer delete eventlister

                    }).catch(()=>{
                        swal("Failed", "Something wrong", "warning");
                    })

                   }
               
                })
            },
            loadUsers(){
                axios.get("api/user").then(({ data }) => (this.users = data))
            },
            createUser(){
                this.$Progress.start()
                this.form.post('api/user')
                .then(() => {

                Fire.$emit('AfterCreate')

                $('#addNew').modal('hide')
                
                toast.fire({
                type: 'success',
                title: 'User Created Succesfully'
                })

                this.$Progress.finish()
                    

                })
                .catch(() => {
                        this.$Progress.fail()
                })
    
                
            }
        },
        created() {
            this.loadUsers()
            this.loadCompany()
            Fire.$on('AfterCreate',() => {
                this.loadUsers();
            });
            //setInterval(this.loadUsers,3000)
            
        }
    }
</script>
