<?php
include('connect.php');
ob_start();
session_start();

function cleanInput($input) {
 
  $search = array(
    '@<script[^>]*?>.*?</script>@si',  
    '@<[\/\!]*?[^<>]*?>@si',           
    '@<style[^>]*?>.*?</style>@siU',   
    '@<![\s\S]*?--[ \t\n\r]*>@'       
  );
 
    $output = preg_replace($search, '', $input);
   
    return $output;
  }
	
	
?>

<html>
<head>
	
	<link rel="stylesheet" type="stylesheet/css" href="css/main.css">
</head>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">ClickCoin</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
	  <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php">Login</a></li>
		<li  class="active"><a href="register.php">Register</a></li>
	      </ul>
    </div>
  </div>
</nav><center><br>


<br><br><br>
<div class="panel panel-primary" style="width:800px;">
  <div class="panel-heading">
    <h3 class="panel-title">Register</h3>
  </div>
  <div class="panel-body">
  	<form method="POST" action="register.php">
  		<div class="form-group" style="width:300px;">
  		  <label class="control-label" for="inputDefault">Name</label>
  		  <input type="text" class="form-control" id="inputDefault" name="name"><br>
  		  <label class="control-label" for="inputDefault">Username</label>
  		  <input type="text" class="form-control" id="inputDefault" name="username"><br>
  		  <label class="control-label" for="inputDefault">Email</label>
  		  <input type="text" class="form-control" id="inputDefault" name="email"><br>
  		  <label class="control-label" for="inputDefault">Password</label>
  		  <input type="password" class="form-control" id="inputDefault" name="password"><br>
  		  <button type="reset" class="btn btn-default">Cancel</button>&nbsp;&nbsp;&nbsp;&nbsp;
  		  <button type="submit" class="btn btn-primary" name="submit1">Submit</button>
  </div>
  </div>
</div>
		
		
	</form>
	<?php
	if(isset($_POST['submit1'])){
	$name = $_POST["name"];
	$username = $_POST["username"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	
	$check_user = mysqli_query($con,"SELECT * FROM users WHERE username='$username' AND email='$email'");
	$num_e_user = mysqli_num_rows($check_user);
	
	if($num_e_user == 0){
	
	mysqli_query($con,"INSERT INTO users(name,username,email,password) VALUES('$name','$username','$email','$password')");
	
	echo '<div class="alert alert-dismissible alert-success" style="position:absolute;left:40%;top:14%; width:300px;">
  <button type="button" class="close" data-dismiss="alert"></button>
  <strong style="font-size:9px;>Well done!<br><br></strong><a class="alert-link" style="font-size:8%;">Your registration has been <strong>successfully</strong> done.</a>
</div>';

		
}else{
	
	echo "You need to choose another username or email";
	
}

}
	?>
<br><br>

<p class="text-muted" style="overflow:hidden;position:flex;bottom:0%;"><b>Copyright&copy; 2015 ClickCoin</b></p>
</center>
</html>