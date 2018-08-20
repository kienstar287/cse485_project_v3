<?php
include("lib_db.php");
include("checklogin.php");
$user = checkLoggedUser();
//nho sua lai ten db trong file lib_db.php dong 12
//print_r($_REQUEST);exit();
//get input

$id_mh = isset($_REQUEST["id"]) ? $_REQUEST["id"] : 0;
$ten_mh = isset($_REQUEST["ten_mh"])?$_REQUEST["ten_mh"]:""; 
$thongtin = isset($_REQUEST["thongtin"])?$_REQUEST["thongtin"]:""; 

$ten_gv = isset($_REQUEST["ten_gv"])?$_REQUEST["ten_gv"]:""; 
$sql ="select * from monhoc";
    $sql .=" where id=$id_mh";
    $monhoc = exec_select($sql);


//tao sql
$sql = "UPDATE monhoc"; 
$sql .= " set "; 

$sql .= "ten_mh='{$ten_mh}', "; 
$sql .= " thongtin='{$thongtin}', "; 
$sql .= "ten_gv='{$ten_gv}'"; 
$sql .= "where id_mh={$id_mh}";
//echo "sql=[$sql]"; exit();
//Thuc thi sql
// var_dump($sql);
$ret = exec_update($sql);
header("Location:admin.php");
exit();

