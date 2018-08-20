<?php
include("lib_db.php"); 
include("checklogin.php"); 
$user = checkLoggedUser(); 

//print_r($_REQUEST);exit();
//get input

// $img_gv = isset($_REQUEST["img_gv"])?$_REQUEST["img_gv"]:""; 

$ten_bg = isset($_REQUEST["ten_bg"])?$_REQUEST["ten_bg"]:""; 
$noidung = isset($_REQUEST["noidung"])?$_REQUEST["noidung"]:""; 
// $file = isset($_REQUEST["file"])?$_REQUEST["file"]:""; 
$id_mh = isset($_REQUEST["id_mh"])?$_REQUEST["id_mh"]:""; 

// upload file
$target_dir = "uploads/files/"; 
$target_file = $target_dir . basename($_FILES["file"]["name"]); 
$uploadOk = 1; 
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); 

$file_name_uploadb = $target_dir . uniqid() . '.' . $imageFileType;
echo($file_name_uploadb);
// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    // $check = getimagesize($_FILES["file"]["tmp_name"]); 
    // if ($check !== false) {
    //     echo "File is - " . $check["mime"] . "."; 
    //     $uploadOk = 1; 
    // }else {
    //     echo "File is not."; 
    //     $uploadOk = 0; 
    // }
}
// Check if file already exists
var_dump(file_exists($file_name_uploadb));
if (file_exists($file_name_uploadb)) {
    echo "Sorry, file already exists."; 
    $uploadOk = 0; 
}
// Check file size
// if ($_FILES["file"]["size"] > 500000) {
//     echo "Sorry, your file is too large."; 
//     $uploadOk = 0; 
// }
// Allow certain file formats
// if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
//     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed."; 
//     $uploadOk = 0; 
// }
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded."; 
// if everything is ok, try to upload file
}else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $file_name_uploadb)) {
        echo "The file " . basename($_FILES["file"]["name"]) . " has been uploaded."; 
    }else {
        echo "Sorry, there was an error uploading your file."; 
    }
}

$img_gv = $file_name_uploadb; 
//tao sql
$sql = "INSERT INTO baigiang (`ten_bg`, `noidung`, `file`, `id_mh`) "; 
$sql .= " VALUES ("; 
$sql .= "'{$ten_bg}', "; 
$sql .= "'{$noidung}', ";
$sql .= " '{$img_gv}', "; 
$sql .= " '{$id_mh}' "; 
$sql .= ")"; 
//echo "sql=[$sql]"; exit();
//Thuc thi sql
$ret = exec_update($sql); 
$link = "Location:edit_mh.php?id=";
$link .= "$id_mh";
header($link); 
exit(); 
?>