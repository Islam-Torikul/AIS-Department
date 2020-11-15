<?php
 function cheak_empty_fields($required_filds_array){
     $form_errors=array();
    
    foreach($required_filds_array as $name_of_field){
        if(!isset($_POST[$name_of_field])|| $_POST[$name_of_field]==NULL ){
           $form_errors[]=$name_of_field." is required"; 
        }
    }
     return $form_errors; 
 }
  function cheak_min_length($fields_to_cheak_length){
      $form_errors=array();
    
    foreach($fields_to_cheak_length as $name_of_field=>$minimun_length_required){
        if(strlen(trim($_POST[$name_of_field]))<$minimun_length_required){
           $form_errors[]=$name_of_field." this is too sort must be {$minimun_length_required} character"; 
        }
    }
     return  $form_errors;
  } 
function cheak_email($data)
{
     $form_errors=array();
    $key='email';
    if(array_key_exists($key,$data)){
        if($_POST[$key] !=NULL)
        {
            $key=filter_var($key,FILTER_SANITIZE_EMAIL);
            if(filter_var($_POST[$key],FILTER_VALIDATE_EMAIL)===false){
                $form_errors[]=$key." Is Not a Valid email address"; 
                
            }
        }
    }
    return $form_errors;;
}

?>