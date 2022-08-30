<?php 

require '../backend/core/init.php';

if(!isLogged()){
    Header('Location:' . $baseLink) ;   
}

if($_SERVER['REQUEST_METHOD'] ==='POST'){
$currentPass = filter_var($_POST['oldPass'], FILTER_SANITIZE_STRING);
$newPass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
$userId = filter_var($_POST['userId'], FILTER_SANITIZE_STRING);
$user = getUser($userId);
$newPassHashed = password_hash($newPass, PASSWORD_DEFAULT);
$currentUser = getUser($_SESSION['id']);

if(!password_verify($currentPass, $user->password)){
    echo "Old password is not correct";
    return;
}else{

updateUserPass($newPassHashed, $user->id);
if($currentUser->role === 'admin'){
    echo 'admin';
    return;
}else{
    echo 'guest';
    return;
}

}


}
?>
