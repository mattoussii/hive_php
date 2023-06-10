<?php

include "../connect.php" ;
 

$photoid  = filterRequest("id");
$detail   = filterRequest("detail");
$imagename = filterRequest("imagename");


//change image
if(isset($_FILES['file'])){
    deleteFile("../upload" , $imagename) ;
    $imagename = imageUpload("file") ;
    
}


$stmt =$con->prepare("UPDATE `photos` SET
 `photo_detail` = ? , photo_image = ?   WHERE photo_id = ?

 ");

 $stmt ->execute(array($detail ,$imagename, $photoid));

 $count =$stmt-> rowCount();
if($count > 0){
    echo json_encode(array("status" => "success")) ; 
}else {
    echo json_encode(array("status"=>"failed")) ;
}

?>