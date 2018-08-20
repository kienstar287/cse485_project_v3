<?php
session_start();
include("lib_db.php"); 
include("checklogin.php"); 
clearLoggedUser(); 
header("Location:index.php"); 
exit; ?>