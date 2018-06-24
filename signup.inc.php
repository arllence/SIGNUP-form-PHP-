
<?php

if(isset($_POST['submit'])){
  include_once 'db.inc.php';
//creating variables for form inputs
    $firstname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);
    $vpassword = mysqli_real_escape_string($conn, $_POST['vpass']);

//ERROR HANDLERS
    //check if fields are empty
    if(empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($vpassword)){
     header("Location: ../index.php?signup=empty");

     exit();
    }
	else{
		if(!preg_match("/[a-zA-Z]/", $firstname) || !preg_match("/[a-zA-Z]/", $lastname)){
		header("Location: ../index.php?signup=Invalid_xters");
		exit();
		}

	else{
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		header("Location: ../index.php?signup=email_error");
		exit();
		}

	else{
		if($password != $vpassword){
		header("Location: ../index.php?signup=password_dont_match!");
		}

    else{
      //insert the user into the database
				$hashedpwd=password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO users (firstname, lastname, email, password) VALUES ('$firstname', '$lastname', '$email', '$$hashedpwd')";
                mysqli_query($conn, $sql); //inserts data in db

                header("Location: ../home.php?signup=SUCCESS");
                exit();
        }
	   }
   }
}
    }
    else{
        //if user skips submit button load sign up page
        header("Location: ../index.php?signup=fill_the_blanks");
        exit(); //closes off (stops) the script from running
    }
