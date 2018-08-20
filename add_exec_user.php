<?php
include("lib_db.php"); 
include("checklogin.php"); 
$user = checkLoggedUser(); 
//nho sua lai ten db trong file lib_db.php dong 12
//print_r($_REQUEST);exit();
//get input

// $img_gv = isset($_REQUEST["img_gv"])?$_REQUEST["img_gv"]:""; 

$name = isset($_REQUEST["name"])?$_REQUEST["name"]:""; 
$username = isset($_REQUEST["username"])?$_REQUEST["username"]:""; 
$password = isset($_REQUEST["password"])?$_REQUEST["password"]:""; 
$type = isset($_REQUEST["type"])?$_REQUEST["type"]:""; 

//tao sql
$sql = "INSERT INTO user (`name`, `username`, `password`,`type`) "; 
$sql .= " VALUES ("; 
$sql .= "'{$name}', "; 
$sql .= "'{$username}', ";
$sql .= " '{$password}', "; 
$sql .= " '{$type}' ";
$sql .= ")"; 
//echo "sql=[$sql]"; exit();
//Thuc thi sql
$ret = exec_update($sql); 
header("Location:admin.php"); 
exit(); 
?>