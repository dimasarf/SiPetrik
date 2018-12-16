

  <!DOCTYPE html>
<html lang="en">
<head>
	<title>Login SiPetrik</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/logoz.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/logoz.png');">
			<div class="wrap-login100 p-t-190 p-b-30">
				<form class="login100-form validate-form" method="POST" action="<?php echo e(route('admin.login')); ?>">
					<div class="login100-form-avatar">
						<img src="images/logoz.png" alt="AVATAR">
					</div>

					<span class="login100-form-title p-t-20 p-b-45">
						Login
                    </span>

                    
                        <?php echo csrf_field(); ?>
                        <div class="wrap-input100 validate-input m-b-10" >
                                <input class="input100 form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" type="email" name="email" placeholder="Email">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-user"></i>
                                </span>
                                <?php if($errors->has('email')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                </span>
                                <?php endif; ?>
                        </div>

                        <div class="wrap-input100 validate-input m-b-10" >
                                <input class="input100" type="password" name="password" placeholder="Password">
                                <?php if($errors->has('password')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-lock"></i>
                                </span>
                            </div>
                            <button type="submit" class="login100-form-btn">
                                    <?php echo e(__('Login')); ?>

                            </button>
                            <div class="container-login100-form-btn p-t-10">
                                
                            </div>

					<div class="text-center w-full p-t-25 p-b-230">
						<a href="#" class="txt1">
							Pastikan email dan password mu valid
						</a>
					</div>

					<div class="text-center w-full">
						<a class="txt1" href="#">
							DimasBeban  |  SiPetrik				
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>