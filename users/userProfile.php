<?php 
require '../backend/core/init.php';

if(!isLogged()){
    Header('Location:'.$baseLink.'?error=true') ;   
}
$user = getUser($_SESSION['id']);

include "views/userProfile.view.php";


?>
