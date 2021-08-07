<?php session_start()?>

<?php

    include_once("connect.php");    

   
    if((!isset($_SESSION['perdorues'])) || ($_GET['cid'] == "")){
        
       header("Location: faqja.php");
       exit();
      }
      $cid = $_GET['cid'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="FqKryesore.css">
    <style>
      p{
        font-size: large;
        color: #00203FFF;
      }

      form{
       margin-left: 30px;
      }
    </style>
</head>
<body>
<?php include("navbar.php"); ?>
    
  <div>
    <form action="krijo_teme.php" method="post">
    <p>Titulli i temes</p>
    <input type = "text" name="titulli_tem" size="98" maxlength="150" />
    <p>Permbajtja</p>
    <textarea name="permba_tem" rows="5" cols="75"></textarea>
    <br/><br/>
    <input type="hidden" name="cid" value="<?php echo $cid; ?>" />
    <input type = "submit" name="dergo_tem" value="Shto teme te re" />
    
    </form> 
  
  </div>

 <?php include("footer.php");?>
    </body>
</html>