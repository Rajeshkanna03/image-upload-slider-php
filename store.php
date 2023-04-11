<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Document</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="image"/>
        <input type="submit" name="submit" value="UPLOAD"/>
        <a href="dis.php">Click to view images</a>
    </form>
</body>
</html>
<?php
include ('db.php');
if(isset($_POST["submit"])){
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContent = fopen($image, 'rb');
        
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);

        // Move the uploaded file to the specified directory
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

        $dataTime = date("Y-m-d H:i:s");
        $stmt = $conn->prepare("INSERT into images (image, createdon) VALUES (?, ?)");
        $stmt->bindParam(1, $imgContent, PDO::PARAM_LOB);
        $stmt->bindParam(2, $dataTime);
        $stmt->execute();

        if($stmt){
            echo "File uploaded successfully.";
        }else{
            echo "File upload failed, please try again.";
        } 
    }else{
        echo "error in upload file";
    }
}else{
    echo "Please select an image file to upload.";
}
}
?>



