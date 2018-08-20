<?php 
session_start();
include("lib_db.php");
include("checklogin.php");

$user = checkLoggedUser();
$monhoc = array();
$id_mh = isset($_REQUEST["id"]) ? $_REQUEST["id"] : 0;

    $sql ="select * from monhoc";
    $sql .=" where id_mh=$id_mh";
    $monhoc = select_one($sql);

    $baigiang = array();
// $id_bg = isset($_REQUEST["id_bg"]) ? $_REQUEST["id_bg"] : 0;

    $sql ="select * from baigiang";
    $sql .=" where id_mh=$id_mh";
    $baigiang = exec_select($sql);
    // var_dump($baigiang);
    if (isset($_POST['bt_delete'])) {
        $id   = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
        $sql1 = "DELETE FROM baigiang where  id_bg= $id";
        $res  = exec_select($sql1);
        $link = "Location:edit_mh.php?id=";
        $link .= "$id_mh";
        header($link); 
        exit();
    }  

 ?>

<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sửa thông tin môn học</title>
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
                        <h5 class="modal-title" id="exampleModalLongTitle">Chỉnh sửa môn học</h5>
                 
                    </div>
                    <form method="POST" action="edit_exec_mh.php" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $monhoc['id_mh']?>"/>
                    <div class="modal-body">
                        <div class="card-block p-b-0">

                            <div class="Contact">
                                <div class="card-block p-t-0">
                                    <div class="row">
                                       <div class="col-lg-2"></div>
                                        <div class="col-sm-12 col-lg-8 col-md-12  p-r-0 p-l-0">
                                            <div class="content">
                           
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="col-sm-12 col-lg-12">

                                                            <i class="" for="uname"></i>Tên môn học:


                                                            <input class="form-control" type="text" name="ten_mh" value="<?=$monhoc['ten_mh']?>"
                                                            
                                                                required="">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="col-sm-12 col-lg-12">

                                                            <i class="" for="uname"></i>Giáo viên:


                                                            <input class="form-control" type="text" name="ten_gv"
                                                                required="" value=" <?=$monhoc['ten_gv']?>">

                                                        </div>
                                                    </div>
                                                </div>



                                         
                   

                                             
                                                <div class="row">
                                                    <div class="col-sm-12 m-t-10">
                                                        <div class="col-sm-12 col-lg-12">

                                                            <i class="" for="uname"></i>Thông tin:

                                                            <textarea rows="3" cols="5" class="form-control m-t-10" name="thongtin"
                                                                placeholder="Default textarea"><?=$monhoc['thongtin']?></textarea>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-2"></div>




                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button href="admin.php" class="btn btn-secondary" >Quay lại</button>
                        <button  type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card"> 
        <div class="card-block " width="100%">
                                        <h5>Danh sách bài giảng</h5>
                                        <button data-toggle="modal" data-target="#exampleModalCenter4" class=" btn btn-outline-primary waves-effect waves-light f-right d-inline-block md-trigger pull-right"
                                            type="button">
                                            <i class="icofont icofont-plus m-r-5"></i> Thêm bài giảng
                                        </button>

         </div>
        <table class="table table-striped " >
                                                                    <thead>
                                                                        <tr >  
                                                                            <th width="5%">Id</th>
                                                                            <th width="20%">Tên bài giảng</th>
                                                                            <th width="40%">Nội dung</th>
                                                                            <th width="20%">File</th>
                                                                            <th width="25%"></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                        if (is_array($baigiang) || is_object($baigiang)) {
                                                                         $i=0;
                                                                        foreach($baigiang as $itembg) 
                                                                        {
                                                                            $i++;
                                                                            ?>
                                                                        <tr>
                                                                            
                                                                            <td>
                                                                            
                                                                            <?=$itembg['id_bg']?>
                                                                    
                                                            
                                                                            </td>
                                                                            <td>
                                                                            
                                                                            <?=$itembg['ten_bg']?>
                                                                            
                                                                            </td>
                                                                        
                                                                            <td>
                                                                            <?=$itembg['noidung']?>
                                                                            </td>
                                                                            <td>
                                                                            <?=$itembg['file']?>
                                                                            </td>
                                                                            <td class="center">
                                                                                <div class="d-none d-md-block d-lg-block  text-center">
                                                                                
                                                                                <a  href="edit_mh.php?id=<?=$monhoc['id_mh']?>"  class="btn btn-primary" data-toggle="tooltip" title="" data-original-title="Chỉnh sửa" >Sửa</a>
                                                                                <form method="post"  style="float:right" >
                                                                                <input type="hidden" name="id" value="<?= $itembg['id_bg'] ?>" />
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
                                                                        <?php }
                                                                        }?>
                                                                    </tbody>
                                    </table>

                                    <div class="modal fade" id="exampleModalCenter4" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle3">Thêm mới bài giảng</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="add_exec_bg.php" enctype="multipart/form-data">
                    <input type="hidden" name="id_mh" value="<?=$id_mh?>">
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

                                                            <i class="" for="uname"></i>Tên bài giảng:


                                                            <input class="form-control" type="text" name="ten_bg" value=""
                                                            
                                                                required="">
                                                               

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 m-t-10">
                                                        <div class="col-sm-12 col-lg-12">

                                                            <i class="" for="uname"></i>Nội dung:
                                                                <input class="form-control" type="text" name="noidung" value=""
                                                            
                                                                required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="col-sm-12 col-lg-12">

                                                            <i class="" for="uname"></i>File:

                                                              <input class="form-control" type="file" name="file"
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




        </div></div>
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