<?php
    if( $_GET["a"]) {
        if($_GET["a"] == sql)
            header('Location: sqlInj.php');
        elseif ($_GET["a"] == xss) {
            header('Location: xss.php');
        }elseif ($_GET["a"] == ci) {
            header('Location: ci.php');
        }else{
            header('Location: ../');
        }
    }else{
        header('Location: ../');
    }
?>
