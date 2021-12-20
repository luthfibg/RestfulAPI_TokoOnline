<!-- <?php
// require_once "../_configs/config.php";

// if (isset($_SESSION['user'])){
	// echo "<script>window.location='".base_url()."';</script>";
// } else {
?> -->


<!DOCTYPE html>
<html lang="en">
<head>

	<!-- meta tags -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- link: bootstrap css, js, google fonts, assets -->
	<link rel="stylesheet" type="text/css" href="<?=base_url('_assets/css/bootstrap.min.css')?>">
	<link rel="icon" href="<?=base_url('_assets/nlogow.png')?>">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Arial|Geneva|Muli&display=swap">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
	<!-- bootstrap v5.1.2 -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>

	<!-- title page -->
	<title>Tokoboom - User Login</title>

	<!-- script code -->
	<script type="text/javascript">
		function base_url($url = null){
			$base_url = "http://nova_sophist.test";
			if ($url != null){
				return $base_url."/".$url;
			} else {
				return $base_url;
			}
		}
		
		function change() {
			var x = document.getElementById('passid').type;

			if(x == 'password') {
				document.getElementById('passid').type = 'text';
				document.getElementById('show-hide').innerHTML = '<i class="bi bi-eye-slash-fill" style="font-size: 1rem;"></i>';
			}
			else if (x == 'text') {
				document.getElementById('passid').type = 'password';
				document.getElementById('show-hide').innerHTML = '<i class="bi bi-eye-fill" style="font-size: 1rem;"></i>';
			}

		}
	</script>

	<!-- css style -->
	<style type="text/css">
		body {
			font-family: 'Muli', Geneva, Arial, sans-serif;
			background-color: #ebf9fb;
		}

		h1 {
			text-align: center;
			font-weight: 300; 
		}

		form {
			margin-top: 0px;
		}

		.login-title {
			text-align: center;
			text-transform: uppercase;
			margin-bottom: 40px;
		}

		.login-box {
			width: 280px;
			background: #fff;
			margin: 80px auto;
			padding: 20px 15px;
			box-shadow: 0px 0px 100px 4px #d6d6d6;
		}

		label {
			font-size: 10pt;
			font-weight: 200;
		}

		.login-form {
			box-sizing: border-box;
			width: 100%;
			padding: 5px;
			font-size: 10pt;
			margin-bottom: 10px;
			outline: none;
		}

		.login-form::-webkit-input-placeholder {
			color: #03a9f3;
			opacity: 0.5;
		}
		.login-form:-moz-input-placeholder {
			color: #03a9f3;
			opacity: 0.5;
		}
		.login-form:-ms-input-placeholder {
			color: #03a9f3;
			opacity: 0.5;
		}
		.login-form:-o-input-placeholder {
			color: #03a9f3;
			opacity: 0.5;
		}

		.sub-btn {
			background: #03a9f3;
			color: #fff;
			font-size: 10pt;
			width: 100%;
			border: none;
			border-radius: 3px;
			padding: 8px 15px; 
		}
		.sub-btn:hover {
			background: #036;
			cursor: pointer;
		}
		.sub-signup {
			background-color: #fff;
			border: 1px solid #666;
			color: #666;
			font-size: 10px;
		}

		.sub-signup:hover {
			background: #ebf9fb;
		}

		.form-group {
			padding: 0;
		}

		#show-hide {
			position: relative;
			cursor: pointer;
			color: #03a9f3;
			left: 45%;
			top: -35px;
			padding: 5px;
		}

		.link-reset {
			color: #03a9f3;
			text-decoration: none;
			font-size: 9px;
		}

		.alert {
			background: #e44e4e;
			color: #fff;
			padding: 3px;
			text-align: center;
			font-size: 9px;
			border: 1px solid #b32929;
		}

		span {
			font-size: 9px;
		}
	</style>
</head>
<body>

	<!-- warning unmatch input user -->
	<!-- <?php
	// if (isset($_GET['message'])){
		// if ($_GET['message'] == "failed"){
			// echo "<div class='alert alert-warning'><button type='button' class='btn-close' data-bs-dismiss='alert'></button>Username and password is not match any data</div>";
		// }
	// }
	?>
 -->
	<div class="login-box" style="text-align: center;">
		<p class="login-title">Tokoboom Login</p>


		<!-- check user identity validity -->
		<!-- <?php
		// if (isset($_POST['login'])) {

			// get user input
			// $user = trim(mysqli_real_escape_string($conn, $_POST['user']));
			// $pass = sha1(trim(mysqli_real_escape_string($conn, $_POST['pass']))); //SHA1 encryption key
			// $sql_login = mysqli_query($conn, "select * from tb_users where username = '$user' and password = '$pass'") or die (mysqli_error($conn));

			//checking validity
			// if (mysqli_num_rows($sql_login) > 0){
				// $datas = mysqli_fetch_assoc($sql_login);

				//login multirole handler
				// if ($datas['role'] == 'engineer') {
					// $_SESSION['user'] = $user;
					// $_SESSION['role'] = "engineer";

					//go to certain page
					// echo "<script>window.location='".base_url()."';</script>";
				// } else if ($datas['role'] == 'admin') {
					// $_SESSION['user'] = $user;
					// $_SESSION['role'] = "admin";

					//go to certain page
					// echo "<script>window.location='".base_url()."';</script>";
				// } else if ($datas['role'] == 'public') {
					// $_SESSION['user'] = $user;
					// $_SESSION['role'] = "public";

					//go to certain page
					// echo "<script>window.location='".base_url('../public/pdashboard')."';</script>";
				// }
				
			// } else { ?>

				<div class="row">
					<div class="col-lg-6 col-lg-offset-3">
						<div class="alert alert-warning alert-dismissible">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<strong>Login failed!</strong> wrong username or password
							<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
						</div>
					</div>
				</div>
			<?php
			// }
		// }
		?> -->

		<!-- input form -->
		<form action="" method="POST">
			<!-- <label>Username</label> -->
			<input type="text" name="user" class="login-form" style="font-family: 'Muli', Geneva, Arial, sans-serif; font-size: 10px;" placeholder="Username..." autocomplete="off">

			<!-- <label>Password</label> -->
			<div class="form-group">
				<input type="password" name="pass" id="passid" class="login-form" style="font-family: 'Muli', Geneva, Arial, sans-serif; font-size: 10px;" placeholder="Password..." autocomplete="off">

				<!-- hide/show password feature -->
				<span id="show-hide" onclick="change()">
					<i class="bi bi-eye-fill" style="font-size: 1rem;"></i>
				</span>
			</div>	
			
			
			<!-- CTA buttons group -->
			<input type="submit" name="login" class="sub-btn sub-login" style="margin-top: 20px;" value="Login">
			<input type="submit" name="signup" class="sub-btn sub-signup" style="margin-top: 10px;" value="Sign Up">

		<br/>
		<br/>

		<!-- error handling and help -->
		<span>
				<center>Forgot password? Click <a class="link-reset" href="#">here</a> to reset.</center>
		</span>

		</form>
	</div>

	<!-- embed external script -->
	<script src="<?=base_url('_assets/js/jquery.js')?>"></script>
	<script src="<?=base_url('_assets/js/bootstrap.min.js')?>"></script>

</body>
</html>

<!-- <?php
// }
?> -->