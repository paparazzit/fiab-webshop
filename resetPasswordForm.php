<?php 
require 'backend/core/init.php';

if($_SERVER['REQUEST_METHOD'] === 'GET'){


    $selector = $_GET['selector'];
    $token = $_GET['token'];

    if(empty($selector) || empty($token)){
        header('Location:index.php');
        exit();
    }

    else{
    
        if(ctype_xdigit($selector) !== false && ctype_xdigit($token) !== false){
            global $reset_email;
             $reset_email = checkResetInfo($selector, $token);
            
             
         }else{
             echo "NOT VALID sdfsdfsd";
         }

    }
    require 'views/resetPassword.view.php';
}
if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $pass = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $pass_con = filter_var($_POST['pass-con'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['reset_email'], FILTER_SANITIZE_EMAIL);
    
    if($pass !== $pass_con){
        echo 'PASS ERORR';
        return;
    }else{
        $pass_hashed = password_hash($pass, PASSWORD_DEFAULT);

        $changeUserPass = changeUserPass($email, $pass_hashed);
      
        if($changeUserPass){
           
          echo'ok';
          return;
            
        }else{
            echo 'Password isNOT Changed';
            return;
        }

    }
}


?>