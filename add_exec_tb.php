<?php
include("lib_db.php"); 
include("checklogin.php"); 
$user = checkLoggedUser(); 
//nho sua lai ten db trong file lib_db.php dong 12
//print_r($_REQUEST);exit();
//get input

// $img_gv = isset($_REQUEST["img_gv"])?$_REQUEST["img_gv"]:""; 

$ten_tb = isset($_REQUEST["ten_tb"])?$_REQUEST["ten_tb"]:""; 
$noidung = isset($_REQUEST["noidung"])?$_REQUEST["noidung"]:""; 
$tacgia = isset($_REQUEST["tacgia"])?$_REQUEST["tacgia"]:""; 

//tao sql
$sql = "INSERT INTO thongbao (`ten_tb`, `noidung`, `tacgia`) "; 
$sql .= " VALUES ("; 
$sql .= "'{$ten_tb}', "; 
$sql .= "'{$noidung}', ";
$sql .= " '{$tacgia}' "; 
$sql .= ")"; 
//echo "sql=[$sql]"; exit();
//Thuc thi sql
$ret = exec_update($sql); 
header("Location:admin.php"); 
exit(); 
?>