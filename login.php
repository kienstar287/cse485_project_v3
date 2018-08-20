<?php 
session_start();
$username = isset($_REQUEST["username"]) ? $_REQUEST["username"] : "";
$password = isset($_REQUEST["password"]) ? $_REQUEST["password"] : "";


include("lib_db.php");
include("checklogin.php");
$show_alert = false;
if (isset($_REQUEST["username"])){
	unset($_SESSION['user']);
    $sql ="select * from user";
    $sql .=" where username='{$username}'";
    $user = select_one($sql);
    if (!$user){ 
        $error = "Người dùng không tồn tại";
        $show_alert = true;
    } else{ 
        if ($password == $user['password']){
            // $checkLogin = 0;
            $error = '';
            setLoggedUser($user);

            if ($user['type']=='admin') {
                header("Location:admin.php");
            }
            else {
                header("Location:index.php");
            }
            
		    exit();
        } else {
            $error = "Mật khẩu không đúng";
            $show_alert = true;
        }
    }
}
?>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Đăng nhập</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous">
    </script>

    <link rel="stylesheet" type="text/css" media="screen" href="login.css" />
    <script src="main.js">
    </script>

</head>

<body>
    <div class="login-form">
        <div class="alert alert-primary <?php echo($show_alert ? 'visible' : 'invisible')?>">
            <?php echo($error)?>
        </div>
        <form action='login.php' method="post">
            <h2 class="text-center">Đăng nhập</h2>
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Username" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Log in</button>
            </div>
            <div class="clearfix">
                <label class="pull-left checkbox-inline"><input type="checkbox"> Remember me</label>
                <a href="#" class="pull-right">Forgot Password?</a>
            </div>
        </form>
        <p class="text-center"><a href="resign.php">Create an Account</a></p>
    </div>
</body>

</html>