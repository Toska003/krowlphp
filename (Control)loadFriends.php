<?php 
//CHAT
//loading the friends that has recent=0 or recent=1 in friend section (PS:the contacts and friends should be from the same uni but we will add this restriction in add friend section)


require '(Control)versionTest.php'; 
if(require '(Control)tokenCheck.php'){

    $table_array = array();
    $t1=0;
    
    if(!empty($data->user_id)){
        
        $user_id = htmlspecialchars($data->user_id);
        
        require '(Model)loadFriends.inc.php';
        if(mysqli_num_rows($xx)>0){
            $t1 = 1;
            while($res = mysqli_fetch_assoc($xx)){	
                $table_array[] = array($res["user_id"],$res["nameFriend"]);
            }	
        }else{
            $table_array[]=[];
        }
                    
            $json_array[0] = 'error4';
            $json_array[1] = $token;
            $json_array[2] = $table_array;

            if($t1 == 1){
                $json_array[0] = 'success';
            }
            echo json_encode($json_array);

            mysqli_close($con);

    }else require '(View)Error7.php';
}
?>