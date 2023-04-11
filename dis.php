<?php
include ('db.php');
$stmt = $conn->prepare("SELECT image FROM images ORDER BY id DESC");
$stmt->execute();
$stmt->bindColumn(1, $img, PDO::PARAM_LOB);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slider</title>
    <style>
        img {
            width: 50%;
            height: 50%;
           
        }
    </style>
</head>
<body>
    <div class="slider-container">
        <?php while($stmt->fetch()): ?>
            <div class="slide">
                <img src="data:image/jpeg;base64,<?=base64_encode($img)?>" alt="slide">
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
