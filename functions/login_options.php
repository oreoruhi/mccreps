<?php

	$loginProcess = new Login();

	if(isset($_GET['login'])){
		$sql = "SELECT id, deadline_extension
				FROM report_schedule
				WHERE status = 'Ongoing'";

		$query = mysqli_query($loginProcess->con, $sql);
		if (!$query) {
		    header("location: ../index.php?error=true");
		} else {
			while($row = mysqli_fetch_array($query)){
				if($row['deadline_extension'] < date('Y-m-d')){
					$id = $row['id'];
					$sql = "UPDATE report_schedule
							SET status = 'Closed'
							WHERE id = '$id'";

					$query = mysqli_query($loginProcess->con, $sql);
					if (!$query) {
					    header("location: ../index.php?error=true");
					} 
				}
			}
		}

		$user = mysqli_real_escape_string($loginProcess->con, $_POST['username']);
		$pass = mysqli_real_escape_string($loginProcess->con, $_POST['password']);

		$sql = "SELECT * FROM users WHERE username = '$user' AND password = md5('$pass')";
		$query = mysqli_query($loginProcess->con, $sql);
		if (!$query) {
		    header("location: ../index.php?invalid=true");
		} else {
			$loginInfo = mysqli_fetch_assoc($query);
			if($loginInfo['status'] !== 'Archived'){
				if($loginInfo['sys_id'] == 1){
					$loginProcess->adminLogin($loginInfo);
				} else if($loginInfo['sys_id'] == 2){
					$loginProcess->vpLogin($loginInfo);
				} else if($loginInfo['sys_id'] == 3){
					$loginProcess->clerkLogin($loginInfo);
				} else if($loginInfo['sys_id'] == 4){
					$loginProcess->deanLogin($loginInfo);
				} else if($loginInfo['sys_id'] == 5){
					$loginProcess->pheadLogin($loginInfo);
				} else {
					header("location:../index.php?error=true");
				}
			} else {
				header("location: ../index.php?invalid=true");
			}
		}
	}

	if(isset($_GET['newUser'])){
	 	$new_password = mysqli_real_escape_string($loginProcess->con, $_POST['password']);
	 	$r_password = mysqli_real_escape_string($loginProcess->con, $_POST['rpassword']);
	 	$secid = mysqli_real_escape_string($loginProcess->con, $_POST['question']);
	 	$answer = mysqli_real_escape_string($loginProcess->con, $_POST['answer']);
	 	$folder = $_SESSION['folder'];

	 	if($new_password == $r_password){
	 		$loginProcess->newUserLogin($new_password, $folder, $secid, $answer);
	 	} else {
	 		header("location: index.php?error=true");
	 	}
	}

?>