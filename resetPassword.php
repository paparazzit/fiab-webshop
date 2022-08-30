<?php 
require "backend/core/init.php";

if($_SERVER['REQUEST_METHOD']=== 'POST'){

    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
   //  $emailValid = false;
   //  $foxMail = '@foxinabox';

   //  if(str_contains($email, $foxMail)){
   //      $emailValid= true;
     
        
   //   }else{
   //      $emailValid = false;
   //   }

   //   if(!$emailValid){
   //      echo 'Email is Not Valid ' . $email;
   //      return;
   //   }else{
   //          $resetPass = resetPassword($email);
   //       }
        




   $resetPass = resetPassword($email);
     if(!$resetPass){
        echo 'Email not found';
        return;
     }else{
        echo 'Reset email sent to: ' . $email . '::' . $resetPass;
     
        return;
     }
    return;
}else{
   header('Location:'.$index_link);
}


?>