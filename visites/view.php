<?php

include "../connect.php" ;
 
$userid    = filterRequest("id");


$stmt =$con->prepare("SELECT * FROM visites WHERE `visite_user` = ? ");

 $stmt ->execute(array($userid)) ;

$data = $stmt->fetch(PDO::FETCH_ASSOC);

 $count =$stmt-> rowCount();
if($count > 0){
    echo json_encode(array("status" => "success" , "data" => $data)) ; 
}else {
    echo json_encode(array("status"=>"failed")) ;
}

?>