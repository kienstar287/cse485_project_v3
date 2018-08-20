<?php
include("lib_db.php");
include("checklogin.php");
$user = checkLoggedUser();
//nho sua lai ten db trong file lib_db.php dong 12
//print_r($_REQUEST);exit();
//get input

$id_gv = isset($_REQUEST["id"]) ? $_REQUEST["id"] : 0;
$ten_gv = isset($_REQUEST["ten_gv"])?$_REQUEST["ten_gv"]:""; 
$monhoc = isset($_REQUEST["monhoc"])?$_REQUEST["monhoc"]:""; 
$gioitinh = isset($_REQUEST["gioitinh"])?$_REQUEST["gioitinh"]:""; 
$sdt = isset($_REQUEST["sdt"])?$_REQUEST["sdt"]:""; 
$thongtin = isset($_REQUEST["thongtin"])?$_REQUEST["thongtin"]:""; 
$sql ="select * from Giaovien";
    $sql .=" where id_gv=$id_gv";
    $teaches = exec_select($sql);

// upload file
$target_dir = "uploads/"; 
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]); 
$uploadOk = 1; 
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); 

$file_name_uploadb = $target_dir . uniqid() . '.' . $imageFileType;
// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]); 
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . "."; 
        $uploadOk = 1; 
    }else {
        echo "File is not an image."; 
        $uploadOk = 0; 
    }
}

$img_gv = $file_name_uploadb; 
//tao sql
$sql = "UPDATE giaovien "; 
$sql .= " set "; 
$sql .= "img_gv='{$$file_name_uploadb}', "; 
$sql .= "ten_gv='{$ten_gv}', "; 
$sql .= " monhoc='{$monhoc}', "; 
$sql .= "gioitinh='{$gioitinh}', "; 
$sql .= "sdt='{$sdt}', "; 
$sql .= "thongtin='{$thongtin}' "; 
$sql .= "where id_gv={$id_gv}";
//echo "sql=[$sql]"; exit();
//Thuc thi sql
// var_dump($sql);
$ret = exec_update($sql);
header("Location:admin.php");
exit();

