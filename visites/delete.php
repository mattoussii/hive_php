<?php

include "../connect.php" ;
 
$visiteid  = filterRequest("id");
$imagename = filterRequest("imagename") ;

$stmt =$con->prepare("DELETE FROM visites WHERE `visite_id` = ?");

 $stmt ->execute(array( $visiteid));

 $count =$stmt-> rowCount();
if($count > 0){
    deleteFile("../upload" , $imagename) ;
    echo json_encode(array("status" => "success")) ; 
}else {
    echo json_encode(array("status"=>"failed")) ;
}

?>