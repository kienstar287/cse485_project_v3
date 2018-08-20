<!DOCTYPE html>
<?php 
session_start();
include("lib_db.php");
include("checklogin.php");
$user = checkLoggedUser();
$teaches = array();
if ($user['type']=='admin') {
$sql ="select * from Giaovien";
    $sql .=" order by id_gv desc";
    $teaches = exec_select($sql);
}
    // var_dump($teaches);
    $img_gv = isset($_REQUEST["img_gv"])?$_REQUEST["img_gv"]:""; 
 ?>
 
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Danh sách giáo viên</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>

<body>
    <div class="page">
        <div class="top-menu-bar">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <li class="nav-item">
                            <?php if ($user['type']=='admin') {
                                echo '<a class="nav-link" href="admin.php">Quản lý</a>';
                            }
                            else {
                                echo '<a class="nav-link" href="">Hỗ trợ</a>';
                            } 
                            ?>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Giới thiệu</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#">Liên hệ</a>
                            </li>
                            <li class="nav-item text-primary">
                                <a href="#">
                                    <i class="fa fa-facebook-square"></i>
                                </a>
                            </li>
                            &nbsp;
                            <li class="nav-item">
                                <a href="#">
                                    <i class="fa fa-google-plus-square text-danger"> </i>
                                </a>
                            </li>
                    </ul>
                    <form class="nav navbar-nav navbar-right">
                        <li class="nav-item">
                            <a href="login.php" class="btn btn-info btn-sm ">
                                <i class="fa fa-user"></i>&nbsp;
                                <?php echo($user ? $user['username'] : 'Đăng nhập')?>
                            </a>

                        </li>
                        &nbsp;
                        <li class="nav-item">
                            
                                
                               <!-- Kiểm tra có tài khoản đăng nhập không  -->
                                <?php
                               
                            if (isset($_SESSION['user']) == true) {
                               
                                echo "<a href='logout.php' class='btn btn-info btn-sm' >Đăng xuất</a>";
                              
                            }
                            else
                            {
                                echo "<a href='resign.php' class='btn btn-info btn-sm' >Đăng ký</a>";
                            }
                                ?>
                       

                        </li>
                    </form>
                </div>
            </nav>
        </div>
        <div class="page-header">

            <div class="row">
                <div class="col-lg-3">
                    <div class="logo">

                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="menu">
                        <div class="container">
                            <nav class="navbar navbar-expand-lg">


                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav ">
                                        <li class="nav-item ">
                                            <a class="nav-link  text-dark" href="#">Giáo viên</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link text-dark" href="#">Môn học</a>
                                        </li>


                                        <li class="nav-item">
                                            <a class="nav-link text-dark" href="#">Lớp học</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-dark" href="#">Thông báo</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-dark" href="#">Tin tức</a>
                                        </li>
                                        <li class="nav-item">
                                                <form class="form-inline ml-auto">
                                                        <div class="md-form my-0">
                                                        <input class="form-control mr-sm-2" type="text" placeholder="Tìm kiếm" aria-label="Search">
                                                        </div>
                                                </form>
                                               
                                               
                                        </li>


                                    </ul>

                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="col-*-*" style="background-image: url()"></div>
                </div>

            </div>
        </div>
       
        <div class="row">
                <div class="col-lg-12">
                     <div class="banner"></div>   
                </div>      

    </div>
        <div class="card">
            <strong>
                    <div class="header">
                            <b>Danh sách giáo viên</b>
                    </div>
            </strong>
        <div class="row">
           
        <?php $i=0;
                                        foreach($teaches as $itemgv) 
                                        {
                                            $i++;
                                         
                                            
                                            ?>
            <div class="col-lg-3">
          
            
                    <div class="card-group">
                 
                            <div  class="card text-center" >
                                <div>
                              <img class="center"  width="150px" height="150px" src="../cse485/<?=$itemgv['img_gv']?>"   alt="Card image cap" >
                                </div>
                              <div class="card-body">
                                <h5 class="card-title"><?=$itemgv['ten_gv']?></h5>
                                <p class="card-text"><?=$itemgv['thongtin']?></p>
                                <p class="card-text"><span class="text">Sđt: <?=$itemgv['sdt']?></span></p>
                              </div>
                            </div>
                            
                    </div>
                    
                 
            </div>     
            <?php }?>
            
              
        </div>
        </div>
       </div>
      
       <div class="card-footer">
        <section id="footer">
            <div class="container">
                <div class="row text-center text-xs-center text-sm-left text-md-left">
                    <div class="col-xs-12 col-sm-3 col-md-3">
                        <h5>Giáo viên</h5>
                        <ul class="list-unstyled quick-links">
                            <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Home</a></li>
                            <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>About</a></li>
                            <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
                            <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
                            <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Videos</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-md-3">
                        <h5>Môn học</h5>
                        <ul class="list-unstyled quick-links">
                            <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Home</a></li>
                            <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>About</a></li>
                            <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
                            <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
                            <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Videos</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-md-3">
                        <h5>Thông báo</h5>
                        <ul class="list-unstyled quick-links">
                            <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Home</a></li>
                            <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>About</a></li>
                            <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
                            <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
                            <li><a href="https://wwwe.sunlimetech.com" title="Design and developed by"><i class="fa fa-angle-double-right"></i>Imprint</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-md-3">
                        <h5>Tin tức</h5>
                        <ul class="list-unstyled quick-links">
                            <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Home</a></li>
                            <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>About</a></li>
                            <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
                            <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
                            <li><a href="https://wwwe.sunlimetech.com" title="Design and developed by"><i class="fa fa-angle-double-right"></i>Imprint</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
                        <ul class="list-unstyled list-inline social text-center">
                            <li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-google-plus"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void();" target="_blank"><i class="fa fa-envelope"></i></a></li>
                        </ul>
                    </div>
                    </hr>
                </div>	
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
                        <p><u><a href="https://www.nationaltransaction.com/">National Transaction Corporation</a></u> is a Registered MSP/ISO of Elavon, Inc. Georgia [a wholly owned subsidiary of U.S. Bancorp, Minneapolis, MN]</p>
                        <p class="h6">© 2018 Copyright Kienstar287
                    </div>
                    </hr>
                </div>	
            </div>
        </section>
       </div>
</body>

</html>