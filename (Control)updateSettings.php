<?php 
//SETTINGS

require '(Control)versionTest.php'; 
if(require '(Control)tokenCheck.php'){ 
    
    //converting json_array to an array 
    $json = file_get_contents('php://input');
    $data = json_decode($json,true);


    if(!empty($data["account_Id"])){
        
        //saving the value before removing it from the array
        $account_Id= htmlspecialchars($data["account_Id"]);
        $json_array[0] = 'error4';

        //removing these 2 values
        unset($data["version"]);
        unset($data["account_Id"]);

        //checking if after removing version and account_Id there's any value to update it in DB 
        if(!empty($data)){

            foreach ($data as $key => $val){
                
                require '(Model)updateSettings.inc.php';
                if($yy){
                    $json_array[0] = 'success';
                }
                
            }



        }
        
        echo json_encode($json_array);



    }else require '(View)Error7.php';


}
?>