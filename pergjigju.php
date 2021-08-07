
<?php include("navbar2.php"); ?>
<?php
    session_start();
?>
<?php
   
   if((!isset($_SESSION['id'])) || ($_GET['cid']) == ""){
       header("Location: faqja.php");
       exit();
   }
   $cid = $_GET['cid'];
   $tid = $_GET['tid'];
?>

<div id = "permban">

<!DOCTYPE html>
<html lang="en">
<head>
  
    <title></title>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="FqKryesore.css">
</head>
<body>
   
  <div>
    <form action="postpergj.php" method="post">
    <p style="color:#00203FFF; font-size: larger; font-weight:bold;">Pergjigje:</p>
    <textarea name="permba_pergj" rows="5" cols="75"></textarea>
    <br/><br/>
    <input type="hidden" name="cid" value="<?php echo $cid; ?>" />
    <input type="hidden" name="tid" value="<?php echo $tid; ?>" />
    <input type = "submit" name="dergo_pergj" value="Posto pergjigjen"/>
    
    </form> 
  
   </div>

    
    </body>
</html>

<?php include("footer2.php"); ?>