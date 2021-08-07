<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kategorite - Temat</title>
    <link rel="stylesheet" href="style.css">
    <style>
     
     .kateg{
         margin-top: 2000px;
         margin-bottom: 2000px;
         padding: 5px 5px 5px 5px;
         background-color: #ddddee;
         border-radius: 5px ;
         border: 1px solid black;
         color: white;
         text-align: center; 
     }
   
    </style>
</head>
<body>
<?php include("navbar.php"); ?>
  
     </body>
</html>

    <div class = "permban" id = "permban">
<?php

    include_once("connect.php");    
   echo("link");
    ?>
     <?php include("footer.php"); ?>
     </div>