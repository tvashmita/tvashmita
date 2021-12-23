<?php
if(!isset($_SESSION)){
    session_start();
}
include "header.php";
if($_SESSION['loginstatus'] == ""){
    header("location:login.php");
}
include "db_connection.php";
?>
<img src="images/welcome.jpg" class="rounded mx-auto d-block" alt="Responsive image"></img>
<?php
include "footer.php";
?>