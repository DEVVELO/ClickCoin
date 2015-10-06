<?php
ob_start();
session_start();

include('connect.php');


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
        <li class="active"><a href="login.php">Login</a></li>
		<li><a href="register.php">Register</a></li>
	      </ul>
    </div>
  </div>
</nav><center>
	<?php

	    if(isset($_POST["submit"])){
	        $username = $_POST["username"];
			$password = $_POST['password'];
		
		
	        $username = trim(cleanInput(mysqli_real_escape_string($con,$username)));
	$username = htmlspecialchars($username);
	
        $password = trim(cleanInput(mysqli_real_escape_string($con,$password)));
$password = htmlspecialchars($password);
        
	        $get_data = mysqli_query($con,"SELECT * FROM users WHERE username='$username' AND password='$password'");
			
			$status = "";
			while($get_user_data = mysqli_fetch_array($get_data)){
			
				$status = $get_user_data['status'];
			
			}

	        $user_exist = mysqli_num_rows($get_data);
       
	   
			if(!$user_exist == 1){
			
				echo '<div class="alert alert-dismissible alert-danger" style="width:600px;">
 
		  <strong>Error!</strong> Wrong login details
		</div>';
			
			}elseif($status == 0){
			
				echo '<div class="alert alert-dismissible alert-danger" style="width:600px;">
 
		  <strong>Error!</strong> User is not activated, click on the link in the email we sent you!
		</div>';
			
			}elseif($status == 2){
			
				echo '<div class="alert alert-dismissible alert-danger" style="width:600px;">
 
		  <strong>Error!</strong> User banned
		</div>';
			
			}else{
				echo '<div class="alert alert-dismissible alert-success" style="width:600px;">
 
		  <strong>Success!</strong> Now session variables will be set and page will redirect to members dashboard.
		</div>';
			
			}
	   
		
    
		}
		
		
	?>
	
	
	
	<div class="panel panel-primary" style="width:800px;">
	  <div class="panel-heading">
	    <h3 class="panel-title">Login</h3>
	  </div>
	  <div class="panel-body">
   
  
   	<form method="POST" action="login.php">
   		<div class="form-group" style="width:300px;">
   		  <label class="control-label" for="inputDefault">Username</label>
		  
		  
   		  <input type="text" class="form-control" id="inputDefault" name="username" required/><br>
		  
   		  <label class="control-label" for="inputDefault">Password</label>
		  
		  
   		  <input type="password" class="form-control" id="inputDefault" name="password" required/><br>
		  
		  
		  
   		  <button type="reset" class="btn btn-default">Cancel</button>&nbsp;&nbsp;&nbsp;&nbsp;
   		  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
   		</div>
   	</form>
	
	
	  </div>
	</div>
	

	

<br><br><br><br><br><br><br><br><br><br><br>


<p class="text-muted" style="overflow:hidden;position:flex;bottom:0%;"><b>Copyright&copy; 2015 ClickCoin</b></p>
</center>
</html>
<?php
	
ob_end_flush();
	
?>