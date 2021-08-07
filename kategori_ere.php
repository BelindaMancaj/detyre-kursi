<?php session_start()?>

<?php

    include_once("connect.php");    

   
    if((!isset($_SESSION['perdorues'])) || ($_GET['cid'] == "")){
        
       header("Location: faqjaadmin.php");
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

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
  <div>
    <form action="kat.php" method="post">
    <p>Emri i kategorise</p>
    <input type = "text" name="em_kat" size="98" maxlength="150" />
    <p>Pershkrimi</p>
    <input type = "text" name="pershk" size="98" maxlength="200" />
    <input type="hidden" name="cid" value="<?php echo $cid; ?>" />
    <input type = "submit" name="dergo_tem" value="Shto kategori" />
    
    </form> 
  
  </div>
    </body>
</html>