
<?php


if(isset($_POST['dang_nhap']))
{
	//lấy dữ liệu ô input
	$email = $_POST['mail'];
	$password = $_POST['pass'];
	//kiểm tra tài khoản hợp lệ hay không
	$sql = "SELECT * FROM user WHERE user_mail='$email'";
	$query = mysqli_query($conn , $sql);
	$num = mysqli_num_rows($query);
	if($num > 0){
		$user = mysqli_fetch_row($query);
		$hashed_password = $user[3]; //Cột thứ 3 trong table là password
		//So sánh hashed password với pass đã nhập:
		if(password_verify($password,$hashed_password)){
			if($user[4] == "1"){
				$_SESSION['email']=$email;
				$_SESSION['password'] = $password;
				//chuyển hướng đến trang admin.php nếu tài khoản chính xác
				header("location:index.php");
			}else{
				$thongbao = "Bạn không đủ quyền truy cập trang hiện tại";
			}
		}else{
			$thongbao="Mật khẩu không chính xác!";	
		}	
	}
	else {
		//tạo biến $thongbao mang giá trị là:"Sai tài khoản hoặc mật khẩu"
		$thongbao="Không tồn tại người dùng trên!";
	}
	if(isset($_POST['remember'])){
		setcookie('username' , $email , time() + (86400*30) );
		setcookie('pass' , $password ,time() + (86400*30) );
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Vietpro Mobile Shop - Administrator</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Vietpro Mobile Shop - Administrator</div>
				<div class="panel-body">

					<?php if(isset($thongbao)) { ?>
						<div class="alert alert-danger"><?php echo $thongbao ?></div>

					<?php }?>


					<form role="form" method="post">
						<fieldset>
							<div class="form-group">
								<input required class="form-control" placeholder="E-mail" value="<?php if(isset($_COOKIE['username'])){echo $_COOKIE['username'];} ?>" name="mail" type="email" autofocus>
							</div>
							<div class="form-group">
								<input required  class="form-control" placeholder="Mật khẩu" value="<?php if(isset($_COOKIE['pass'])){echo $_COOKIE['pass'];} ?>" name="pass" type="password" value="">
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="<?php if(isset($_COOKIE['username'])){echo $_COOKIE['checked'];} ?>">Nhớ tài khoản
								</label>
							</div>
							<div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>
							<button name='dang_nhap' type="submit" class="btn btn-primary">Đăng nhập</button>
							
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
</body>

</html>
<script src='https://www.google.com/recaptcha/api.js'></script>