<?php 
require '../backend/core/init.php';

if(!isLogged()){
    Header('Location:' . $index_link) ; 
}

if($_SERVER['REQUEST_METHOD'] ==='POST'){
$userId = filter_var($_POST['id'], FILTER_SANITIZE_STRING);
$userRole =filter_var( $_POST['role'], FILTER_SANITIZE_STRING);

if(changeUserROle($userRole, $userId) ===1){
    Header('Location:'.$headerLink.'/users/editUser.php?userId='.$userId);
} 

}
?>