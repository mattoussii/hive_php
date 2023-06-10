<?php

include "../connect.php" ;
 
$name     = filterRequest("name");
$email    = filterRequest("email");
$feedback = filterRequest("feedback");
$userid   = filterRequest("id");


    $stmt =$con->prepare("
    INSERT INTO `contact`( `contact-name`, `contact-email`, `contact_feedback`,`contact_user`)
    VALUES ( ? , ? , ? , ? )
    ");

    $stmt ->execute(array( $name , $email , $feedback , $userid ));

    $count =$stmt-> rowCount();
    
    if($count > 0){
        echo json_encode(array("status" => "success")) ; 
    }else {
        echo json_encode(array("status"=>"failed")) ;
    }





?>