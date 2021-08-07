
<?php include("navbar2.php"); ?>
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
<form action="kat.php" method="post">
    <p>Emri i kategorise</p>
    <input type = "text" name="em_kat" size="98" maxlength="150" />
    <p>Pershkrimi</p>
    <input type = "text" name="pershk" size="98" maxlength="200" />
    <input type="hidden" name="cid" value="<?php echo $cid; ?>" />
    <input type = "submit" name="dergo_tem" value="Shto kategori" />
    
    </form> 
   
    </body>
</html>
<?php
 
    session_start();
    if($_SESSION['perdorues'] == ""){
        header("Location: faqjaadmin.php");
        exit();
    }

    if(isset($_POST['dergo_tem'])){

        if(($_POST['em_kat'] == "") && ($_POST['pershk'] == "") ){

            echo "Ju duhet te plotesoni te dyja fushat";
            exit();
        }
    
    else{
        include_once("connect.php");
        $cid = $_POST['cid'];
        $emri = $_POST['em_kat'];
        $pershkrimi = $_POST['pershk'];
        $krijuesi = $_SESSION['id'];

        $sql = "INSERT INTO kategori ( emri_kat, pershkrimi, data, p_ifundit)
        VALUES ('".$emri."', '".$pershkrimi."', now(), '".$krijuesi."') ";
        $res = mysqli_query($conn, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
      

       
        if (($res) ) {
            header("Location: faqjaadmin.php");
        }else{
            echo "Tema nuk u krijua";
        }
       }
    mysqli_close($conn);
    }
?>