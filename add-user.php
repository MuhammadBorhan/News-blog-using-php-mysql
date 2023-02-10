<?php include "header.php" ?>

      <div class="container my-5">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="text-primary">Add User</h1>
              </div>
              <div class="col-md-offset-3 col-md-6 mx-auto bg-dark p-3 rounded text-white">

                  <?php 
                        if(isset($_POST['submit'])){

                            include 'config.php';

                            $fname = mysqli_real_escape_string($connection,$_POST['fname']);
                            $lname = mysqli_real_escape_string($connection,$_POST['lname']);
                            $user = mysqli_real_escape_string($connection,$_POST['user']);
                            $password = mysqli_real_escape_string($connection,md5($_POST['password']));
                            $role = mysqli_real_escape_string($connection,$_POST['role']);

                            $image = $_FILES['image'];
                            $image_name = $image['name'];
                            $image_tmp_name = $image['tmp_name'];

                            if(!empty($image)){
                                $loc="upload/";
                                move_uploaded_file($image_tmp_name,$loc.$image_name);
                            }else{
                                echo 'File empty';
                            }


                            $selectUser = "SELECT username FROM user WHERE username='$user'";
                            $findUser = mysqli_query($connection,$selectUser) or die("Query faild.");

                            $count = mysqli_num_rows($findUser);
                            if($count > 0){
                            echo "<p class='text-danger'>UserName Already Exists.</p>";
                            }else{
                            $insertUser = "INSERT INTO user (profile,first_name,last_name,username,password,role) 
                            VALUE ('$image_name','$fname','$lname','$user','$password','$role')";

                            $createUser = mysqli_query($connection,$insertUser) or die("Query Failed.");

                            if($createUser){
                                header("location: users.php");
                            }

                            }

                        }
                   ?>
                    <!-- form start -->
                  <form  action="<?php $_SERVER['PHP_SELF'] ?>" method ="POST" enctype="multipart/form-data">
                      <div class="form-group mb-3">
                          <label>First Name</label>
                          <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                      </div>
                      <div class="form-group mb-3">
                          <label>Last Name</label>
                          <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                      </div>
                      <div class="form-group mb-3">
                          <label>User Name</label>
                          <input type="text" name="user" class="form-control" placeholder="Username" required>
                      </div>
                      <div class="form-group mb-3">
                          <label>Password</label>
                          <input type="password" name="password" class="form-control" placeholder="Password" required>
                      </div>
                      <div class="form-group mb-3">
                          <label>Image URL</label>
                          <input type="file" name="image" class="form-control" >
                      </div>
                      <div class="form-group mb-3">
                          <label>User Role</label>
                          <select class="form-control" name="role" >
                              <option value="0">Moderator</option>
                              <option value="1">Admin</option>
                          </select>
                      </div>
                      <input type="submit"  name="submit" class="btn btn-primary" value="Add" required />
                  </form>
                   <!-- Form End-->
               </div>
           </div>
       </div>
 


<?php include "footer.php" ?>