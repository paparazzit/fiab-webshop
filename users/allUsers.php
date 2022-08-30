<?php 
require '../backend/core/init.php';
if(!isLogged()){
    Header('Location:' . $index_link) ;   
}
$user = getUser($_SESSION['id']);
if($user->role !== 'admin'){
    header('Location:' . $index_link);
    
}

$allUsers = getAllUsers();


?>

<?php require 'views/allUsers.view.php'?>


