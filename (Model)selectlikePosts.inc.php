<?php 
	//selecting likes of the post after inserting post_like_val in post_likes
	  
	$sql="SELECT `post_likes` FROM `posts` WHERE";

	$yy = mysqli_query($con,$sql);
	 
?>
