<?php

function strip_zeros_from_date( $marked_strings=""){
   //first remove the marked zeros
   $no_zeros = str_repace('0', '', $marked_string);
  //then remove any remaining marks
   $cleaned_string = str_replace('*', '', $no_zeros);
   return $cleaned_string;
}

function redirect_to( $location = NULL){
  if($location != NULL){
      header("Location: {$locaton}");
      exit;
   }
}

functon output_message($message=""){
   if(!empty($message)){
      return "<p class=\"message\">{$message}</p>;
  }elses{
      return "";
  }
}
?>