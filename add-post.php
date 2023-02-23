<?php include "header.php" ?>

      <div class="container my-5">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="text-primary">Add New Post</h1>
              </div>
              <div class="col-md-offset-3 col-md-6 mx-auto bg-dark p-3 rounded text-white">

                  <!-- <?php 
                        if(isset($_POST['submit'])){

                            include 'config.php';

                            $title = mysqli_real_escape_string($connection,$_POST['title']);
                            $postDesc = mysqli_real_escape_string($connection,$_POST['postDesc']);
                            $category = mysqli_real_escape_string($connection,$_POST['category']);
                            // $date = date("d M, Y");

                            $image = $_FILES['image'];
                            $image_name = $image['name'];
                            $image_tmp_name = $image['tmp_name'];

                            if(!empty($image)){
                                $loc="upload/";
                                move_uploaded_file($image_tmp_name,$loc.$image_name);
                            }else{
                                echo 'File empty';
                            }


                            $selectCategory = "SELECT category FROM post WHERE category='$category'";
                            $findCategory = mysqli_query($connection,$selectCategory) or die("Query faild.");

                            $count = mysqli_num_rows($findCategory);
                            if($count > 0){
                            echo "<p class='text-danger'>Category Already Exists.</p>";
                            }else{
                                
                            $insertPost = "INSERT INTO post (title,description,category,post_image) 
                            VALUE ('$title','$postDesc','$category','$image_name')";

                            $createPost = mysqli_query($connection,$insertPost) or die("Query Failed.");

                            if($createPost){
                                header("location: post.php");
                            }

                            }

                        }
                   ?> -->
                    <!-- form start -->
                  <form  action="<?php $_SERVER['PHP_SELF'] ?>" method ="POST" enctype="multipart/form-data">
                      <div class="form-group mb-3">
                          <label>Title</label>
                          <input type="text" name="title" class="form-control" placeholder="Title" required>
                      </div>
                      <div class="form-group mb-3">
                          <label>Description</label>
                          <textarea name="postDesc" class="form-control" rows="5"  required></textarea>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Category</label>
                          <select name="category" class="form-control">
                             <!-- <option disabled selected> Select Category</option> -->
                             <?php
                             
                             include 'config.php';

                             $query="SELECT * FROM category";
                             $result=mysqli_query($connection,$query) or die('Query Faield.');

                             if(mysqli_num_rows($result)>0){
                                while($row=mysqli_fetch_assoc($result)){
                                echo "<option value='{$row['category_name']}' selected> {$row['category_name']} </option>";
                                }
                             }
                             
                             ?>

                          </select>
                      </div>
                      <div class="form-group mb-3 mt-2">
                          <label>Image URL</label>
                          <input type="file" name="image" class="form-control" >
                      </div>
                    
                      <input type="submit"  name="submit" class="btn btn-primary" value="Post" required />
                  </form>
                   <!-- Form End-->
               </div>
           </div>
       </div>
 


<?php include "footer.php" ?>