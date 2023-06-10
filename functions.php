<?php

//bite 1024*1024
define('MB' , 1048576) ;



//input security//
function filterRequest($requestname){
   return htmlspecialchars(strip_tags($_POST[$requestname])) ;
}



function imageUpload( $imagRequest){

   global $msgError ;
   $imagename  = rand(1000 ,10000) .$_FILES[ $imagRequest]['name'] ;
   $imagetmp  = $_FILES[ $imagRequest]['tmp_name'] ;
   $imagesize  = $_FILES[ $imagRequest]['size'] ;
   $allowExt   = array("jpg" ,"png" , "gif" , "mp3","pdf") ;
   $strTOarray = explode("." , $imagename);
   $ext        = end($strTOarray) ;
   $ext        = strtolower($ext);

   if( !empty($imagename && !in_array( $ext , $allowExt ))){
      $msgError[] = "Ext" ;
   }

   if($imagesize > 10 * MB ){
      $msgError ="size" ;
   }
   if(empty($msgError)){

      move_uploaded_file($imagetmp , "../upload/".$imagename );
      return $imagename ;
   }else{
      return "fail" ;
   }

}





function deleteFile($dir , $imagename){
   if(file_exists($dir."/" . $imagename)){
      unlink($dir."/" . $imagename) ;
   }

    
  
}

 // protect api with authentification
 
function checkAuthenticate(){
   if (isset($_SERVER['PHP_AUTH_USER'])  && isset($_SERVER['PHP_AUTH_PW'])) {
      if ($_SERVER['PHP_AUTH_USER'] != "aymen mattoussi" ||  $_SERVER['PHP_AUTH_PW'] != "123456"){
         header('WWW-Authenticate: Basic realm="My Realm"');
         header('HTTP/1.0 401 Unauthorized');
         echo 'Page Not Found';
         exit;
      }
   } else {
      exit;
   }
}