<?php
require 'classes/User.php';
if (session_destroy()) // Destroying All Sessions
{
	unset($_SESSION['user']);
	header("Location: index.php"); // Redirecting To Home Page
}
?>