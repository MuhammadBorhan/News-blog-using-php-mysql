<?php include "header.php"; 

if(isset($_POST['submit'])){

    include 'config.php';

    $category_id = mysqli_real_escape_string($connection,$_POST['category_id']);
    $category_name = mysqli_real_escape_string($connection,$_POST['category_name']);

    $updateCategories = "UPDATE category SET category_name = '$category_name' WHERE category_id='$category_id'";

    $update = mysqli_query($connection,$updateCategories) or die("Query faild.");
    if($update){
      header("location: category.php");
    }
}

?>
      <div class="container py-5">
          <div class="row p-3">
              <div class="col-md-12">
                  <h1 class="text-primary">Update Category Details</h1>
              </div>
              <div class="col-md-offset-4 col-md-4 mx-auto bg-dark p-3 rounded text-white">

                <?php 
                    $category_id = $_GET['id'];

                    include "config.php";
                    $findCategories = "SELECT * FROM category WHERE category_id = {$category_id}";
                    $result = mysqli_query($connection,$findCategories) or die("Failed");
                    $count = mysqli_num_rows($result);

                    if($count > 0){ // if start backet
                    while($row = mysqli_fetch_assoc($result)){ // while start backet

                ?>
                  <!-- Form Start -->
                  <form  action="<?php $_SERVER['PHP_SELF'] ?>" method ="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <input type="hidden" name="category_id"  class="form-control" value="<?php echo $row['category_id'] ?>" placeholder="" >
                      </div>
                          <div class="form-group  mb-3">
                          <label>Category Name</label>
                          <input type="text" name="category_name" class="form-control" value="<?php echo $row['category_name'] ?>" placeholder="" required>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                  <!-- /Form -->

                    <?php 
                          } // while end backet

                    } // if end backet

                    ?>
              </div>
          </div>
      </div>

<?php include "footer.php"; ?>
