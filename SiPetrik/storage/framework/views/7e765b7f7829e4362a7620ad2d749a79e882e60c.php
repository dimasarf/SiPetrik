
<style type="text/css">
	html,
  body {
	height: 100%;
  }
  
  body {
	display: -ms-flexbox;
	display: flex;
	-ms-flex-align: center;
	align-items: center;
	padding-top: 40px;
	padding-bottom: 40px;
	background-color: #f5f5f5;
	 background: url("/images/gamb.jpg") no-repeat center center fixed; 
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
  
  }
  
  .form-signin {
	width: 100%;
	max-width: 330px;
	padding: 15px;
	margin: auto;
	background-color: rgb(0, 0, 0); 
	background-color: rgba(0, 0, 0, 0.6); 
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);  
	-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";
	border-radius: 61px 61px 61px 61px;
  -moz-border-radius: 61px 61px 61px 61px;
  -webkit-border-radius: 61px 61px 61px 61px;
  border: 0px solid #000000;
  }
  .form-signin .checkbox {
	font-weight: 400;
  }
  .form-signin .form-control {
	position: relative;
	box-sizing: border-box;
	height: auto;
	padding: 10px;
	font-size: 16px;
  }
  .form-signin .form-control:focus {
	z-index: 2;
  }
  .form-signin input[type="email"] {
	margin-bottom: -1px;
	border-bottom-right-radius: 0;
	border-bottom-left-radius: 0;
  }
  .form-signin input[type="password"] {
	margin-bottom: 10px;
	border-top-left-radius: 0;
	border-top-right-radius: 0;
  }
  
  
  }
  </style>
  <!doctype html>
  <html lang="en">
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="description" content="">
	  <meta name="author" content="">
	  <link rel="icon" href="../../../../favicon.ico">
  <title>Login SiPetrik</title>
  
	  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  
	  <!-- Custom styles for this template -->
	  <link rel="stylesheet" type="text/css">
	</head>
  
	<body class="text-center" >
            <?php echo e(__('Login')); ?>

	  <form method="POST" class="form-signin" action="<?php echo e(route('admin.login')); ?>">
            <?php echo csrf_field(); ?>
		<img class="mb-4" src="/images/lopetzz.png" alt="" width="72" height="72">
		<h1 class="h3 mb-3 font-weight-height" style="color: white">MASUK Admin</h1>
		<label for="inputEmail" class="sr-only">Alamat Email
            <?php echo e(__('E-Mail Address')); ?>

        </label>
        <input type="email" id="inputEmail" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" placeholder="Masukkan Email" required autofocus><br>
        <?php if($errors->has('email')): ?>
        <span class="invalid-feedback" role="alert">
            <strong><?php echo e($errors->first('email')); ?></strong>
        </span>
        <?php endif; ?>
		<label for="inputPassword" class="sr-only">Password
            <?php echo e(__('Password')); ?>

        </label>
        <input type="password" id="inputPassword" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" placeholder="Password" name="password" required>>
        <?php if($errors->has('password')): ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($errors->first('password')); ?></strong>
            </span>
        <?php endif; ?>
		<button class="btn btn-md btn-primary btn-block mt-5" type="submit"><?php echo e(__('Login')); ?></button>
		<p class="mt-5 mb-3 font-weight-normal" style="color: white">&copy; SiPetrik | DimasBeban</p>
	  </form>
  
	</body>
  </html>
  