<?php
session_start();
require 'config/Database.php';

class User extends Database {

	public function login_user($email, $password) {
		$sql = "SELECT password FROM php_practice.user where email='" . $email . "'";

		$result = pg_query($this->con, $sql);
		if (pg_num_rows($result) > 0) {
			$row = pg_fetch_assoc($result);
			if ($row['password'] == $password) {
				$_SESSION['user'] = $email;

				echo $_SESSION['user'];
				return true;
			} else {
				return false;
			}

		} else {
			return false;
		}
	}

	public function UserRegister($name, $email, $password, $mobile, $dob, $adress) {

		$password = $password;
		$stmt = "INSERT INTO php_practice.user(name,email,password,mobile,dob,adress) VALUES ('$name','$email','$password','$mobile','$dob','$adress')";

		$query = pg_query($this->con, $stmt);
		if ($query) {
			return true;
		} else {
			return false;
		}
	}

	public function isUserExist($name, $email, $password) {
		$stmt = "SELECT * FROM php_practice.user WHERE email = '$email'";
		$sql = pg_query($this->con, $stmt);
		$row = pg_num_rows($sql);
		if ($row > 0) {
			return true;
		} else {
			false;
		}

	}

	public function getCurrentUserInfo() {
		$email = $_SESSION['user'];
		$stmt = "SELECT * FROM php_practice.user WHERE email = '$email' ";
		$sql = pg_query($this->con, $stmt);
		$result = pg_fetch_assoc($sql);
		return $result;
	}

	public function CheckInput($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

}

?>