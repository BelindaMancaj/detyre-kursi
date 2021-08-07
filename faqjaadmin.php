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
    <style>
   .round-button {
       margin-left: 620px;
       margin-top: 40px;
       margin-bottom: 20px;
    display:block;
    width:80px;
    height:80px;
    line-height:80px;
    border: 4px solid #00203FFF;
    border-radius: 50%;
    background: #00203FFF;
    color: #ADEFD1FF;
    
    text-align:center;
    text-decoration:none;
    
    box-shadow: 0 0 6px gray;
    font-size:20px;
    font-weight:bolder;
}
.round-button:hover {
    color:#00203FFF;
    background: #ADEFD1FF;
}
    </style>
</head>
<body>
<?php include("navbaradmin.php");  ?>
      
<a href="kat.php" class="round-button">+</a>
    </body>
</html>
    
    <div id = "permban">
<?php

    include("connect.php");
    
    

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
    mysqli_close($conn);
    include("footer2.php");

?>

     </div>