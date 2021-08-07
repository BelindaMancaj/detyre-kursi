<?php include("navbar2.php");?>
<?php
    session_start();
    if($_SESSION['perdorues']){
        if(isset($_POST['dergo_pergj'])){
            include_once("connect.php");
            $krijuesi = $_SESSION['perdorues'];
            $cid = $_POST['cid'];
            $tid = $_POST['tid'];
            $pergj = $_POST['permba_pergj'];
            $pergj = @$row['nr_pergj'];
            $pergj_tani = $pergj + 1;
            
         //krijohet pergjigja ne db

            $sql = "INSERT INTO postime (id_kategori, id_postimit, krijuesi_postit, permbajtja_p, data_postimit)
            VALUES ('".$cid."', '".$tid."', '".$krijuesi."', '".$pergj."', now())";
            $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            $sql2 = "UPDATE kategori SET data=now(), p_ifundit='".$krijuesi."' WHERE id_kat='".$cid."' LIMIT 1";
            $res2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
            $sql3 = "UPDATE tema SET data_pergjigjes=now(), perdoruesi_fundit='".$krijuesi."' WHERE id_tema='".$tid."' LIMIT 1 ";
            $res3 = mysqli_query($conn, $sql3) or die(mysqli_error($conn)); 

            $sql4 = "UPDATE tema SET nr_pergj= '".$pergj_tani."' 
             WHERE id_kategori='".$cid."' AND id_tema='".$tid."' LIMIT 1";
             $res4 = mysqli_query($conn, $sql4) or die (mysqli_error($conn));

        
            if(($res) && ($res2) && ($res3) && ($res4)){

              echo "<p>Pergjigja juaj u postua.</p>";

             }else{
                 echo "<p>Ju nuk mund te postoni. Provoni perseri</p>";
             }
    } else{
        exit();
                }
            }    else{
                exit();
            }
         include("footer2.php");
?>
