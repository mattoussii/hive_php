<?php

include "../connect.php" ;
 
$visiteid = filterRequest("id");


$stmt =$con->prepare("DELETE FROM visites WHERE `visite_id` = ?");

 $stmt ->execute(array( $visiteid));

 $count =$stmt-> rowCount();
if($count > 0){
    echo json_encode(array("status" => "success")) ; 
}else {
    echo json_encode(array("status"=>"failed")) ;
}

?>