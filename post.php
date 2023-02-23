<?php include 'header.php' ?>


<div class='container my-5'>
    <div class='d-flex justify-content-between'>
        <h1>All Post</h1>
        <p class="add-new"><a href="add-post.php">add Post</a></p>
    </div>
    <div class="table-responsive">
        <table class="table table-dark table-hover">
        <thead>
            <tr>
            <th scope="col">SL No.</th>
            <th scope="col">Title</th>
            <th scope="col">Category</th>
            <th scope="col">Date</th>
            <th scope="col">Author</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
        
        <?php 
            include "config.php";
            $serial=1;

               // Pagination code start
               $limit = 3;
               if(isset($_GET['page'])){
                 $page_number = $_GET['page'];
               }else{
                 $page_number = 1;
               }
                 
               $offset = ($page_number - 1) * $limit;
               $query = "SELECT * FROM post ORDER BY post_id LIMIT $offset, $limit";
               // Pagination code end

            // $query = "SELECT * FROM post ORDER BY post_id";
            $result = mysqli_query($connection,$query) or die("Failed");
            $count = mysqli_num_rows($result);

            if($count > 0){ // if condition first backet
                while($row = mysqli_fetch_assoc($result)){ // while loop firts backet
        
        ?>
            <tr>
                <th><?php echo $serial++ ?></th>
                <td><?php echo $row['title'] ?></td>
                <td><?php echo $row['category'] ?></td>
                <td><?php echo $row['post_date'] ?></td>
                <td><?php echo $row['author'] ?></td>
                <td class='edit'><a href='update-post.php?id=<?php echo $row['post_id'] ?>'>Edit</a></td>
                <td class='delete'>
                <a onclick="return confirm('Are You Sure?')" href='delete-post.php?id=<?php echo $row['post_id'] ?>'>Delete</a>
                </td>
            </tr>
            <!-- while loop last backet -->
            <?php } ?>
        </tbody>
        <!-- if condition last backet -->
        <?php } ?>
        </table>

              <!-- Pagination list start -->
              <?php 
                include "config.php";
                $query2 = "SELECT * FROM post";
                $result2 = mysqli_query($connection,$query2) or dir("Failed.");
                if(mysqli_num_rows($result2)){
                    $total_records = mysqli_num_rows($result2);
                    $total_page = ceil($total_records/$limit);

                    echo "<ul class='pagination d-flex justify-content-center gap-3'>";
                    if($page_number > 1){
                        echo '<li><a href="post.php?page='.($page_number-1).'">prev</a></li>';
                    }

                    for($i = 1; $i <= $total_page; $i++){

                        if($i == $page_number){
                          $active = "active";
                        }else{
                          $active = "";
                        }

                        echo '<li class='.$active.'><a href="post.php?page='.$i.'">'.$i.'</a></li>';
                    }
                    if($total_page > $page_number){
                        echo '<li><a href="post.php?page='.($page_number+1).'">next</a></li>';
                    }
                        echo "</ul>";
                }
            ?>
            <!-- Pagination list end -->

    </div>
</div>

<?php include 'footer.php' ?>




