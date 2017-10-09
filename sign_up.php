
<?php

if (isset($_SESSION['user'])) {
	header("location: profile.php");
}
require 'classes/Functions.php';
$obj_register = new User();

if (isset($_POST['register'])) {

	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];
	$mobile = $_POST['mobile'];
	$dob = $_POST['dob'];
	$adress = $_POST['adress'];

	if ($confirm_password != $password) {
		echo "<script>alert('Password Not Matched')</script>";
	} else {
		if ($obj_register->isUserExist($name, $email, $password)) {
			echo "<script>alert('Email Already registered')</script>";
		} else {
			$user = $obj_register->UserRegister($name, $email, $password, $mobile, $dob, $adress);
			if ($user) {
				echo "success";
			} else {
				echo "error register";
			}
		}
	}
}

?>


<!DOCTYPE html>
<html>
<style>
/* Full-width input fields */
input[type=text], input[type=password], input[type=email],input[type=date] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

/* Extra styles for the cancel button */
.cancelbtn {
    padding: 14px 20px;
    background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn,.signupbtn {
    float: left;
    width: 50%;
}

/* Add padding to container elements */
.container {
    padding: 16px;
}

/* Clear floats */
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 100px) {
    .cancelbtn, .signupbtn {
       width: 100%;
    }
}
</style>
<body>

<h2 style="text-align: center;">Signup Form</h2>


<form action="" method="post" style="border:1px solid #ccc;width:400px;margin: 0 auto" >
  <div class="container">
  	<label><b>Name</b></label>
    <input type="text" placeholder="Enter Full Name" name="name" required>
    <label><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <label><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="confirm_password" required>
    <label><b>Mobile</b></label>
    <input type="text" placeholder="Enter 10 Digit Mobile no" name="mobile" required>
    <label><b>DOB</b></label>
    <input type="date" placeholder="Enter DOB" name="dob" required>
    <label><b>Adress</b></label>
    <input type="text" placeholder="Enter Full Adress" name="adress" required>



    <div class="clearfix">
      <button type="button" class="cancelbtn" name="cancel"><a href="index.php"> Cancel</a></button>
      <button type="submit" class="signupbtn" name="register">Sign Up</button>
    </div>
  </div>
</form>

</body>
</html>
