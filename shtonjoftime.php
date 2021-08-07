
<?php include("navbar.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Faqja kryesore</title>
    
    <link rel="stylesheet" href="FqKryesore.css">
    <title> FAKULTETI I TEKNOLOGJISË SË INFORMACIONIT </title>
<link rel="stylesheet" type="text/css" href="nav.css">
    <script src="val.js"></script>
    
</head>
<body>
<form action="shtonjoftime.php" method="post">
    <p>Titulli i njoftimit</p>
    <input type = "text" name="em_kat" size="98" maxlength="150" />
    <p>Permbajtja</p>
    <input type = "text" name="pershk" size="98" maxlength="200" />
    <input type="hidden" name="cid" value="<?php echo $cid; ?>" />
    <input type = "submit" name="dergo_tem" value="Shto njoftim te ri" />
    
    </form> 
   
    </body>
</html>
<?php
 
    session_start();
    if($_SESSION['perdorues'] == ""){
        header("Location: Faqja e pare.php");
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

        $sql = "INSERT INTO njoftime ( emri_njoftim, permbajtja, data)
        VALUES ('".$emri."', '".$pershkrimi."', now()) ";
        $res = mysqli_query($conn, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
      

       
        if (($res) ) {
            header("Location: Faqja e pare.php");
        }else{
            echo "Tema nuk u krijua";
        }
       }
    mysqli_close($conn);
    }
?>