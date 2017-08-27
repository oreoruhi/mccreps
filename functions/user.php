<?php

	Class User {

		public function userInfo($datacon){
			$u_id = $_SESSION['u_id'];
			$sql = "SELECT * FROM users
					LEFT JOIN sys_position
					ON (users.sys_id = sys_position.id)
					LEFT JOIN institutes
					ON (users.ins_id = institutes.id)
					WHERE users.id = '$u_id'";
			$query = mysqli_query($datacon->con, $sql);
			if(!$query){
				header("location: ../index.php?error=true");
			} else {
				$userInfo = mysqli_fetch_assoc($query);
				return $userInfo;
			}
		}

		public function editUser($datacon, $firstname, $middlename, $lastname, $username, $folder){
			$u_id = $_SESSION['u_id'];
			$sql = "UPDATE users SET 
					firstname = '$firstname',
					middlename = '$middlename',
					lastname = '$lastname',
					username = '$username'
					WHERE id = '$u_id'";
			$query = mysqli_query($datacon->con, $sql);
			if(!$query){
				header("location:../" . $folder . "/index.php?error=true");
			} else {
				header("location:../" . $folder . "/index.php?user_updated=true");
			}
		}

		public function editPicture($datacon, $target_file, $folder){
			$u_id = $_SESSION['u_id'];
			$sql = "UPDATE users SET 
					display_picture = '$target_file'
					WHERE id = '$u_id'";
			$query = mysqli_query($datacon->con, $sql);
			if(!$query){
			    header("location:../" . $folder . "/index.php?error=true");
			} else {
				header("location:../" . $folder . "/index.php?display_picture=true");
			}
		}

		public function editPassword($datacon, $password, $folder){
			$u_id = $_SESSION['u_id'];
			$sql = "UPDATE users SET 
					password = md5('$password')
					WHERE id = '$u_id'";
			$query = mysqli_query($datacon->con, $sql);
			if(!$query){
			    header("location:../" . $folder . "/index.php?error=true");
			} else {
				header("location:../" . $folder . "/index.php?password=true");
			}	
		}

	}

	require 'user_options.php'

?>