<?php

$con=mysqli_connect('localhost','root','','zara');

function getAll($table)
{
    global $con;
    $query="SELECT * FROM $table";
    return $query_run=mysqli_query($con,$query);
}

function getID($table,$id)
{
    global $con;
    $query="SELECT * FROM $table WHERE id='$id'";
    return $query_run=mysqli_query($con,$query);

}

function redirect($url,$message)
{
    $_SESSION['$massage']=$message;
    header('Location: '.$url);
    exit();
}