<?php
    session_start();
    $_SESSION["estado"] = "0";
    header("Location: ../loginClient.php");
?>