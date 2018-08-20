<?php
include("lib_db.php"); 
include("checklogin.php"); 
$user = checkLoggedUser(); 
//nho sua lai ten db trong file lib_db.php dong 12
//print_r($_REQUEST);exit();
//get input

// $img_gv = isset($_REQUEST["img_gv"])?$_REQUEST["img_gv"]:""; 

$ten_gv = isset($_REQUEST["ten_gv"])?$_REQUEST["ten_gv"]:""; 
$monhoc = isset($_REQUEST["monhoc"])?$_REQUEST["monhoc"]:""; 
$gioitinh = isset($_REQUEST["gioitinh"])?$_REQUEST["gioitinh"]:0; 
$sdt = isset($_REQUEST["sdt"])?$_REQUEST["sdt"]:""; 
$thongtin = isset($_REQUEST["thongtin"])?$_REQUEST["thongtin"]:""; 
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
// Check if file already exists
if (file_exists($file_name_uploadb)) {
    echo "Sorry, file already exists."; 
    $uploadOk = 0; 
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large."; 
    $uploadOk = 0; 
}
// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed."; 
    $uploadOk = 0; 
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded."; 
// if everything is ok, try to upload file
}else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $file_name_uploadb)) {
        echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded."; 
    }else {
        echo "Sorry, there was an error uploading your file."; 
    }
}

$img_gv = $file_name_uploadb; 
//tao sql
$sql = "INSERT INTO giaovien (`img_gv`, `ten_gv`, `monhoc`, `gioitinh`, `sdt`, `thongtin`) "; 
$sql .= " VALUES ("; 
$sql .= "	'{$img_gv}', "; 

$sql .= "	'{$ten_gv}', "; 
$sql .= " '{$monhoc}', "; 
$sql .= "	{$gioitinh}, "; 
$sql .= "	'{$sdt}', "; 
$sql .= "	'{$thongtin}' "; 
$sql .= ")"; 
//echo "sql=[$sql]"; exit();
//Thuc thi sql
$ret = exec_update($sql); 
header("Location:admin.php"); 
exit(); 
?>