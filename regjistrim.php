<!DOCTYPE html>
<head>
    <title>Forum - Regjistrohu</title>
<script src="val.js"></script>
<link rel="stylesheet" href="FqKryesore.css">
<link rel="stylesheet" href="style2.css">
<style>
    form{
        margin-left: 500px;
    }
    h2{
        color: #00203FFF;
        margin-left: 30px;
        margin-top: 50px;
    }
    input[type=submit] {
        margin-left: 55px;
    margin-bottom: 70px;
    }
    </style>

</head>
<html>
    <?php include("navbar2.php"); ?>

<body onload='document.form1.email.focus()'>
<a href="regjsiadmin.php">Regjistrohu si admin</a>
    <form action = "faqjaadmin.php" name="form1" method = "POST">
    <h2>Form regjistrimi</h2>
    <label>Emri i perdoruesit:</label><br>
    <input type="text"  name="emri"><br>
    <label >Email:</label><br>
    <input type="email" id="email" name="email"><br>
    <label>Fjalekalimi:</label><br>
    <input type="password" id="pass" name="fjalekalimi"><br><br>
    <input type="submit" name="shto" value = "Regjistrohu" onclick="ValidateEmail(document.form1.email); CheckPassword(document.form1.text1)" ><br>
    
    </form>
    
    <script>
    if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
 </script>
</body>
</html>
<?php
    require('connect.php');

        if(isset($_POST['shto'])){
            $emri = $_POST['emri'];
            $email = $_POST['email'];
            $fjalekalimi = $_POST['fjalekalimi'];
            $newp = md5($fjalekalimi);

            $sql = "INSERT INTO student (emri, email, fjalekalimi)
        VALUES ('$emri', '$email', '$newp')";

        if (mysqli_query($conn, $sql)) {
        echo " Ju u regjistruat me sukses! ";
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    
        mysqli_close($conn);
?>                                                          
<?php
        include("footer2.php");
?>