<?php

include "../connect.php" ;
 
$title   = filterRequest("title");
$content = filterRequest("content");
$date    = filterRequest("date");
$userid  = filterRequest("id");




$stmt =$con->prepare("
INSERT INTO `visites`( `visite_title`, `visite_content`, `visite_date`,`visite_user`)
 VALUES ( ? , ? , ? , ? )
 ");

 $stmt ->execute(array( $title , $content , $date , $userid ));

 $count =$stmt-> rowCount();
 
if($count > 0){
    echo json_encode(array("status" => "success")) ; 
}else {
    echo json_encode(array("status"=>"failed")) ;
}

?>