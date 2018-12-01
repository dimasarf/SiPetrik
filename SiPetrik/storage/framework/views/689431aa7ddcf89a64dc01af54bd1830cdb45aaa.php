
<style type="text/css">
	.bg{
	background: url('/images/bg.jpg') no-repeat; 
	width: 100%; 
	height:100vh;
}

.form-conatiner{  
/*	-webkit-box-shadow: 1px 4px 26px 11px rgba(204,183,204,0.63);
	-moz-box-shadow: 1px 4px 26px 11px rgba(204,183,204,0.63);
	box-shadow: 1px 4px 26px 11px rgba(204,183,204,0.63);
	border: 1px solid#fff;
	border-radius: 66px 73px 113px 10px;*/
	background-color: #4E6472;
	border-radius: 37px 37px 37px 37px;
	-moz-border-radius: 37px 37px 37px 37px;
	-webkit-border-radius: 37px 37px 37px 37px;
	border: 1px solid:none;
	margin-top: 20vh;
	padding: 80px 50px;
	
}

.transbg{
	background-color: rgb(0, 0, 0);	
	background-color: rgba(0, 0, 0, 0.6);	
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);	
	-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";
}


.form-group{
	text-align: center;
	color: #fff;
	margin-bottom: 20px;
  	border-top-left-radius: 0;
  	border-top-right-radius: 0;
}

.btnSubmit{
	opacity: 1;
}

.checkbox{
	text-align: center;
	color: #fff;
}
.form-signin .btn {
  font-size: 80%;
  border-radius: 5rem;
  letter-spacing: .1rem;
  font-weight: bold;
  padding: 1rem;
  transition: all 0.2s;
}
button{
border-radius: 141px 141px 141px 141px;
-moz-border-radius: 141px 141px 141px 141px;
-webkit-border-radius: 141px 141px 141px 141px;
border: 0px solid #000000;
}
</style>



<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
	</script>
	
</head>

<body>
	<div class="container-fluid bg">
		<div class="row ">
			<div class="col-md-7 col-sm-4 col-xs-12"></div>
			<div class="col-md-4 col-sm-4 col-xs-12 float-right">
				<!--form start-->
					<form class="form-conatiner transbg">
					  <div class="form-group">
					  	<h1 class="h3 mb-4 font-weight-normal">Masuk</h1><br>
						  <label for="inputEmail" class="sr-only">Alamat Email</label>
					      <input type="email" id="inputEmail" class="form-control" placeholder="Alamat Email" required autofocus><br>
					      <label for="inputPassword" class="sr-only">Password</label>
					      <input type="password" id="inputPassword" class="form-control" placeholder="Password" required> 
					  </div>
					  <div class="checkbox">
					    <label>
					      <input type="checkbox"> Ingatkan Saya
					    </label>
					  </div>
					  <button type="submit" class="btn btn-success btn-block btnS" style="background-color: #327ba7; border-color: #327ba7;">Submit</button>
					</form>
				<!--form end-->
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12"></div>
		</div>
	</div>
</body>
</html>

