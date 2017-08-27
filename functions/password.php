<?php

	Class Password {

		public function changePassword($datacon, $username, $question, $answer){
			
			$sql = "SELECT security.*, users.username 
					FROM security
					LEFT JOIN users
					ON (users.id = security.user_id)
					WHERE users.username = '$username'";
			$query = mysqli_query($datacon->con, $sql);
			if (!$query) {
			    header("location: ../index.php?error=true");
			} else {
				$questionInfo = mysqli_fetch_assoc($query);
				if($questionInfo['secq_ans'] == $answer){
					header("location: ../change_password.php?changePassword=true&user=" . $username);
				} else {
					header("location: ../index.php?invalid=true");
				}
				
			}
		}

		public function newPassword($datacon, $username, $password){
			$sql = "UPDATE users SET 
					password = md5('$password')
					WHERE username = '$username'";
			$query = mysqli_query($datacon->con, $sql);
			if(!$query){
			    header("location:../index.php?error=true");
			} else {
				header("location:../index.php");
			}
		}

	}

	require 'password_options.php';

?>