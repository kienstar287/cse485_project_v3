
<?php
session_start();
include("lib_db.php");
include("checklogin.php");

$user    = checkLoggedUser();
$teaches = array();
if ($user['type'] == 'admin') {
    $sql = "select * from Giaovien";
    $sql .= " order by id_gv desc";
    $teaches = exec_select($sql);
    
}
$monhoc = array();
if ($user['type'] == 'admin') {
    $sql = "select * from monhoc";
    $sql .= " order by id_mh desc";
    $monhoc = exec_select($sql);
}

$thongbao = array();
if ($user['type'] == 'admin') {
    $sql = "select * from thongbao";
    $sql .= " order by id_tb desc";
    $thongbao = exec_select($sql);
    
}

$use = array();
if ($user['type'] == 'admin') {
    $sql = "select * from user";
    $sql .= " order by id desc";
    $use = exec_select($sql);
    
}

if (isset($_POST['bt_delete'])) {
    $id   = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
    $sql1 = "DELETE FROM giaovien where  id_gv= $id";
    $res  = exec_select($sql1);
    header('Location:admin.php', true, 301);
    exit();
}
if (isset($_POST['bt_delete1'])) {
    $id   = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
    $sql1 = "DELETE FROM monhoc where  id_mh= $id";
    $res  = exec_select($sql1);
    header('Location:admin.php', true, 301);
    exit();
}
if (isset($_POST['bt_delete2'])) {
    $id   = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
    $sql1 = "DELETE FROM thongbao where  id_tb= $id";
    $res  = exec_select($sql1);
    header('Location:admin.php', true, 301);
    exit();
}
if (isset($_POST['bt_delete3'])) {
    $id   = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
    $sql1 = "DELETE FROM user where  id= $id";
    $res  = exec_select($sql1);
    header('Location:admin.php', true, 301);
    exit();
}
// var_dump($teaches);
$img_gv = isset($_REQUEST["img_gv"]) ? $_REQUEST["img_gv"] : "";
?>

<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
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
                                <?php
if ($user['type'] == 'admin') {
    echo '<a class="nav-link" href="admin.php">Quản lý</a>';
} else {
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
                                <?php
echo ($user ? $user['username'] : 'Đăng nhập');
?>
                           </a>

                        </li>
                        &nbsp;
                        <li class="nav-item">

                            <!-- Kiểm tra có tài khoản đăng nhập không  -->
                            <?php

if (isset($_SESSION['user']) == true) {
    
    echo "<a href='logout.php' class='btn btn-info btn-sm' >Đăng xuất</a>";
    
} else {
    echo "<a href='register.php' class='btn btn-info btn-sm' >Đăng ký</a>";
}
?>

                        </li>
                    </form>
                </div>
            </nav>
        </div>



        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-row mt-2">
                    <ul class="nav nav-tabs nav-tabs--vertical nav-tabs--left" role="navigation">
                        <li class="nav-item">
                            <a href="#lorem" class="nav-link active" data-toggle="tab" role="tab" aria-controls="lorem">Quản
                                lý giáo viên</a>
                        </li>
                        <li class="nav-item">
                            <a href="#ipsum" class="nav-link" data-toggle="tab" role="tab" aria-controls="ipsum">Quản
                                lý môn học</a>
                        </li>
                        <li class="nav-item">
                            <a href="#dolor" class="nav-link " data-toggle="tab" role="tab" aria-controls="dolor">Quản
                                lý lớp học</a>
                        </li>
                        <li class="nav-item">
                            <a href="#sit-amet" class="nav-link" data-toggle="tab" role="tab" aria-controls="sit-amet">Thông
                                báo</a>
                        </li>
                        <li class="nav-item">
                            <a href="#thongbao" class="nav-link" data-toggle="tab" role="tab" aria-controls="thongbao">Tin
                                tức</a>
                        </li>
                        <li class="nav-item">
                            <a href="#user" class="nav-link" data-toggle="tab" role="tab" aria-controls="user">User</a>
                        </li>

                    </ul>
                    <div class="tab-content ">
                        <div class="tab-pane fade show active col-lg-12" id="lorem" role="tabpanel">

                            <div class="container">
                                <div class="card-block ">
                                    <h4>Danh sách giáo viên</h4>

                                    <button data-toggle="modal" data-target="#exampleModalCenter" class=" btn btn-outline-primary waves-effect waves-light f-right d-inline-block md-trigger pull-right"
                                        type="button">
                                        <i class="icofont icofont-plus m-r-5"></i> Thêm Mới
                                    </button>

                                </div>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">Ảnh</th>
                                            <th width="5%">Id</th>
                                            <th width="10%">Tên giáo viên</th>
                                            <th width="10%">Môn học</th>
                                            <th width="10%">Giới tính</th>
                                            <th width="10%">SĐT</th>
                                            <th width="35%">Thông tin</th>
                                            <th width="15%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
$i = 0;
foreach ($teaches as $itemgv) {
    $i++;
?>
                                       <tr>
                                            <td>
                                               <img src="../cse485/<?= $itemgv['img_gv'] ?>" width="50" height="50" alt=""> 
                                            </td>
                                            <td>
                                            
                                            <?= $itemgv['id_gv'] ?>
                                      
                             
                                            </td>
                                            <td>
                                            
                                            <?= $itemgv['ten_gv'] ?>
                                           
                                            </td>
                                            <td>
                                            <?= $itemgv['monhoc'] ?>
                                           </td>
                                            <td><?php
    if ($itemgv['gioitinh'] == '1') {
        echo 'Nữ';
    } else {
        echo 'Nam';
    }
    
?></td>
                                            <td>
                                            <?= $itemgv['sdt'] ?>
                                           </td>

                                            
                                            <td>
                                            <?= $itemgv['thongtin'] ?>
                                           </td>

                                            <td class="center">
                                                <div class="d-none d-md-block d-lg-block  text-center">
                                                
                                                

                                                <a  href="edit_gv.php?id=<?= $itemgv['id_gv'] ?>"  class="btn btn-primary" data-toggle="tooltip" title="" data-original-title="Chỉnh sửa" >Sửa</a>
                                                <form method="post"  style="float:right" >
                                                <input type="hidden" name="id" value="<?= $itemgv['id_gv'] ?>" />
                                            <button name="bt_delete" type="submit" class="btn btn-danger" onclick="click_delete()">Xóa</button>
                                                    </form>
                                                  
                                                </div>
                                                <div class=" d-xs-block d-sm-block d-md-none d-sm-none ">

                                                    <button aria-expanded="false" aria-haspopup="true" class="btn btn-outline-primary btn-sm dropdown-toggle waves-effect waves-light"
                                                        data-toggle="dropdown" id="dropdown-2" ngbdropdowntoggle=""
                                                        type="button">
                                                        <i class="icofont icofont-wheel"></i>
                                                    </button>


                                                    <div class="dropdown-menu">
                                                        
                                                        <a class="dropdown-item border text-primary" href="#">
                                                            <i class="icofont icofont-edit"></i>&nbsp;&nbsp;&nbsp;Sửa</a>
                                                        <a class="dropdown-item border text-primary" href="javascript:;">
                                                            <i class="icofont icofont-ui-delete"></i>&nbsp;&nbsp;&nbsp;Xóa</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
}
?>
                                   </tbody>
                                </table>
                            </div>

                        </div>

                        <div class="tab-pane fade col-lg-12" id="ipsum" role="tabpanel">
                                <div class="container" >
                                    <div class="card-block " width="100%">
                                        <h4>Danh sách môn học</h4>

                                        <button data-toggle="modal" data-target="#exampleModalCenter1" class=" btn btn-outline-primary waves-effect waves-light f-right d-inline-block md-trigger pull-right"
                                            type="button">
                                            <i class="icofont icofont-plus m-r-5"></i> Thêm Mới
                                        </button>

                                    </div>
                                    <table class="table table-striped " >
                                                                    <thead>
                                                                        <tr >  
                                                                            <th width="5%">Id</th>
                                                                            <th width="20%">Tên môn học</th>
                                                                            <th width="30%">Thông tin</th>
                                                                            <th width="20%">Giáo viên</th>
                                                                            <th width="35%"></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
$i = 0;
foreach ($monhoc as $itemmh) {
    $i++;
?>
                                                                       <tr>
                                                                            
                                                                            <td>
                                                                            
                                                                            <?= $itemmh['id_mh'] ?>
                                                                   
                                                            
                                                                            </td>
                                                                            <td>
                                                                            
                                                                            <?= $itemmh['ten_mh'] ?>
                                                                           
                                                                            </td>
                                                                        
                                                                            <td>
                                                                            <?= $itemmh['thongtin'] ?>
                                                                           </td>
                                                                            <td>
                                                                            <?= $itemmh['ten_gv'] ?>
                                                                           </td>
                                                                            <td class="center">
                                                                                <div class="d-none d-md-block d-lg-block  text-center">
                                                                                
                                                                                <a  href="edit_mh.php?id=<?= $itemmh['id_mh'] ?>"  class="btn btn-primary" data-toggle="tooltip" title="" data-original-title="Chỉnh sửa" >Sửa&Thêm BG</a>
                                                                                <form method="post"  style="float:right" >
                                                                                <input type="hidden" name="id" value="<?= $itemmh['id_mh'] ?>" />
                                                                            <button name="bt_delete1" type="submit" class="btn btn-danger" onclick="click_delete()">Xóa</button>
                                                                                    </form>
                                                                                
                                                                                </div>
                                                                                <div class=" d-xs-block d-sm-block d-md-none d-sm-none ">

                                                                                    <button aria-expanded="false" aria-haspopup="true" class="btn btn-outline-primary btn-sm dropdown-toggle waves-effect waves-light"
                                                                                        data-toggle="dropdown" id="dropdown-2" ngbdropdowntoggle=""
                                                                                        type="button">
                                                                                        <i class="icofont icofont-wheel"></i>
                                                                                    </button>


                                                                                    <div class="dropdown-menu">
                                                                                        
                                                                                        <a class="dropdown-item border text-primary" href="#">
                                                                                            <i class="icofont icofont-edit"></i>&nbsp;&nbsp;&nbsp;Sửa</a>
                                                                                        <a class="dropdown-item border text-primary" href="javascript:;">
                                                                                            <i class="icofont icofont-ui-delete"></i>&nbsp;&nbsp;&nbsp;Xóa</a>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <?php
}
?>
                                                                   </tbody>
                                    </table>
                                </div>
                        </div>

                     

                        
                        <div class="tab-pane fade" id="dolor" role="tabpanel">
                        



                    </div>
                        <div class="tab-pane fade" id="sit-amet" role="tabpanel">
                        <div class="container" >
                                    <div class="card-block " width="100%">
                                        <h4>Danh sách thông báo</h4>

                                        <button data-toggle="modal" data-target="#exampleModalCenter2" class=" btn btn-outline-primary waves-effect waves-light f-right d-inline-block md-trigger pull-right"
                                            type="button">
                                            <i class="icofont icofont-plus m-r-5"></i> Thêm Mới
                                        </button>

                                    </div>
                                    <table class="table table-striped " >
                                                                    <thead>
                                                                        <tr >  
                                                                            <th width="5%">Id</th>
                                                                            <th width="20%">Tên thông báo</th>
                                                                            <th width="40%">Nội dung</th>
                                                                            <th width="20%">Người viết</th>
                                                                            <th width="25%"></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
$i = 0;
foreach ($thongbao as $itemtb) {
    $i++;
?>
                                                                       <tr>
                                                                            
                                                                            <td>
                                                                            
                                                                            <?= $itemtb['id_tb'] ?>
                                                                   
                                                            
                                                                            </td>
                                                                            <td>
                                                                            
                                                                            <?= $itemtb['ten_tb'] ?>
                                                                           
                                                                            </td>
                                                                        
                                                                            <td>
                                                                            <?= $itemtb['noidung'] ?>
                                                                           </td>
                                                                            <td>
                                                                            <?= $itemtb['tacgia'] ?>
                                                                           </td>
                                                                            <td class="center">
                                                                                <div class="d-none d-md-block d-lg-block  text-center">
                                                                                
                                                                                

                                                                                <a  href="edit_tb.php?id=<?= $itemtb['id_tb'] ?>"  class="btn btn-primary" data-toggle="tooltip" title="" data-original-title="Chỉnh sửa" >Sửa</a>
                                                                                <form method="post"  style="float:right" >
                                                                                <input type="hidden" name="id" value="<?= $itemtb['id_tb'] ?>" />
                                                                            <button name="bt_delete2" type="submit" class="btn btn-danger" onclick="click_delete()">Xóa</button>
                                                                                    </form>
                                                                                
                                                                                </div>
                                                                                <div class=" d-xs-block d-sm-block d-md-none d-sm-none ">

                                                                                    <button aria-expanded="false" aria-haspopup="true" class="btn btn-outline-primary btn-sm dropdown-toggle waves-effect waves-light"
                                                                                        data-toggle="dropdown" id="dropdown-2" ngbdropdowntoggle=""
                                                                                        type="button">
                                                                                        <i class="icofont icofont-wheel"></i>
                                                                                    </button>


                                                                                    <div class="dropdown-menu">
                                                                                        
                                                                                        <a class="dropdown-item border text-primary" href="#">
                                                                                            <i class="icofont icofont-edit"></i>&nbsp;&nbsp;&nbsp;Sửa</a>
                                                                                        <a class="dropdown-item border text-primary" href="javascript:;">
                                                                                            <i class="icofont icofont-ui-delete"></i>&nbsp;&nbsp;&nbsp;Xóa</a>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <?php
}
?>
                                                                   </tbody>
                                                                </table>
                                </div>
                        </div>
                        <div class="tab-pane fade" id="thongbao" role="tabpanel">
                            <h1>Sit Amet</h1>

                            <p></p>
                        </div>
                        <div class="tab-pane fade" id="tintuc" role="tabpanel">
                            <h1>Sit Amet</h1>

                            <p>.</p>
                        </div>
                        <div class="tab-pane fade" id="user" role="tabpanel">
                        <div class="container" >
                                    <div class="card-block " width="100%">
                                        <h4>Danh sách người dùng</h4>

                                        <button data-toggle="modal" data-target="#exampleModalCenter3" class=" btn btn-outline-primary waves-effect waves-light f-right d-inline-block md-trigger pull-right"
                                            type="button">
                                            <i class="icofont icofont-plus m-r-5"></i> Thêm Mới
                                        </button>

                                    </div>
                                    <table class="table table-striped " >
                                                                    <thead>
                                                                        <tr >  
                                                                            <th width="10%">Id</th>
                                                                            <th width="20%">Tên người dùng</th>
                                                                            <th width="20%">Tên đăng nhập</th>
                                                                            <th width="20%">Mật khẩu</th>
                                                                            <th width="10%">Kiểu</th>
                                                                            <th width="20%"></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
$i = 0;
foreach ($use as $itemu) {
    $i++;
?>
                                                                       <tr>
                                                                            
                                                                            <td>
                                                                            
                                                                            <?= $itemu['id'] ?>
                                                                   
                                                            
                                                                            </td>
                                                                            <td>
                                                                            
                                                                            <?= $itemu['name'] ?>
                                                                           
                                                                            </td>
                                                                        
                                                                            <td>
                                                                            <?= $itemu['username'] ?>
                                                                           </td>
                                                                            <td>
                                                                            <?= $itemu['password'] ?>
                                                                           </td>
                                                                            <td>
                                                                            <?= $itemu['type'] ?>
                                                                           </td>
                                                                            <td class="center">
                                                                                <div class="d-none d-md-block d-lg-block  text-center">
                                                                                
                                                                                

                                                                                <a  href="edit_user.php?id=<?= $itemu['id'] ?>"  class="btn btn-primary" data-toggle="tooltip" title="" data-original-title="Chỉnh sửa" >Sửa</a>
                                                                                <form method="post"  style="float:right" >
                                                                                <input type="hidden" name="id" value="<?= $itemu['id'] ?>" />
                                                                            <button name="bt_delete3" type="submit" class="btn btn-danger" onclick="click_delete()">Xóa</button>
                                                                                    </form>
                                                                                
                                                                                </div>
                                                                                <div class=" d-xs-block d-sm-block d-md-none d-sm-none ">

                                                                                    <button aria-expanded="false" aria-haspopup="true" class="btn btn-outline-primary btn-sm dropdown-toggle waves-effect waves-light"
                                                                                        data-toggle="dropdown" id="dropdown-2" ngbdropdowntoggle=""
                                                                                        type="button">
                                                                                        <i class="icofont icofont-wheel"></i>
                                                                                    </button>


                                                                                    <div class="dropdown-menu">
                                                                                        
                                                                                        <a class="dropdown-item border text-primary" href="#">
                                                                                            <i class="icofont icofont-edit"></i>&nbsp;&nbsp;&nbsp;Sửa</a>
                                                                                        <a class="dropdown-item border text-primary" href="javascript:;">
                                                                                            <i class="icofont icofont-ui-delete"></i>&nbsp;&nbsp;&nbsp;Xóa</a>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <?php
}
?>
                                                                   </tbody>
                                                                </table>
                                </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-12">

            </div>
        </div>
        <!-- thêm gíao viên -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Thêm mới giáo viên</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="add_exec.php" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="card-block p-b-0">

                            <div class="Contact">
                                <div class="card-block p-t-0">
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-4 col-md-12 text-center ">
                                            <div class="text-center m-t-10">
                                                <img align="center" id="img_gv" alt="card-img" class="img-fluid p-b-10 img-radius img-120" width="100" heigh="100"
                                                src="<?= $itemgv['img_gv'] ?>">


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


                                                            <input class="form-control" type="text" name="ten_gv" value=""
                                                            
                                                                required="">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="col-sm-12 col-lg-12">

                                                            <i class="" for="uname"></i>Môn học:


                                                            <input class="form-control" type="text" name="monhoc"
                                                                required="">

                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="row">
                                                    <div class="col-sm-12  m-t-5">
                                                        <div class="col-sm-12 col-lg-12 ">
                                                            <i class="" for="uname"></i>Giới tính:
                                                            <div class="col-md-12 p-b-10">
                                                                <div class="form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input"
                                                                            name="gioitinh" value="0">Nam
                                                                    </label>
                                                                </div>
                                                                <div class="form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input"
                                                                            name="gioitinh" value="1" >Nữ
                                                                    </label>
                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 m-t-10">
                                                        <div class="col-sm-12 col-lg-12">

                                                            <i class="" for="uname"></i>SĐT:
                                                            <input class="form-control" type="text" name="sdt"
                                                                required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 m-t-10">
                                                        <div class="col-sm-12 col-lg-12">

                                                            <i class="" for="uname"></i>Thông tin:

                                                            <textarea rows="3" cols="5" class="form-control m-t-10" name="thongtin"
                                                                placeholder="Default textarea">............</textarea>

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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        
      <!-- Thêm môn học -->
        <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle1">Thêm mới môn học</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="add_exec_mh.php" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="card-block p-b-0">

                            <div class="Contact">
                                <div class="card-block p-t-0">
                                    <div class="row">
                                      
                                        <div class="col-sm-12 col-lg-12 col-md-12  p-r-0 p-l-0">
                                            <div class="content">
                           
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="col-sm-12 col-lg-12">

                                                            <i class="" for="uname"></i>Tên môn học:


                                                            <input class="form-control" type="text" name="ten_mh" value=""
                                                            
                                                                required="">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 m-t-10">
                                                        <div class="col-sm-12 col-lg-12">

                                                            <i class="" for="uname"></i>Tên giáo viên:
                                                                <input class="form-control" type="text" name="ten_gv"
                                                                required="">
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="col-sm-12 col-lg-12">

                                                            <i class="" for="uname"></i>Thông tin:

                                                                <textarea rows="3" cols="5" class="form-control m-t-10" name="thongtin"
                                                                placeholder="Default textarea">............</textarea>


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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                    </form>
                 
                </div>
            </div>
        </div>
        <!-- Thêm mới thông báo -->
        <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle2">Thêm mới thông báo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="add_exec_tb.php" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="card-block p-b-0">

                            <div class="Contact">
                                <div class="card-block p-t-0">
                                    <div class="row">
                                      
                                        <div class="col-sm-12 col-lg-12 col-md-12  p-r-0 p-l-0">
                                            <div class="content">
                           
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="col-sm-12 col-lg-12">

                                                            <i class="" for="uname"></i>Tên thông báo:


                                                            <input class="form-control" type="text" name="ten_tb" value=""
                                                            
                                                                required="">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 m-t-10">
                                                        <div class="col-sm-12 col-lg-12">

                                                            <i class="" for="uname"></i>Nội dung:
                                                                <textarea rows="3" cols="5" class="form-control m-t-10" name="noidung"
                                                                placeholder="Default textarea">............</textarea>
                                                                
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="col-sm-12 col-lg-12">

                                                            <i class="" for="uname"></i>Tác giả:

                                                              <input class="form-control" type="text" name="tacgia"
                                                                required="">


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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                    </form>
                 
                </div>
            </div>
        </div>
        <!-- Thêm mới user -->
        <div class="modal fade" id="exampleModalCenter3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle3">Thêm mới người dùng</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="add_exec_user.php" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="card-block p-b-0">

                            <div class="Contact">
                                <div class="card-block p-t-0">
                                    <div class="row">
                                      
                                        <div class="col-sm-12 col-lg-12 col-md-12  p-r-0 p-l-0">
                                            <div class="content">
                           
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="col-sm-12 col-lg-12">

                                                            <i class="" for="uname"></i>Tên người dùng:


                                                            <input class="form-control" type="text" name="name" value=""
                                                            
                                                                required="">
                                                               

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 m-t-10">
                                                        <div class="col-sm-12 col-lg-12">

                                                            <i class="" for="uname"></i>Tên tài khoản:
                                                                <input class="form-control" type="text" name="username" value=""
                                                            
                                                                required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="col-sm-12 col-lg-12">

                                                            <i class="" for="uname"></i>Mật khẩu:

                                                              <input class="form-control" type="text" name="password"
                                                                required="">


                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="col-sm-12 col-lg-12">

                                                            <i class="" for="uname"></i>Kiểu:

                                                        <?php
$use = array(
    'admin' => 'admin',
    'normal' => 'normal'
);
?>
                                                       <select class="form-control" name="type">
                                                        <?php
foreach ($use as $itemu => $value) {
?>
                                                       <option value="<?php
    echo $itemu;
?>" <?php
    echo ($itemu == '1') ? ' selected="selected"' : '';
?>><?php
    echo $value;
?></option>
                                                        <?php
}
?>
                                                       </select>

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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                    </form>
                 
                </div>
            </div>


 



</body>









<script type="text/javascript">
                function click_delete(){
                    var txt;
                    var yes =confirm("Bạn có chắc chắn xóa");
                    if (yes == true) {
                        txt = "You pressed OK!";
                    } else {
                        event.preventDefault();
                    }
                }
        </script>
<?php
if ($user['type'] != 'admin') {
    echo '<script>';
    echo 'alert("Bạn không có quyền truy cập");';
    echo 'window.location="index.php"';
    echo '</script>';
}
?>
</html>

