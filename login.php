<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="containerlogin">
        <div class="header" >
            <h1>Login</h1>
        </div>
        <?php 
session_start(); 
if(isset($_SESSION['error'])) {
    echo '<div class="errorfail">'.$_SESSION['error'].'</div>';
    unset($_SESSION['error']); 
} else if(isset($_SESSION['success'])) {
    echo '<div class="errorsuccess">'.$_SESSION['success'].'</div>';
    unset($_SESSION['success']); 
}
?>
        <form action="" method="post">
            
            <div class="inputarea">
                <label for="">Email</label>
                <input type="email" placeholder="enter email" name="email">
            </div>
            <div class="inputarea">
                <label for="">Password</label>
                <input type="password" placeholder="enter password" name="password">
            </div>
            <div class="inputarea">
                <a href="">Forgot password?</a>
            </div>
            <div class="buttonarea">
                <button type="submit" name="submit">Submit</button>
            </div>
            <div class="inputarea">
                <a href="index.php">Not have account?Register</a>
            </div>
        </form>
    </div>
    
</body>
</html>
<?php
session_start();
include ('db.php');

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($email)||empty($password))
	{
		$_SESSION['error'] = "All fields are required";
		header('Location: login.php');
		
	}
    
    $stmt = $conn->prepare("SELECT * FROM register WHERE email=:email");
    $stmt->bindParam(':email',$email);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $count = $stmt->rowCount();
    
    if($count > 0 && password_verify($password, $row['password'])){
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $row['name'];
        header('Location: home.php');
    }else{
        $_SESSION['error'] = "Invalid email or password!";
        header('Location: login.php');
        
    }
}
exit();
?>
