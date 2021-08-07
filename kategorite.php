<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kategorite - Temat</title>
    <link rel="stylesheet" href="style2.css">
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
<?php include("navbar2.php"); ?>
  
     </body>
</html>

    <div class = "permban" id = "permban">
<?php
        //Shfaq emrat e temave, numri e pergj., shikimeve dhe krijuesit e tyre
    include_once("connect.php");    
    $cid = @$_GET['cid'];
    $temat = "";
    $logged = "";

    if(isset($_SESSION['id'])){
        
        echo " <br><br><a class='kateg' href='krijo_kategori.php?cid=".$cid."'>
        Kliko per te krijuar nje teme + </a><br><br>";
    }else{

      echo  " <p>  Duhet te logoheni per te krijuar tema !<p> ";
    }

    $sql = "SELECT id_kat FROM kategori WHERE id_kat='".$cid."' LIMIT 1";
    $res = mysqli_query($conn,$sql);
    if(mysqli_num_rows($res) == 1){

        $sql2 = "SELECT * FROM tema WHERE id_kategori='".$cid."' ORDER BY data_pergjigjes DESC";
        $res2 = mysqli_query($conn,$sql2);
         if(mysqli_num_rows($res2) > 0){

            $temat .= "<table width='100%' style='border-collapse: collapse;'>";
            $temat .= "<tr><td colspan='3'><a href='faqja.php' style='color:#00203FFF;'> << Kthehu te faqja kryesore</a>".$logged."<hr /></td></tr>";
            $temat .= "<tr style='background-color: #dddddd; font-size:large;'><td>Tema</td><td width='65' align='center'>Pergjigje</td>
            <td width='65' align='center'> Shikime</td></tr>";
            $temat .= "<tr><td colspan='3'><hr /></td></tr>";
            while ($row = mysqli_fetch_assoc($res2)){

                $tid = $row['id_tema'];
                $title = $row['emri_temes'];
                $shikime = $row['t_views'];
                $pergjigje = $row['nr_pergj'];
                $data = $row['date_temes'];
                $krijuesi = $row['emri'];
                $temat .= "<tr><td><a style='color:#00203FFF;' href='temat.php?cid=".$cid."&tid=".$tid."'>".$title."</a><br/><span class='post'>
                Postuar nga: ".$krijuesi." ne ".$data."</span></td><td align='center'>".$pergjigje."</td><td align='center'>".$shikime."</td></tr>";
                $temat .= "<tr><td colspan='3'><hr/></td></tr>";
            
            }
              $temat .="</table>";
                echo "$temat";
         }
         else{
            echo "<a href='faqja.php' class= 'kateg'> << Kthehu te faqja kryesore </a><hr/>";
            echo "<p> Kjo kategori nuk ka ende tema.</p>";
         }
    }else{
        echo "<a href='faqja.php' class= 'kateg'><< Kthehu te faqja kryesore </a><hr/>";
        echo "<p> Kjo kategori nuk ekziston !</p>";
    }
    ?>
     <?php include("footer2.php"); ?>
     </div>