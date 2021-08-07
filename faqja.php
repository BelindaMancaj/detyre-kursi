<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Faqja kryesore</title>
           
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="FqKryesore.css">
    <script src="val.js"></script>
   
    
</head>
<body>
<?php include("navbar2.php");  ?>
      
    <div>
        <h3>Pershendetje, <b><?php echo htmlspecialchars($_SESSION["perdorues"]); ?></b> !</h3>
    </div>
  
    </body>
</html>
    
    <div id = "permban">
<?php

    include("connect.php");

    // Printon kategorite e forumit te faqja kryesore
    $sql = "SELECT * FROM kategori ORDER BY emri_kat ASC";
    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $kategori = "";
    if(mysqli_num_rows($res) > 0){
        while ($row = mysqli_fetch_assoc($res)){

            $id = $row['id_kat'];
            $titulli = $row['emri_kat'];
            $pershkrim = $row['pershkrimi'];
            $kategori .= "<a href='kategorite.php?cid=".$id."' class='link'>".$titulli."<font size='-1'><br>".$pershkrim."</font></a>";
        }
        echo $kategori;
    }
    else{
        echo "<p> Nuk jane krijuar ende kategori.</p>";
    }
    include("footer2.php");
?>

     </div>