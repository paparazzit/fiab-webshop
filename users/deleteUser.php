<?php 
require '../backend/core/init.php';

if(!isLogged()){
    Header('Location:' . $index_link) ;   
}

if($_SERVER['REQUEST_METHOD'] ==='GET'){
$userId = filter_var($_GET['userId'], FILTER_SANITIZE_STRING);



if(deleteUser($userId) ===1){
    header('Location:' . $headerLink .'users/allUsers.php');
} 

}
?>