<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <script src="index.js"></script>
    <title>home</title>
</head>
<body>
    <nav >
    <div class="homepage">
        <h1>Hello,user</h1>
    </div>
        <div class="menu">
            <ul>
                <li><a href="myprofile.html">Profile</a></li>
                <li><a href="store.php">Files</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="logout.html">Logout</a></li>
            </ul>
        </div>
</nav>
<div class="slideshow-container">
    <div class="mySlides fade">
      <div class="numbertext">1 / 3</div>
      <img src="image.jpeg" >
      <div class="text">kajal</div>
    </div>
    <div class="mySlides fade">
      <div class="numbertext">2 / 3</div>
      <img src="download.jpeg">
      <div class="text">vani</div>
    </div>
    <div class="mySlides fade">
      <div class="numbertext">3 / 3</div>
      <img src="images.jpeg">
      <div class="text">nayan</div>
    </div>
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  </div>
  <br>
  <div class="dotclass" >
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
  </div>
</body>
</html>