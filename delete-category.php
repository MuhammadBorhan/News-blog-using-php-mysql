<?php 

include 'config.php';

$deleteId = $_GET['id'];

$deleteUser = "DELETE FROM category WHERE category_id = '{$deleteId}'";

$deleted = mysqli_query($connection,$deleteUser);

if($deleted){
	header("location: category.php");
}else{
	echo "Can't Delete User.";
}

mysqli_close($connection);

?>