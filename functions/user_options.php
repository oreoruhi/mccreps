<?php

if(isset($_GET['userOpt'])){
	session_start();
	require 'connect.php';
	$database = new Database();
	$user = new User();
	$folder = $_GET['folder'];

	if(isset($_GET['editProfile'])){
    	$firstname = mysqli_real_escape_string($database->con, $_POST['firstname']);
		$middlename = mysqli_real_escape_string($database->con, $_POST['middlename']);
		$lastname = mysqli_real_escape_string($database->con, $_POST['lastname']);
		$username = mysqli_real_escape_string($database->con, $_POST['username']);

		$user->editUser($database, $firstname, $middlename, $lastname, $username, $folder);
	}

	if(isset($_GET['editPicture'])){
	    if(isset($_FILES['image'])){
	    	$errors = array();
	    	$file_name = $_FILES['image']['name'];
	    	$file_size = $_FILES['image']['size'];
	    	$file_tmp = $_FILES['image']['tmp_name'];
	    	$file_type = $_FILES['image']['type'];
	    	$file_ext = strtolower(end(explode('.',$_FILES['image']['name'])));
	      
	    	$expensions = array("jpeg","jpg","png");
	      
	    	if(in_array($file_ext, $expensions) == false){
	        	$errors[] = "extension not allowed, please choose a JPEG or PNG file.";
	      	}
	      
	     	if($file_size > 2097152){
	        	$errors[] ='File size must be less than or exactly 2 MB';
	      	}
	      
	      	if(empty($errors) == true){
	         	move_uploaded_file($file_tmp,"../img/".$file_name);
	        	$user->editPicture($database, $file_name, $folder);
	      	} else {
	        	print_r($errors);
	      	}
	    }

	}

	if(isset($_GET['editPassword'])){
		$u_id = $_SESSION['u_id'];

		$sql = "SELECT password FROM users WHERE id = '$u_id'";
		$query = mysqli_query($database->con, $sql);
		if (!$query) {
		    header("location: ../index.php?invalid=true");
		} else {
			$passwordInfo = mysqli_fetch_assoc($query);
			$old_password = mysqli_real_escape_string($database->con, $_POST['old_password']);

			if(md5($old_password) == $passwordInfo['password']){
			 	$new_password = mysqli_real_escape_string($database->con, $_POST['new_password']);
			 	$r_password = mysqli_real_escape_string($database->con, $_POST['r_password']);

			 	if($new_password == $r_password){
			 		$user->editPassword($database, $new_password, $folder);
			 	} else {
			 		header("location: ../" . $folder . "/index.php?incorrect=true");
			 	}
			} else {
				header("location: ../" . $folder . "/index.php?incorrect=true");
			}
		}		
	}
}
   
?>