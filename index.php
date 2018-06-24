<html>
<head>
<title>Sign Up</title>
<link rel="stylesheet" href="css/main.css" />
</head>
<body>

<?php echo "<p><b>You are visitor number:". " ".rand() ."</p></b>" ?>

<h3>Create Account</h3>

 

<div class="signup-form">
<?php
if(isset($_GET['signup'])){
	$code=$_GET['signup'];
	if($code=="empty"){
		echo "<p><font color='red'>Fill in the blanks</font></p>";
	}else if ($code=="Invalid_xters"){
		echo "<p><font color='red'>Name characters invalid!</font></p>";
	}else if ($code=="email_error"){
		echo "<p><font color='red'>Use a valid E-mail format</font></p>";
	}else if ($code=="password_dont_match!"){
		echo "<p><font color='red'>Passwords dont match!</font></p>";
	}
}
?>


<form method="post" action="includes/signup.inc.php">
   <input type="text" name="fname" placeholder="first name" /><br/>
  <input type="text" name="lname" placeholder="last name" /><br/>
  <input type="email" name="email" placeholder="email" /><br/>
  <input type="password" name="pass" placeholder="password" /><br/>
  <input type="password" name="vpass" placeholder="verify password" /><br/>
  <input type="submit" name="submit" value="Sign Up"/>
</form>
</div>

</body>
<footer>
<p>Created by<b> Kingdomplus Inc.</b></p>
</footer>
</html>
