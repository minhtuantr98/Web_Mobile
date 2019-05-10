<?php
if(!defined('TEMPLATE'))
{
    die('Bạn không có quyền truy cập');
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
<?php
if(isset($_SESSION['mail']) && isset($_SESSION['pass'])){
    header('location:index.php');
}
// if(isset($_COOKIE['id']) && isset($_COOKIE['pass'])){
//     header('location:index.php');
// }
if(isset($_POST['submit-login'])){
	$mail = $_POST['mail'];
	$pass = $_POST['pass'];
	$sql_tk = "SELECT * FROM user where user_mail='$mail' and user_pass='$pass' " ;
	$query = mysqli_query($conn,$sql_tk);
	$num = mysqli_num_rows($query);
	if($num >0){
		$_SESSION['mail'] = $mail;
		$_SESSION['pass'] = $pass;
		if(!empty($_POST['remember'])){
			setcookie('id',$mail,time() + 3600);
			setcookie('pass',$pass,time() + 3600);
		}
		else {
			if(isset($_COOKIE['id'])){
				setcookie('id','');
			}
			if(isset($_COOKIE['pass'])){
				setcookie('pass','');
			}
		}
		header('location:index.php');
	}
	else{
		$error = '<div class="alert alert-danger">Tài khoản không hợp lệ !</div>';
	}
}
?>
<body>
	
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Vietpro Mobile Shop - Administrator</div>
				<div class="panel-body">
					<?php
					   if(isset($error)){
						   echo $error;
					   }
					?>
					<form role="form" method="post">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="mail" type="email" autofocus value="<?php if(isset($_COOKIE['id'])){ echo $_COOKIE['id'];} ?>" >
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Mật khẩu" name="pass" type="password" value="<?php if(isset($_COOKIE['pass'])){ echo $_COOKIE['pass'];} ?>">
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" <?php if(isset($_COOKIE['id']) && isset($_COOKIE['pass'])) { ?> checked <?php } ?>>Nhớ tài khoản
								</label>
							</div>
							<button type="submit" name="submit-login" class="btn btn-primary">Đăng nhập</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
</body>

</html>
