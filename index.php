<?php

include 'classes/User.php';
if (isset($_SESSION['user'])) {
	header("location: profile.php");
}
$obj_login = new User();
$e_empty = "";
$p_empty = "";
$email = "";
$password = "";
if (isset($_POST['signup'])) {

	header("location: sign_up.php");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$email = $_POST['email'];
	$password = $_POST['Password'];
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

		$res = $obj_login->login_user($email, $password);
		if ($res) {
			echo "<script>alert('Welcome')</script>";
			echo "<script>location= 'profile.php';</script>";

		} else {
			echo "<script>alert('Wrong password')</script>";
		}
	} else {
		echo "<script>alert('Invalid Email Adress!!!')</script>";

	}
}
?>
<DOCTYPE html>
<html>
<head>
	<title>
		PHP-Exercise
	</title>
</head>
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
    background-color: #4682B4;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn,.signupbtn {
    float: left;
    width: 100%;
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


		<form method="post" style="border:1px solid #ccc;width:400px;margin: 0 auto">
			<div class="container">
				<label><b>Email</b></label>
				<input type="text" name="email" value="<?php echo $email; ?>" /><br>          <?php echo $e_empty; ?><br>
				<label><b>Password</b></label>
				<input type="Password" name="Password"/><br>     <?php echo $p_empty; ?><br>
				<div class="clearfix">
					<button type="submit" class="signupbtn" name="submit">Login</button></br>
					<p  style="margin: 0 auto; text-align: center;">OR</p>
					<button type="submit" class="cancelbtn" name="signup">Sign Up</button></br>


				</div>

			</div>
		</form>

</body>
</html>