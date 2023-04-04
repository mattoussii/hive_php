<?php

include "../connect.php" ;
 
$title   = filterRequest("title");
$content = filterRequest("content");
$date    = filterRequest("date");
$userid  = filterRequest("id");

$imagename = imageUpload("file") ;

if($imagename != 'fail'){

        $stmt =$con->prepare("
    INSERT INTO `visites`( `visite_title`, `visite_content`, `visite_date`,`visite_user`,`visite_image`)
    VALUES ( ? , ? , ? , ? , ? )
    ");

    $stmt ->execute(array( $title , $content , $date , $userid ,$imagename));

    $count =$stmt-> rowCount();
    
    if($count > 0){
        echo json_encode(array("status" => "success")) ; 
    }else {
        echo json_encode(array("status"=>"failed")) ;
    }

}else{
    echo json_encode(array("status"=>"failed")) ;
}



?>