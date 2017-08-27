<?php
	
	require 'connect.php';
	session_start();

	Class Login Extends Database {

		public function routerUser($info, $folder, $type){
			$_SESSION['type'] = $type;
			if($info['status'] == 'Active'){
				header("location: ../". $folder ."/");
			} else if($info['status'] == 'Inactive') {
				header("location: ../new_user.php?logging=true");
			} else {
				header("location: ../index.php?restricted=true");
			}
		}

		public function adminLogin($info) {
			$type = 'Administrator';
			$_SESSION['folder'] = 'admin';
			$_SESSION['u_id'] = $info['id'];
			$_SESSION['u_sys'] = $info['sys_id'];

			$folder = $_SESSION['folder'];

			$this->routerUser($info, $folder, $type);
		}

		public function vpLogin($info) {
			$type = 'VPAA';
			$_SESSION['folder'] = 'vpaa';
			$_SESSION['u_id'] = $info['id'];
			$_SESSION['u_sys'] = $info['sys_id'];

			$folder = $_SESSION['folder'];

			$this->routerUser($info, $folder, $type);
		}

		public function deanLogin($info) {
			$type = 'Dean';
			$_SESSION['folder'] = 'dean';
			$_SESSION['u_id'] = $info['id'];
			$_SESSION['u_sys'] = $info['sys_id'];
			$_SESSION['ins_id'] = $info['ins_id'];

			$folder = $_SESSION['folder'];

			$this->routerUser($info, $folder, $type);
		}

		public function clerkLogin($info) {
			$type = 'Clerk';
			$_SESSION['folder'] = 'clerk';
			$_SESSION['u_id'] = $info['id'];
			$_SESSION['u_sys'] = $info['sys_id'];
			$_SESSION['ins_id'] = $info['ins_id'];

			$folder = $_SESSION['folder'];

			$this->routerUser($info, $folder, $type);
		}

		public function pheadLogin($info) {
			$type = 'Program Head';
			$_SESSION['folder'] = 'programhead';
			$_SESSION['u_id'] = $info['id'];
			$_SESSION['u_sys'] = $info['sys_id'];
			$_SESSION['ins_id'] = $info['ins_id'];

			$folder = $_SESSION['folder'];

			$this->routerUser($info, $folder, $type);
		}

		public function newUserLogin($password, $folder, $secid, $answer){
			$u_id = $_SESSION['u_id'];
			$sql = "UPDATE users SET 
					password = md5('$password'),
					status = 'Active'
					WHERE id = '$u_id'";
			$query = mysqli_query($this->con, $sql);
			if(!$query){
			    header("location:../index.php?error=true");
			} else {
				$sql = "INSERT INTO security
						VALUES(null, '$secid', md5('$answer'), '$u_id')";
				$query = mysqli_query($this->con, $sql);

				if(!$query){
				    header("location:../index.php?error=true");
				} else {
					header("location:../" . $folder . "/index.php");	
				}	
			}	
		}

	}

	require 'login_options.php';

?>