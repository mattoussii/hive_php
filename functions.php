<?php

//bite 1024*1024
define('MB' , 1048576) ;



//security//
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

   if($imagesize > 2 * MB ){
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