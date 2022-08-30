<?php 
require 'backend/core/init.php';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email =filter_var( $_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST['pass'], FILTER_SANITIZE_EMAIL);
    $remember = filter_var($_POST['remember'], FILTER_SANITIZE_STRING);

 
    
    if(isset($email) && isset($password)){
        
        $user = loginUser($email, $password, $remember);
        $loggedIn = (object) array('loggedIn'=> $user, 'remember'=> $remember);
    }
    
    
    if(!isLogged()){
        echo $user ;
        
    }else{

      
     
        echo json_encode($loggedIn);
       
    }

   
}






