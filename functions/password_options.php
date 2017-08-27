<?php

	if(isset($_GET['changePassword'])){
		require 'connect.php';
		$database = new Database();
		$activity = new Password();

    	$username = mysqli_real_escape_string($database->con, $_POST['username']);
		$question = mysqli_real_escape_string($database->con, $_POST['question']);
		$answer = md5(mysqli_real_escape_string($database->con, $_POST['answer']));

		$activity->changePassword($database, $username, $question, $answer);
	}

	if(isset($_GET['newPassword'])){
		require 'connect.php';
		$database = new Database();
		$activity = new Password();

		$username = $_GET['username'];
    	$password = mysqli_real_escape_string($database->con, $_POST['password']);
		$rpassword = mysqli_real_escape_string($database->con, $_POST['rpassword']);

		if($password == $rpassword){
			$activity->newPassword($database, $username, $password);
		} else {
			header("location:../index.php?error=true");
		}
	
	}

?>