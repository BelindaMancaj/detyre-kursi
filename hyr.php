<!DOCTYPE html>
<html>
<head>
   <title>Forum - Hyr</title>
<link rel="stylesheet" href="FqKryesore.css">
<link rel="stylesheet" href="style2.css">
<style>
#h{
      margin-left: 630px;
      margin-top: 200px;
      text-decoration: none;
      font-weight: bolder;
      color: #00203FFF;
   }
</style>
</head>
<body>
 <?php   include("navbar2.php"); ?>
    <form class="form" action = "" method = "POST">
       
    <label>Emri i perdoruesit:</label><br>
    <input type="text"  name="emri" required><br>
    <label>Fjalekalimi:</label><br>
    <input type="password" name="fjalekalimi" required><br><br>
    <input type="submit" name="hyr" value = "Hyr"><br>
    
    </form>
    <a id="h" href="hyradmin.php">>>Hyr si admin</a>

</body>
</html>
<?php
    session_start();
 
    include("connect.php");
  

   if(isset($_POST['hyr'])) {
      if(isset($_POST['emri']) && isset($_POST['fjalekalimi'])) {

      $id = mysqli_real_escape_string($conn,$_POST['id']);
      $emer = mysqli_real_escape_string($conn,$_POST['emri']);
      $fjalek = mysqli_real_escape_string($conn,$_POST['fjalekalimi']); 
      $new  = md5($fjalek);
      
      
      $sql = "SELECT * FROM student WHERE emri = '$emer'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result);
      $count = mysqli_num_rows($result);
      
      if($count == 1) {
          $_SESSION['perdorues'] = $emer;
          $_SESSION['id'] = $id;
         
         header("location: faqja.php");
      }else {
         echo "<p> Te dhenat tuaja jane te gabuara</p>";
      }
    
    }
 }include("footer2.php");
   mysqli_close($conn);
   
?>