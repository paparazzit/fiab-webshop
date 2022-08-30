<?php 
require '../backend/core/init.php';
if(!isLogged()){
    Header('Location:' . $index_link) ;   
}
$user = getUser($_SESSION['id']);


if(isset($_GET['userId']) && $user->role === 'admin'){

    $userId = $_GET['userId'];
    $singleUser = getUser($userId);

    include 'views/editUser.view.php';
}

else{
    Header('Location:'. $index_link) ; 
}

?>




