<?php
include '../extends/header.php';


?>
<div class="row">
    <div class="col">
     <div class="page-description">
     <h1>settings</h1>
        </div>
            </div>
                </div> 
               <!-- usermame start -->


               <div class="row"></div>
                <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h2>usermame</h2>
                    </div>
                    <form action="settings_manage.php" method="POST">
                    <div class="card-body">

                    <label for="exampleInputEmail1" class="form-label">username</label>
                    <input type="text" name="name" class="form-control <?php if(isset($_SESSION['name_error'])){ echo "is-invalid";}else{ echo "";}?>"
                     aria-describedby="emailHelp">
                    <!-- php success code -->
                    <?php if(isset($_SESSION['name_update'])) : ?>
                      <div id="emailHelp" class="form-text text-success">
                      <?= $_SESSION['name_update'] ?>
                      </div>
                      <?php endif; unset($_SESSION['name_update']) ;?>
                    <!-- php success end -->
                 
                    <!-- php error code -->
                      <?php if(isset($_SESSION['name_error'])) : ?>
                      <div id="emailHelp" class="form-text">
                      <?= $_SESSION['name_error'] ?>
                      </div>
                      <?php endif; unset($_SESSION['name_error']) ;?>
                    <!-- php error end -->
                    

                  <div class="d-grid gap-2 mt-3">
                  <button class="btn btn-primary" name="imageubtn" type="submit">update</button>
                  
                  </div>
                
                </div>
                </form>
                </div>


               <!-- usermame end -->

               <!-- email start -->

               <div class="row"></div>
                <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h2>Email Address</h2>
                    </div>
                    <form action="settings_manage.php" method="POST">
                    <div class="card-body">

                    <label for="exampleInputEmail1" class="form-label">Email Addresss</label>
                    <input type="text" name="email" class="form-control <?php if(isset($_SESSION['email_error'])){ echo "is-invalid";}else{ echo "";}?>"
                     aria-describedby="emailHelp">
                    <!-- php success code -->
                    <?php if(isset($_SESSION['email_update'])) : ?>
                      <div id="emailHelp" class="form-text text-success">
                      <?= $_SESSION['email_update'] ?>
                      </div>
                      <?php endif; unset($_SESSION['email_update']) ;?>
                    <!-- php success end -->
                 
                    <!-- php error code -->
                      <?php if(isset($_SESSION['email_error'])) : ?>
                      <div id="emailHelp" class="form-text">
                      <?= $_SESSION['email_error'] ?>
                      </div>
                      <?php endif; unset($_SESSION['email_error']) ;?>
                    <!-- php error end -->
                    
                    <div class="d-grid gap-2 mt-3">
                  <button class="btn btn-primary" name="emailubtn" type="submit">update</button>
                  
                  </div>
                
                </div>
                </form>
                </div>


                <!-- email end -->
               <!-- password  start-->
                <div class="row"></div>
                <div class="col-10">
                <div class="card">
                    <div class="card-header">
                        <h4>password update</h4>
                    </div>
                    <form action="settings_manage.php" method="POST">
                    <div class="card-body">

                    <label for="exampleInputEmail1" class="form-label">Current password</label>
                    <input type="password" name="oldpass" class="form-control <?php if(isset($_SESSION['password_error'])){ echo "is-invalid";}else{ echo "";}?>"
                     aria-describedby="emailHelp">
                    <!--old pass  -->
                     <div style="margin-top:15px; margin-bottom:5px;"><input type="checkbox" onclick="showpassword1()"> show password</div>
                    <!-- old pass -->
                     <label for="exampleInputEmail1 my-2 " class="form-label"> New password</label>
                    <input type="password" name="newpass" class="form-control <?php if(isset($_SESSION['password_error'])){ echo "is-invalid";}else{ echo "";}?>" id="exampleInputEmail1" 
                     aria-describedby="emailHelp">

                    <!--new pass  -->
                     <div style="margin-top:15px; margin-bottom:5px;"><input type="checkbox" onclick="showpassword2()"> show password</div>
                    <!--new pass -->
                     <label for="exampleInputEmail1 my-2 " class="form-label">Confirm password</label>
                    <input type="password" name="cpass" class="form-control <?php if(isset($_SESSION['password_error'])){ echo "is-invalid";}else{ echo "";}?>" 
                    id="exampleInputEmail1" 
                     aria-describedby="emailHelp">

                     <!-- c-pass -->
                     <div style="margin-top:15px; margin-bottom:5px;"><input type="checkbox" onclick="showpassword3()"> show password</div>
                     <!-- c-pass -->
                      
                     <!-- php success code -->
                     <?php if(isset($_SESSION['pass_update'])) : ?>
                      <div id="emailHelp" class="form-text text-success">
                      <?= $_SESSION['pass_update'] ?>
                      </div>
                      <?php endif; unset($_SESSION['pass_update']) ;?>
                    <!-- php success end -->
                 
                    <!-- php error code -->
                      <?php if(isset($_SESSION['pass_error'])) : ?>
                      <div id="emailHelp" class="form-text">
                      <?= $_SESSION['pass_error'] ?>
                      </div>
                      <?php endif; unset($_SESSION['pass_error']) ;?>
                    <!-- php error end -->
                    

                  <div class="d-grid gap-2 mt-3">
                  <button class="btn btn-primary" name="passubtn" type="submit">update</button>
                  
                  </div>
                
                </div>
                </form>
                </div>
                <!-- password end -->
                <!-- image part start -->
                <div class="row"></div>
                <div class="col-10">
                <div class="card">
                    <div class="card-header">
                        <h4>Image update</h4>
                    </div>
                    <form action="settings_manage.php" method="POST" enctype="multipart/form-data">
                    <div class="card-body">

                    <label for="exampleInputEmail1" class="form-label">profile picture</label>
                    <input type="file" name="image" class="form-control <?php if(isset($_SESSION['password_error'])){ echo "is-invalid";}else{ echo "";}?>"
                     aria-describedby="emailHelp">
                    

                  <div class="d-grid gap-2 mt-3">
                  <button class="btn btn-primary" name="imageubtn" type="submit">update</button>
                  
                  </div>
                
                </div>
                </form>
                </div>
                <!-- image part start -->

                </div>

<?php
include '../extends/footer.php';


?>