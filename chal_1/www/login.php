<?php

session_start();

if ( isset($_REQUEST['username']) && isset($_REQUEST['password']) ) {

	$username = $_REQUEST['username'];
	$password = $_REQUEST['password'];

	try {
		$db = new PDO('sqlite:users.db');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT username, password FROM users WHERE username = :username";
		$stmt = $db->prepare($sql);
		$stmt->execute(array(':username' => $username));

		$row = $stmt->fetch();

		if ( password_verify($password, $row['password']) ) {
			$_SESSION['loggedIn'] = true;
			$_SESSION['username'] = $username;
			$obj->success = true;
			die(json_encode($obj));
		} else {
			$obj->success = false;
			$obj->msg = "Incorrect credentials";
			die(json_encode($obj));
		}
	} catch (PDOException $e) {
		$obj->success = false;
		$obj->msg = "An error occured";
		die(json_encode($obj));
	}
} else {
	$obj->success = false;
	$obj->msg = "Username and password required";
	die(json_encode($obj));
}
?>
