<?php 
require '../backend/core/init.php';


if(!isLogged()){
    Header('Location:' . $index_link) ;   
}

if($_SERVER['REQUEST_METHOD'] ==='POST' ){

   
$userId = filter_var($_POST['id'], FILTER_SANITIZE_STRING);
$userName =filter_var( $_POST['name'], FILTER_SANITIZE_STRING);



$currentUser = getUser($_SESSION['id']);

if($currentUser->role === 'admin'){
    $link = $headerLink.'users/editUser.php?userId='.$userId;
}
elseif($currentUser->role === 'guest'){
    $link = $headerLink.'users/userProfile.php';
}


if(changeUserName($userName, $userId) ===1){
    Header('Location:' . $link) ; 
    
} 

}
?>