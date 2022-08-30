<?php 
require '../backend/core/init.php';

if(!isLogged()){
    Header('Location:/index.php') ;   
}

if($_SERVER['REQUEST_METHOD'] ==='POST'){
$userId = filter_var($_POST['id'], FILTER_SANITIZE_STRING);
$userEmail =filter_var( $_POST['email'], FILTER_SANITIZE_EMAIL);


$currentUser = getUser($_SESSION['id']);

if($currentUser->role === 'admin'){
    $link = '/users/editUser.php?userId='.$userId;
}
elseif($currentUser->role === 'guest'){
    $link = '/users/userProfile.php';
}
if(changeUserEmail($userEmail, $userId) ===1){
    Header('Location:'.$link);
} 

}
?>