<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="container">
        <div class="header" >
            <h1>Register</h1>
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
                <label for="">Name</label>
                <input type="text" placeholder="enter name" name="username">
            </div>
            <div class="inputarea">
                <label for="">Email</label>
                <input type="email" placeholder="enter email" name="email">
            </div>
            <div class="inputarea">
                <label for="">Password</label>
                <input type="password" placeholder="enter password" name="password">
            </div>
            <div class="inputarea">
                <label for="">Confirm Password</label>
                <input type="password" placeholder="enter password" name="confirmpassword">
            </div>
            <div class="buttonarea">
                <button type="submit" name="submit">Submit</button>
            </div>
            <div class="inputarea">
                <a href="login.php">Already have account?Login</a>
            </div>
        </form>
    </div>
    
</body>
</html>
<?php
session_start();
include ('db.php');

if(isset($_POST['submit'])){
	$name = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$confirmpassword = $_POST['confirmpassword'];
     
	$stmt = $conn->prepare("SELECT * FROM register WHERE email=:email");
    $stmt->bindParam(':email',$email);
    $stmt->execute();
    $count = $stmt->fetchColumn();
    
    if(empty($name)||empty($email)||empty($password)||empty($confirmpassword))
	{
		$_SESSION['error'] = "All fields are required";
	}
    elseif($count > 0)
	 {
        $_SESSION['error'] = "Email already exists";
    } 
	elseif ($password != $confirmpassword)
	 {
        $_SESSION['error'] = "Password does not match.";
    }else{
	
    // $password = "my_password";
    $hashpassword= password_hash($password, PASSWORD_DEFAULT);
	$sql ="INSERT INTO register (name, email, password)
  VALUES ('$name','$email','$hashpassword')";
 
  $conn->exec($sql);
  $_SESSION['success'] = "Registeration success!";
	}
header('Location: index.php');
exit();

}

?>


