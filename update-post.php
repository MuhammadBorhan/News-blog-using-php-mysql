<?php include "header.php"; 

if(isset($_POST['UpdatePost'])){

    include 'config.php';

    $post_id = mysqli_real_escape_string($connection,$_POST['post_id']);
    $title = mysqli_real_escape_string($connection,$_POST['title']);
    $category = mysqli_real_escape_string($connection,$_POST['categories']);

    $updatePost = "UPDATE post SET 
    title='$title',
    category = '$category' WHERE post_id = '$post_id'";

    $update = mysqli_query($connection,$updatePost) or die("Query faild.");
    if($update){
      header("location: post.php");
    }
}

?>
      <div class="container py-5">
          <div class="row p-3">
              <div class="col-md-12">
                  <h1 class="text-primary">Update Post Details</h1>
              </div>
              <div class="col-md-offset-4 col-md-4 mx-auto bg-dark p-3 rounded text-white">

                <?php 
                    $post_id = $_GET['id'];

                    include "config.php";
                    $findPost = "SELECT * FROM post WHERE post_id = {$post_id}";
                    $result = mysqli_query($connection,$findPost) or die("Failed");
                    $count = mysqli_num_rows($result);

                    if($count > 0){ // if start backet
                    while($row = mysqli_fetch_assoc($result)){ // while start backet

                ?>
                  <!-- Form Start -->
                  <form  action="<?php $_SERVER['PHP_SELF'] ?>" method ="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <input type="hidden" name="post_id"  class="form-control" value="<?php echo $row['post_id'] ?>" placeholder="" >
                      </div>
                      <div class="form-group  mb-3">
                          <label>Title</label>
                          <input type="text" name="title" class="form-control" value="<?php echo $row['title'] ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Category</label>
                          <select name="categories" class="form-control">
                             <?php
                             
                             include 'config.php';

                             $query="SELECT * FROM post";
                             $result=mysqli_query($connection,$query) or die('Query Faield.');

                             if(mysqli_num_rows($result)>0){
                                while($row=mysqli_fetch_assoc($result)){
                                echo "<option value='{$row['category']}' selected> {$row['category']} </option>";
                                }
                             }
                             
                             ?>

                          </select>
                      </div>
                      <input type="submit" name="UpdatePost" class="btn btn-primary mt-3" value="Update" required />
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
