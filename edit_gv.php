<?php 
session_start();
include("lib_db.php");
include("checklogin.php");

$user = checkLoggedUser();
$teaches = array();
$id_gv = isset($_REQUEST["id"]) ? $_REQUEST["id"] : 0;

    $sql ="select * from giaovien";
    $sql .=" where id_gv=$id_gv";
    $teaches = exec_select($sql);

    // var_dump($teaches);
$img_gv = isset($_REQUEST["img_gv"])?$_REQUEST["img_gv"]:""; 
 ?>

<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sửa thông tin giáo viên</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js">
    </script>
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
                                echo "<a href='register.php' class='btn btn-info btn-sm' >Đăng ký</a>";
                            }
                                ?>

                        </li>
                    </form>
                </div>
            </nav>
        </div>



        <div  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"  >
            <div class="" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Chỉnh sửa giáo viên</h5>
                 
                    </div>
                    <form method="POST" action="edit_exec.php" enctype="multipart/form-data">
                    <?php 
                    foreach($teaches as $itemgv) 
                   {
                                          ?>
                    <input type="hidden" name="id" value="<?php echo $itemgv['id_gv']?>"/>
                    <div class="modal-body">
                        <div class="card-block p-b-0">

                            <div class="Contact">
                                <div class="card-block p-t-0">
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-4 col-md-12 text-center ">
                                            <div class="text-center m-t-10">
                                                <img align="center" id="img_gv" alt="card-img" class="img-fluid p-b-10 img-radius img-120" width="100" heigh="100"
                                                    src="../cse485/<?=$itemgv['img_gv']?>">


                                            </div>

                                            <div align="center" class="custom-file mb-3 f-12 ">
                                                <input type="file" name="fileToUpload" id="fileToUpload">

                                            </div>

                                        </div>
                                        <div class="col-sm-12 col-lg-8 col-md-12  p-r-0 p-l-0">
                                            <div class="content">
                           
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="col-sm-12 col-lg-12">

                                                            <i class="" for="uname"></i>Tên giáo viên:


                                                            <input class="form-control" type="text" name="ten_gv" value="<?=$itemgv['ten_gv']?>"
                                                            
                                                                required="">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="col-sm-12 col-lg-12">

                                                            <i class="" for="uname"></i>Môn học:


                                                            <input class="form-control" type="text" name="monhoc"
                                                                required="" value=" <?=$itemgv['monhoc']?>">

                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="row">
                                                    <div class="col-sm-12  m-t-5">
                                                        <div class="col-sm-12 col-lg-12 ">

                                                            <i class="" for="uname"></i>Giới tính:


                                                            <div class="col-md-12 p-b-10">
                                                            <?php
                                                                $gioitinh=$itemgv['gioitinh'];
                                                                if ($gioitinh == 0) {
                                                            ?>
                                                                <div class="form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input checked type="radio" class="form-check-input"
                                                                            name="gioitinh" value="0">Nam
                                                                    </label>
                                                                </div>
                                                                <div class="form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input"
                                                                            name="gioitinh" value="1" >Nữ
                                                                    </label>
                                                                </div>
                                                                <?php }else { ?>
                                                                    <div class="form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input"
                                                                            name="gioitinh" value="0">Nam
                                                                    </label>
                                                                </div>
                                                                <div class="form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input checked type="radio" class="form-check-input"
                                                                            name="gioitinh" value="1" >Nữ
                                                                    </label>
                                                                </div>
                                                                <?php } ?>
     
                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>
                   

                                                <div class="row">
                                                    <div class="col-sm-12 m-t-10">
                                                        <div class="col-sm-12 col-lg-12">

                                                            <i class="" for="uname"></i>SĐT:



                                                            <input class="form-control" type="text" name="sdt" value= "<?=$itemgv['sdt']?>"
                                                                required="">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 m-t-10">
                                                        <div class="col-sm-12 col-lg-12">

                                                            <i class="" for="uname"></i>Thông tin:

                                                            <textarea rows="3" cols="5" class="form-control m-t-10" name="thongtin"
                                                                placeholder="Default textarea"><?=$itemgv['thongtin']?></textarea>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>





                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button href="admin.php" class="btn btn-secondary" >Hủy bỏ</button>
                        <button  type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                       <?php } ?>
                    </form>
                </div>
            </div>
        </div>
        
</body>
<?php
if ($user['type']!='admin') {
    echo '<script>';
    echo 'alert("Bạn không có quyền truy cập");';
    echo 'window.location="index.php"';
    echo '</script>';
}
?>
</html>