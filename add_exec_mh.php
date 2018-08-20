<?php
include("lib_db.php"); 
include("checklogin.php"); 
$user = checkLoggedUser(); 

//print_r($_REQUEST);exit();
//get input

// $img_gv = isset($_REQUEST["img_gv"])?$_REQUEST["img_gv"]:""; 

$ten_mh = isset($_REQUEST["ten_mh"])?$_REQUEST["ten_mh"]:""; 
$thongtin = isset($_REQUEST["thongtin"])?$_REQUEST["thongtin"]:""; 
$ten_gv = isset($_REQUEST["ten_gv"])?$_REQUEST["ten_gv"]:""; 

//tao sql
$sql = "INSERT INTO monhoc (`ten_mh`, `thongtin`, `ten_gv`) "; 
$sql .= " VALUES ("; 
$sql .= "'{$ten_mh}', "; 
$sql .= "'{$thongtin}', ";
$sql .= " '{$ten_gv}' "; 
$sql .= ")"; 
//echo "sql=[$sql]"; exit();
//Thuc thi sql
$ret = exec_update($sql); 
header("Location:admin.php"); 
exit(); 
?>