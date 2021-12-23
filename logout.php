<?php
    include "header.php";
    include "db_connection.php";
    session_unset();
    session_destroy();
    $_SESSION['loginstatus']=false;
    header("Location:login.php");
    include "footer.php";
?>