<?php

include 'classes/Functions.php';
if (!isset($_SESSION['user'])) {

	echo "<script>alert('Please Login First')</script>";
	header("location: index.php");
}

$obj = new User();
$user_info = $obj->getCurrentUserInfo();

?>


<!doctype html>
<html lang="en-US">
<head>

  <title>User Profile </title>


  <link rel="stylesheet" type="text/css" media="all" href="style/styles.css">

</head>

<body>


  <div id="w">
    <div id="content" class="clearfix">
      <div id="userphoto"><button> <a href="logout.php">Logout</a></button></div>
      <h1><?php echo $user_info['name']; ?></h1>






        <p>Edit your user settings:</p>

        <p class="setting"><span>E-mail Address </span><?php echo $user_info['email']; ?> </p>

        <p class="setting"><span>Date Of Birth</span><?php echo $user_info['dob']; ?></p>

        <p class="setting"><span>Mobile</span><?php echo $user_info['mobile']; ?></p>

        <p class="setting"><span>Adress </span><?php echo $user_info['adress']; ?></p>



    </div><!-- @end #content -->
  </div><!-- @end #w -->

</body>
</html>