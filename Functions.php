<?php 

function decodeBase64($code){

    $encrypted=base64_decode($code,true); // the parameter true will return false if the input contains character from outside the base64 alphabet

    if($encrypted == true){

        $arr=explode("-",$encrypted);

    }else{

        $arr[0]=0;
        
    }

        return $arr;

}

?>

