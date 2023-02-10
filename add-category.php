<?php include "header.php" ?>

      <div class="container my-5">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="text-primary">Add Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6 mx-auto bg-dark p-3 rounded text-white">

                  <?php 
                        if(isset($_POST['submit'])){

                            include 'config.php';

                            $category_name = mysqli_real_escape_string($connection,$_POST['category_name']);


                            $selectCategory = "SELECT category_name FROM category WHERE category_name='$category_name'";
                            $findCategories = mysqli_query($connection,$selectCategory) or die("Query faild.");

                            $count = mysqli_num_rows($findCategories);
                            if($count > 0){
                            echo "<p class='text-danger'>Category Already Exists.</p>";
                            }else{
                            $insertUser = "INSERT INTO category (category_name) 
                            VALUE ('$category_name')";

                            $createCategory = mysqli_query($connection,$insertUser) or die("Query Failed.");

                            if($createCategory){
                                header("location: category.php");
                            }

                            }

                        }
                   ?>
                    <!-- form start -->
                  <form  action="<?php $_SERVER['PHP_SELF'] ?>" method ="POST" enctype="multipart/form-data">
                      <div class="form-group mb-3">
                          <label>Category Name</label>
                          <input type="text" name="category_name" class="form-control" placeholder="Category Name" required>
                      </div>
                      <input type="submit"  name="submit" class="btn btn-primary" value="Add" required />
                  </form>
                   <!-- Form End-->
               </div>
           </div>
       </div>
 


<?php include "footer.php" ?>