<?php 

include 'config.php';

$deleteId = $_GET['id'];

$deletePost = "DELETE FROM post WHERE post_id = '{$deleteId}'";

$deleted = mysqli_query($connection,$deletePost);

if($deleted){
	header("location: post.php");
}else{
	echo "Can't Delete User.";
}

mysqli_close($connection);

?>