<?php

include "../connect.php" ;
 
$detail    = filterRequest("detail");
$userid    = filterRequest("id");
$imagename = imageUpload("file") ;

if($imagename != 'fail'){

    $stmt =$con->prepare("
    INSERT INTO `photos`( `photo_detail`,`photo_user`,`photo_image`)
    VALUES ( ? , ? , ?  )
    ");

    $stmt ->execute(array( $detail , $userid ,$imagename ));

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