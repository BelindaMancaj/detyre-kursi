
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pergjigju</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="FqKryesore.css">
</head>
<?php
 session_start();
 include("navbar2.php");
?>

<?php
  ///Shfaq temat dhe pergjigjet per temat e caktuara
  include("connect.php");
  $cid = $_GET['cid'];
  $tid = $_GET['tid'];
  $sql = "SELECT * FROM tema WHERE id_kategori='".$cid."' AND id_tema='".$tid."' LIMIT 1";
  $res = mysqli_query($conn, $sql) or die (mysqli_error($conn));
  if(mysqli_num_rows($res) == 1){

     echo "<table width='100%'>";
       if($_SESSION['perdorues']) {echo "<tr><td colspan='2'><input type='submit' value='Pergjigju' onClick=\"window.location =
         'pergjigju.php?cid=".$cid."&tid=".$tid."'\"/><hr/>";}
         else{
             echo "<tr><td colspan='2'><p>Ju duhet te logoheni per te shtuar nje pergjigje.</p><hr/></td></tr>";
         }

         while($row = mysqli_fetch_assoc($res)){

            $sql2 = "SELECT * FROM postime WHERE id_kategori='".$cid."' AND id_postimit='".$tid."'"; //Shiko id e postimit te db
            $res2 = mysqli_query($conn, $sql2) or die (mysqli_error($conn));
             while($row2 = mysqli_fetch_assoc($res2)){

                echo "<tr><td valign='top' style='border: 2px solid #00203FFF; border-radius: 5px;'> <div style='min-height: 115px; color:#00203FFF;
                 font-size:large; margin-left:30px;'>".$row['emri_temes']."<br/> <span style=' font-size:small'>Postuar nga
                ".$row2['krijuesi_postit']." - ".$row2['data_postimit']." <form method='post' action='".fshitemat()."'>
                <input type='hidden' name='cid' value='".$row['cid']."' >
                <button type='submit' name='fshi'> Fshi</button>
                <button type='submit' name='fshi'> Edit</button>
                </form>
                <hr/></span>".$row2['permbajtja_p']."</div></td>";

             }

             $sh_mepara = $row['t_views'];   
             $sh_tani = $sh_mepara + 1;
            
             $sql3 = "UPDATE tema SET t_views='".$sh_tani."'
              WHERE id_kategori='".$cid."' AND id_tema='".$tid."' LIMIT 1";
             $res3 = mysqli_query($conn, $sql3) or die (mysqli_error($conn));

             
         }
                  echo "</table>";
  }
  else{
      echo "<p>Kjo teme nuk ekziston.</p>";
  }

?> </div>
  </div>

  <?php include("footer2.php"); ?>