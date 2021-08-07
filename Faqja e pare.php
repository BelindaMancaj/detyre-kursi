<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow */
.slideshow-container {
  max-width: 800px;
  position: relative;
  margin: auto;
  padding-top:50px;
}
/* Numri i imazhit*/
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* Pikat/indikatoret e pozicionit */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}


 
}
.b {
       margin-left: 620px;
       margin-top: 40px;
       margin-bottom: 20px;
    display:block;
    width:100px;
    height:80px;
    line-height:80px;
    border: 4px solid linear-gradient(to bottom,rgba(22, 187, 110, 0.788), rgba(239, 237, 241, 0.973));
    border-radius: 25px;
    color: WHITE;
    text-align:center;
    text-decoration:none;
    background: linear-gradient(60deg,#1b2025 0%, #4f5f70 100%);
    box-shadow: 0 0 6px gray;
    font-size:20px;
    font-weight:bold;
}
.b:hover {
    background: #046158;

}
 .njoftim{
   color: black;
   display: block;
    padding: 5px 10px 10px 10px;
    border: 1px solid white;
    border-radius: 2px;
    margin-bottom: 10px;
    margin-left: 300px;
    margin-right: 300px;
    background-color: white;
    color: #046158;
    text-decoration: none;
    font-weight: bolder;
 }


</style>
</head>
<body>
<?php include_once("navbar.php"); ?>
<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="https://12vite.com/wp-content/uploads/2018/06/Faculty-of-Mechanical-Tirana.jpeg" style="width:100%">
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="https://lh3.googleusercontent.com/proxy/2K8JnOyBXz9bYOxYu6gaIFT7OCbuq0bTk_pvHBE4b5wCzQ3ZK7HjybweNul-3YAcFdlR72ycfrouSupzgASYGkCTeuA-c8k" style="width:100%">
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="https://pcworld.al/wp-content/uploads/2018/06/34743699_1656075951140808_6451727862905962496_o.jpg" style="width:100%">
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 4000); // Ndryshon imazhin cdo 4 sec
}
</script>

<a href="shtonjoftime.php" class="b">Njoftime+</a>
  

    
    <div id = "permban">
<?php

    include("connect.php");
    
    

    $sql = "SELECT * FROM njoftime ORDER BY emri_njoftim ASC";
    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $kategori = "";
    if(mysqli_num_rows($res) > 0){
        while ($row = mysqli_fetch_assoc($res)){

            $id = $row['id'];
            $titulli = $row['emri_njoftim'];
            $pershkrim = $row['permbajtja'];
            $kategori .= "<a href='#' class='njoftim'>".$titulli."<font size='-1'><br>".$pershkrim."</font></a>";
        }
        echo $kategori;
    }
    else{
        echo "<p> Nuk jane krijuar ende njoftime.</p>";
    }
    mysqli_close($conn);
    include("footer.php");

?>

</body>
</html> 