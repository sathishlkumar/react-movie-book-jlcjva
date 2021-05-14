<?php


session_start();

if (isset($_POST['submit'])) {
	

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "admin";


$conn = mysqli_connect($dbServername,$dbUsername, $dbPassword, $dbName);


	$uid = mysqli_real_escape_string($conn, $_POST['username']);
	$pwd = mysqli_real_escape_string($conn, $_POST['password']);

	//Error handlers
	//Check if inputs are empty
	if (empty($uid) || empty($pwd)) {
		header("Location: ../index.php?login=empty");
		$_SESSION['errors'] = array("Your username or password was incorrect.");
		exit();
	} else {
		$sql = "SELECT * FROM root WHERE main='$uid'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			$_SESSION['errors'] = array("Your username or password was incorrect.");
			header("Location: ../index.php?login=error");
			exit();
		} else {
			if ($row = mysqli_fetch_assoc($result)) {
				//De-hashing the password
				$hashedPwdCheck = password_verify($pwd, $row['main_pass']);
				if ($hashedPwdCheck == false) {
					$_SESSION['errors'] = array("Your username or password was incorrect.");
					header("Location: ../index.php?login=error");
					exit();
				} elseif ($hashedPwdCheck == true) {
					//Log in the user here
					$_SESSION['u_id'] = $row['main'];
					header("Location: ../second.php?login=success");
					exit();
				}
			}
		}
	}
} else {
	header("Location: ../index.php?login=error");
	$_SESSION['errors'] = array("Your username or password was incorrect.");
	exit();
}
