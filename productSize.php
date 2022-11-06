<?php

    include("db.php");
    session_start();

    $sql = "SELECT * FROM `stock` WHERE `size` = '{$_GET['size']}'";

    $result = mysqli_query($conn, $sql);
    echo mysqli_error($conn);

    $rowProId = mysqli_fetch_assoc($result);

    //$_SESSION['maxSize'] = $rowProId['available'];

    echo $rowProId['available'];
?>