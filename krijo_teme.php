
<?php include("navbar2.php"); ?>
<?php
 
    session_start();
    if($_SESSION['perdorues'] == ""){
        header("Location: faqja.php");
        exit();
    }

    if(isset($_POST['dergo_tem'])){

        if(($_POST['titulli_tem'] == "") && ($_POST['permba_tem'] == "") ){

            echo "Ju duhet te plotesoni te dyja fushat";
            exit();
        }
    ///Krijon temat dhe pergjigjet per temat
    else{
        include_once("connect.php");
        //marrim te dhenat nga form i faqes krijo_kategori
        $cid = $_POST['cid'];
        $titull = $_POST['titulli_tem'];
        $permbajtja = $_POST['permba_tem'];
        $krijuesi = $_SESSION['id'];

        $sql = "INSERT INTO tema (id_kategori, emri_temes, krijuesi_t, date_temes, data_pergjigjes)
        VALUES ('".$cid."', '".$titull."', '".$krijuesi."', now(), now()) ";
        $res = mysqli_query($conn, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
        $tema_ere_id = mysqli_insert_id($conn);

        $sql2 = "INSERT INTO postime (id_kategori, id_postimit, krijuesi_postit, permbajtja_p, data_postimit)
        VALUES ('".$cid."', '".$tema_ere_id."', '".$krijuesi."', '".$permbajtja."', now())";
        $res2 = mysqli_query($conn, $sql2) or trigger_error("Query Failed! SQL: $sql2 - Error: ".mysqli_error($conn), E_USER_ERROR);
    
        $sql3 = "UPDATE kategori SET data = now(), p_ifundit='".$krijuesi."' WHERE id_kat='".$cid."' LIMIT 1";
        $res3 = mysqli_query($conn, $sql3) or trigger_error("Query Failed! SQL: $sql3 - Error: ".mysqli_error($conn), E_USER_ERROR);
         
         if(($res) && ($res2) && ($res3)){

            header("Location: temat.php?cid=".$cid."&tid=".$tema_ere_id);
         }else{
             echo "Tema nuk u krijua";
         }
        }
    }


?>