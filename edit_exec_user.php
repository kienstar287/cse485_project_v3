<?php
include("lib_db.php");
include("checklogin.php");
$user = checkLoggedUser();
//nho sua lai ten db trong file lib_db.php dong 12
//print_r($_REQUEST);exit();
//get input

$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : 0;
$name = isset($_REQUEST["name"])?$_REQUEST["name"]:""; 
$username = isset($_REQUEST["username"])?$_REQUEST["username"]:""; 
$password = isset($_REQUEST["password"])?$_REQUEST["password"]:""; 
$type = isset($_REQUEST["type"])?$_REQUEST["type"]:""; 
$sql ="select * from user";
    $sql .=" where id=$id";
    $use = exec_select($sql);


//tao sql
$sql = "UPDATE user"; 
$sql .= " set "; 

$sql .= "name='{$name}', "; 
$sql .= "username='{$username}', "; 
$sql .= "password='{$password}',"; 
$sql .= "type='{$type}'"; 
$sql .= "where id={$id}";
//echo "sql=[$sql]"; exit();
//Thuc thi sql
// var_dump($sql);
$ret = exec_update($sql);
header("Location:admin.php");
exit();

