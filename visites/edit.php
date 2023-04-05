<?php

include "../connect.php" ;
 

$visiteid  = filterRequest("id");
$title     = filterRequest("title");
$content   = filterRequest("content");
$date      = filterRequest("date");
$imagename = filterRequest("imagename");



//change image
if(isset($_FILES['file'])){
    deleteFile("../upload" , $imagename) ;
    $imagename = imageUpload("file") ;
    
}



$stmt =$con->prepare("UPDATE `visites` SET
 `visite_title` = ? ,`visite_content`= ? ,`visite_date`= ? , visite_image = ?  WHERE visite_id = ?

 ");

 $stmt ->execute(array( $title, $content, $date ,$imagename, $visiteid));

 $count =$stmt-> rowCount();
if($count > 0){
    echo json_encode(array("status" => "success")) ; 
}else {
    echo json_encode(array("status"=>"failed")) ;
}

?>