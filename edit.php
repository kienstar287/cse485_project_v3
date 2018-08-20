<?php
include("lib_db.php");
include("checklogin.php");
$user = checkLoggedUser();
//nho sua lai ten db trong file lib_db.php dong 12

//get input
$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : 0;
//echo "id=[$id]"; exit();
//tao sql
$sql = "select * from mvc_product where id={$id}";
//echo "sql=[$sql]"; exit();
//Thuc thi sql
$data = select_one($sql);
//print_r($data);exit();

$sqlCate = "select * from mvc_category";
//echo "sqlCate=[$sqlCate]"; exit();
//Thuc thi sql

$categories = select_list($sqlCate);
//print_r($categories);exit();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Sua sản phẩm</title>
	<meta http-equiv="Content-Type" content="text/shtml; charset=utf-8" />
	<link rel="icon" href="images/favicon.png" type="image/png" />
	<link type="text/css" href="css/admin.css" rel="stylesheet" media="screen"/>
</head>

<body>
<div class="header">
</div>
<div class="content">
	<h1>Sua sản phẩm</h1><!-- ten san pham -->
	<br/>
	<form action="edit_exec.php" method="post">
		<input type="hidden" name="id" value="<?php echo $data['id']?>"/>
		<div class="row-edit">
			<label>Chuyên mục</label>
			<select name="cid">
				<option value="">Hay chon chuyen muc</option>
			<?php foreach ($categories as $cate) {?>
				<option value="<?php echo $cate['id']?>" 
				<?php if($cate['id'] == $data['cid']){?>
				selected
				<?php } ?>
				><?php echo $cate['name']?></option>
			<?php } ?>
			</select>
		</div>
		<div class="row-edit">
			<label>Tên sản phẩm</label>
			<input name="name" value="<?php echo $data['name']?>"/>
		</div>
		<div class="row-edit">
			<label>Giá sản phẩm</label>
			<input name="price" value="<?php echo $data['price']?>"/>
		</div>
		<div class="row-edit">
			<label>Mô tả</label>
			<textarea name="description"><?php echo $data['description']?>
			</textarea>
		</div>
		<div class="row-edit">
			<label>Chi tiết</label>
			<textarea name="body"><?php echo $data['body']?>
			</textarea>
		</div>
		<div class="row-edit">
			<button type="submit" class="save">Sua</button>
			<button type="button" onclick="return boquaForm();">Bỏ qua</button>
		</div>
	</form>
</div>
<div class="footer">
</div>
<script>
function boquaForm(){
	window.location = 'account.php';
	return false;
}
</script>
</body>
</html>
