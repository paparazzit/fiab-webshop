<?php 
function isLogged(){
    if(isset($_SESSION['id'])){
        return true;
    }else{
        return false;
    }
}

// GET USER BY EMAIL

function getUserByEmail($email){
    global $pdo;
    $stmt = $pdo-> prepare('SELECT * FROM users WHERE email = ?');
    $stmt-> execute([$email]);
    $totalUsers = $stmt->rowCount();
    return $totalUsers;
}
function dd($data){

    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}



// RESET PASSWORD
function resetPassword($email){

    $user = getUserByEmail($email);
   

 
    if($user<1){
        return false;
    }
    checkToken($email);
    $resetInfo = insertToken($email);
    
    if($resetInfo){

        $body = '';
        $url = "https://" . $_SERVER['SERVER_NAME'] . '/resetPasswordForm.php' .'?selector=' . $resetInfo['selector'] . '&token='. bin2hex($resetInfo['token']) . '">Reset Link</a>';
        $from ='no_reply@reset.com';
        $body.= "From: kanc@srdjansrdjanov.info" ;
        $body.= "Email: "  ;
        $body.= "Message: PASSWORD RESET URL: ". $url  ;
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        
        $headers .= 'From: '.$from."\r\n".
        'Reply-To: '.$from ;
        
        mail($email, "PASSWORD VERIFICATION", $body, $headers);
        return true;

     
    }
  
}

function checkToken($email){

if(!$email){
    exit();
}else{
    global $pdo;
    $stmt = $pdo->prepare('DELETE FROM pwdReset  WHERE pwdResetEmail = ? ');
    $stmt ->execute([$email]);
    return true;
}
}

function insertToken($email){
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);
    $expires = date('U') + 60 * 20;
    $hash_token  = password_hash($token, PASSWORD_DEFAULT);
    global $pdo;
    $stmt = $pdo->prepare('INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES(?,?,?,?)');
    $stmt ->execute([$email, $selector, $hash_token, $expires]);
    $pdo=null;

    $reset_info = array(
        'selector' => $selector,
        'token' => $token,
    );
    return $reset_info;
  
}


function checkResetInfo($selector, $token){
    global $pdo;
    $stmt= $pdo -> prepare('SELECT * FROM pwdReset WHERE pwdResetSelector = ?');
    $stmt->execute([$selector]);
    $resetValid = $stmt->fetch();

    if($resetValid->pwdResetExpires >= date('U')){
        return $resetValid->pwdResetEmail;
    }else{
        header('Location: index.php');
        // UBACINEKI ERROR handling (da prikaze info da je token istekao )

    }

}

function changeUserPass($email, $pass_hashed){
 global $pdo;
 $stmt= $pdo->prepare('UPDATE users SET password = ?, updated_at = NOW() WHERE email=?');
 $stmt->execute([$pass_hashed, $email]);

 if($stmt->rowCount()){
    checkToken($email);
    return true;
 }else{
    return false;
 }
}


// REGISTER USER

function registerUser($name, $email, $password){
    global $pdo;
  
    $stmt = $pdo -> prepare("INSERT INTO users (name, email, password) VALUES(?, ?,?)");
    $stmt-> execute([$name, $email, $password]);
    
    return 'success';

}

function checkUserEmail($email){
    global $pdo; 
    $stmt = $pdo -> prepare('SELECT * FROM users WHERE email =?');
    $stmt -> execute([$email]);
    $totalUsers = $stmt -> rowCount();
    return $totalUsers;
}

function loginUser($email, $password, $remember){
  $userPassword = getUserPassword($email);



if(password_verify($password, $userPassword->password)){
  
    global $pdo ;
    $stmt = $pdo ->prepare('SELECT * FROM users WHERE password =?');
    $stmt->execute([$userPassword->password]);
    $user = $stmt->fetch();
    $_SESSION['id'] = $user->id;
    $_SESSION['userName'] = $user->name;

 
    if(!$remember){
        setcookie('userId' , "", [
            'expires' => - 300,
            'samesite' =>'strict',
        ]);
    }else{
        setcookie('userId' , base64_encode("hashIt".$user->id), [
            'expires' => time() + 60*60*24*31,
            // 'path' => '/',
            // 'domain' => '',
            // 'secure' => true,
            // 'httponly' => true,
            'samesite' =>'strict',
            
        
            
        ]);
       
      
     
    }
    return 'success';
}else{
    return "Password or Email is incorrect";
}
}

function cookie_set(){
    if(isset($_COOKIE['userId'])){
        return true;
    }else{
        return false;
    }
    }
    
    function login_cookie($id){
        if(!isset($id)){
            return;
        }
        
        $decriptCookie = base64_decode($id);
        $userId = explode('hashIt', $decriptCookie);
    
        $_SESSION['id'] = $userId[1];
       
        header('Location:users/home.php');
    }
    

function getUserPassword($email){
    global $pdo;
    $stmt = $pdo -> prepare('SELECT password from users WHERE email = ?');
    $stmt-> execute([$email]);
    $userPassword = $stmt->fetch();
    $numRows = $stmt ->rowCount();
    
    if($numRows === 0 ){
       $userPassword = new StdClass();
       $userPassword->password = false;
       return $userPassword;
    }else{
        return $userPassword;
    }

    
    
}


// GET USERS

function getUser($id){
    global $pdo;
    $stmt = $pdo -> prepare('SELECT * from users WHERE id = ?');
    $stmt-> execute([$id]);
   
    $user = $stmt->fetch();

    return $user;
}

// GET ALL USERS

function getAllUsers(){
    global $pdo;
    $stmt = $pdo->prepare ('SELECT * FROM users');
    $stmt->execute();
    $allUsers= $stmt->fetchAll();
    return $allUsers;
}

// change USER
function changeUserRole($role, $id){
    global $pdo;
    $stmt= $pdo->prepare('UPDATE users SET role = ?, updated_at = NOW() WHERE id=?');
    $stmt->execute([$role, $id]);
    return $stmt->rowCount();

}
function changeUserName($name, $id){
    global $pdo;
    $stmt= $pdo->prepare('UPDATE users SET name = ?, updated_at = NOW() WHERE id=?');
    $stmt->execute([$name, $id]);
    return $stmt->rowCount();

}
function changeUserEmail($userEmail, $id){
    global $pdo;
    $stmt= $pdo->prepare('UPDATE users SET email = ?, updated_at = NOW() WHERE id=?');
    $stmt->execute([$userEmail, $id]);
    return $stmt->rowCount();
}

function updateUserPass( $newPass, $userId){
    global $pdo;
    $stmt= $pdo->prepare('UPDATE users SET password = ?, updated_at = NOW() WHERE id=?');
    $stmt->execute([$newPass, $userId]);
    return $stmt->rowCount();
}
function deleteUser($userId){
    global $pdo;
    $stmt= $pdo->prepare('DELETE  FROM users  WHERE id = ?');
    $stmt->execute([$userId]);
    return $stmt->rowCount();
}

