<?php 

//Loading Tables and the Occupants of every table of accounts in a same University 

require '(Control)versionTest.php'; 
if(require '(Control)tokenCheck.php'){

    $table1=array();
    $table2=array();
    $table3=array();
    $table4=array();
    $json_array=array();

    $i=0; //counter
    $j=2; //counter

    $json_array[0] = 'success';
   
    if(!empty($data->account_Id) && !empty($data->currentPage) && !empty($data->user_uni)){
        
        $account_Id = htmlspecialchars($data->account_Id);
        $user_uni = htmlspecialchars($data->user_uni);
        $currentPage=htmlspecialchars($data->currentPage);

        require '(Model)loadTables.inc.php';


        if(mysqli_num_rows($xx)>0){
            $nbr_table= mysqli_num_rows($xx); 
            $json_array[1] = $nbr_table;

            while($res = mysqli_fetch_assoc($xx)){	
                $i=$i+1;
                $table1=array();

                $table_name=$res["table_name"];
                $seats=$res["seats"];
                $table_type=$res["table_type"];

                $table1 = array($table_name,$seats,$table_type);

                require '(Model)loadOccupants.inc.php';
                if(mysqli_num_rows($yy)>0){
                   

                    while($res1 = mysqli_fetch_assoc($yy)){	
                        $table2 = array($res1["account_Id"],$res1["username"],$res1["position"],"batikhh");
                        array_push($table3,$table2);
                        $table2=array();
                    }	

                    array_push($table1,$table3);
                    $table3=array();
               
                }else  if(mysqli_num_rows($yy) == 0){
                    array_push($table1,[]);
                }
                array_push($table4,$table1);
                if ($i == $nbr_table){
                    $json_array[$j] = $table4;
                }
                if ($i == 12){
                    $json_array[$j] = $table4;
                    $i=0;
                    $j=$j+1;
                    $nbr_table=$nbr_table-12;
                    $table4=array();
                }
                
               
            }	
        }else  if(mysqli_num_rows($xx) == 0){

            $table4=array();
            $json_array[0] = 'empty';
            $json_array[1] = 0;

        }

            echo json_encode($json_array);

            mysqli_close($con);

    }else require '(View)Error7.php';

}
?>