<?php 	

	//Check if the the user has already take place in a table and want to join a second place

	$sql="SELECT count(*)as nbr FROM `occupants` WHERE `account_Id` = '".$account_Id."' UNION SELECT count(*)as nbr FROM `participants` WHERE `account_Id` = '".$account_Id."' ";
	
	$xx = mysqli_query($con,$sql);
	$res6 = mysqli_fetch_assoc($xx);
		
	
	
?>