<?php 
require 'backend/core/init.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);
    // $emailValid = false;
    // $foxMail = '@foxinabox';

    // if(str_contains($email, $foxMail)){
    //    $emailValid= true;
     
    // }else{
    //    $emailValid = false;
    // }

    

    if(checkUserEmail($email) >= 1 ){
        echo 'Email Already taken';
        return;
    }
    else{
        // if(!$emailValid){
        //     echo 'Email is Not Valid';
        //     return;
        // }
        echo registerUser($name, $email, $password_hashed) ;
        return;
    }


}else{
    echo 'request denied';
}

?>