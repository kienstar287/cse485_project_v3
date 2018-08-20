<?php
include("lib_db.php");
include("checklogin.php");
$user = checkLoggedUser();
//nho sua lai ten db trong file lib_db.php dong 12
//print_r($_REQUEST);exit();
//get input

$id_tb = isset($_REQUEST["id"]) ? $_REQUEST["id"] : 0;
$ten_tb = isset($_REQUEST["ten_tb"])?$_REQUEST["ten_tb"]:""; 
$noidung = isset($_REQUEST["noidung"])?$_REQUEST["noidung"]:""; 

$tacgia = isset($_REQUEST["tacgia"])?$_REQUEST["tacgia"]:""; 
$sql ="select * from thongbao";
    $sql .=" where id=$id_tb";
    $thongbao = exec_select($sql);


//tao sql
$sql = "UPDATE thongbao"; 
$sql .= " set "; 

$sql .= "ten_tb='{$ten_tb}', "; 
$sql .= " noidung='{$noidung}', "; 
$sql .= "tacgia='{$tacgia}'"; 
$sql .= "where id_tb={$id_tb}";
//echo "sql=[$sql]"; exit();
//Thuc thi sql
// var_dump($sql);
$ret = exec_update($sql);
header("Location:admin.php");
exit();

