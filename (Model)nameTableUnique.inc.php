<?php

    $sql = "SELECT count(*)as nbr FROM `tables` WHERE  `table_name` = '".$table_name."'";

    $xx = mysqli_query($con,$sql);
    $res = mysqli_fetch_assoc($xx);



?>