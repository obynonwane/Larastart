<style>
    .widget-user-header{
        background-position: center center;
        background-size: counter-reset;
        height: 250px;
    }
</style>

<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
               
                    
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header text-white" style="background-image:url('./img/user-cover.jpg')">
                <h3 class="widget-user-username">Elizabeth Pierce</h3>
                <h5 class="widget-user-desc">Web Designer</h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle" src="" alt="User Avatar">
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">3,200</h5>
                      <span class="description-text">SALES</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">13,000</h5>
                      <span class="description-text">FOLLOWERS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">35</h5>
                      <span class="description-text">PRODUCTS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.widget-user -->
           </div>
        </div>

        <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Activity</a></li>
                  
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane d-flex justify-content-center" id="activity">
                     <h1>Display User Activity</h1>
                  </div>
                 

                  <div class="tab-pane active" id="settings">
                    <form class="form-horizontal">
                    

                     <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Name</label>

                         <div class="col-sm-12">
                            <input type="" class="form-control" id="inputName" placeholder="Name">
                         </div>
                    </div>



                      <div class="form-group">
                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                          <div class="col-sm-12">
                            <input type="email"  class="form-control" id="inputEmail" placeholder="Email" >
                            
                        </div>
                    </div>





                     <div class="form-group">
                         <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                            <div class="col-sm-12">
                            <textarea  class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                     
                        </div>
                      </div>
                      

                      

                      <div class="form-group">
                        <label for="photo" class="col-sm-2 control-label">Profile Photo</label>

                        <div class="col-sm-12">
                          <input type="file" name="photo" class="form-input">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="passport" class="col-sm-12 control-label">Passport (leave empty if not changing)</label>

                        <div class="col-sm-12">
                            <input type="passport" class="form-control" id="passport" placeholder="Passport">
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-12">
                          <button type="submit" class="btn btn-success">Update</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
