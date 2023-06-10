<?php

include "../connect.php" ;
 
$photoid  = filterRequest("id");
 $imagename = filterRequest("imagename") ;

$stmt =$con->prepare("DELETE FROM photos WHERE `photo_id` = ?");

 $stmt ->execute(array( $photoid));

 $count =$stmt-> rowCount();
if($count > 0){
     deleteFile("../upload" , $imagename) ;
    echo json_encode(array("status" => "success")) ; 
}else {
    echo json_encode(array("status"=>"failed")) ;
}

?>