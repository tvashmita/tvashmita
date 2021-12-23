<?php
    $db = mysqli_connect("localhost","root","","php_crud_db");
    if(!$db){
        die("connection failed:" .mysqli_connect_error());
    }
?>