<?php

if(isset($_GET['activityOpt'])){

	session_start();
	require 'connect.php';
	$database = new Database();
	$activity = new Activity();
	$folder = $_GET['folder'];		

	if(isset($_GET['addInstitute'])){
    	$insname = mysqli_real_escape_string($database->con, $_POST['insname']);
		$insabb = mysqli_real_escape_string($database->con, $_POST['insabb']);


	    if(isset($_FILES['image'])){
	    	$errors = array();
	    	$file_name = $_FILES['image']['name'];
	    	$file_size = $_FILES['image']['size'];
	    	$file_tmp = $_FILES['image']['tmp_name'];
	    	$file_type = $_FILES['image']['type'];
	    	$file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));
	      
	    	$expensions = array("jpeg","jpg","png");
	      
	    	if(in_array($file_ext, $expensions) == false){
	        	$errors[] = "extension not allowed, please choose a JPEG or PNG file.";
	      	}
	      
	     	if($file_size > 2097152){
	        	$errors[] ='File size must be less than or exactly 2 MB';
	      	}
	      
	      	if(empty($errors) == true){
	         	move_uploaded_file($file_tmp,"../images/".$file_name);
	        	$activity->addInstitute($database, $insname, $insabb, $file_name, $folder);
	      	} else {
	        	print_r($errors);
	      	}
	    }
	}

	if(isset($_GET['editInstitute'])){
		$insid = $_GET['id'];
    	$insname = mysqli_real_escape_string($database->con, $_POST['insname']);
		$insabb = mysqli_real_escape_string($database->con, $_POST['insabb']);

	    if(isset($_FILES['image']) && $_FILES['image']['error'] != UPLOAD_ERR_NO_FILE){
	    	$errors = array();
	    	$file_name = $_FILES['image']['name'];
	    	$file_size = $_FILES['image']['size'];
	    	$file_tmp = $_FILES['image']['tmp_name'];
	    	$file_type = $_FILES['image']['type'];
	    	$file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));
	      
	    	$expensions = array("jpeg","jpg","png");
	      
	    	if(in_array($file_ext, $expensions) == false){
	        	$errors[] = "extension not allowed, please choose a JPEG or PNG file.";
	      	}
	      
	     	if($file_size > 2097152){
	        	$errors[] ='File size must be less than or exactly 2 MB';
	      	}
	      
	      	if(empty($errors) == true){
	         	move_uploaded_file($file_tmp,"../images/".$file_name);
	        	$activity->editInstitute($database, $insid, $insname, $insabb, $file_name, $folder);
	      	} else {
	        	print_r($errors);
	      	}

	    } else {
	    	$file_name = "";
	    	$activity->editInstitute($database, $insid, $insname, $insabb, $file_name, $folder);
	    }

	}

	if(isset($_GET['addUser'])){
		$firstname = mysqli_real_escape_string($database->con, $_POST['firstname']);
		$middlename = mysqli_real_escape_string($database->con, $_POST['middlename']);
		$lastname = mysqli_real_escape_string($database->con, $_POST['lastname']);
		$institute = mysqli_real_escape_string($database->con, $_POST['institute']);
		$sys_position = mysqli_real_escape_string($database->con, $_POST['position']);
		
		$activity->addUser($database, $firstname, $middlename, $lastname, $institute, $sys_position, $folder);

	}

	if(isset($_GET['deleteUser'])){
		$user_id = $_GET['id'];

		$activity->archiveUser($database, $user_id, $folder);
	}

	if(isset($_GET['deleteInstitute'])){
		$id = $_GET['id'];

		$activity->archiveInstitute($database, $id, $folder);
	}

	if(isset($_GET['editSchedule'])){

		$reportId = mysqli_real_escape_string($database->con, $_POST['reportId']);
		$semester = mysqli_real_escape_string($database->con, $_POST['semester']);
		$academic_year;
		$deadline = mysqli_real_escape_string($database->con, $_POST['deadline']);
		
		$date1 = date('Y') . '-08-01'; //Change these values depending on the adjustments of the College's academic year range
		$date2 = date('Y', strtotime('+1 year')) . '-05-31'; //Change these values depending on the adjustments of the College's academic year range
		
		if($deadline >= $date1 && $deadline <= $date2){
			$academic_year = "A.Y.: " . date('Y') . " - " . date('Y', strtotime('+1 year'));
		} else {
			$academic_year = "A.Y.: " . date('Y', strtotime('+1 year')) . " - " . date('Y', strtotime('+2 year'));
		}

		$extension = date('Y-m-d', strtotime($deadline . '+5 day'));

		$activity->editSchedule($database, $reportId, $semester, $academic_year, $deadline, $extension, $folder);

	}

	if(isset($_GET['addSchedule'])){

		$reportType = mysqli_real_escape_string($database->con, $_POST['reportType']);
		$semester = mysqli_real_escape_string($database->con, $_POST['semester']);
		$academic_year;
		$deadline = mysqli_real_escape_string($database->con, $_POST['deadline']);
		
		$date1 = date('Y') . '-08-01'; //Change these values depending on the adjustments of the College's academic year range
		$date2 = date('Y', strtotime('+1 year')) . '-05-31'; //Change these values depending on the adjustments of the College's academic year range
		
		if($deadline >= $date1 && $deadline <= $date2){
			$academic_year = "A.Y.: " . date('Y') . " - " . date('Y', strtotime('+1 year'));
		} else {
			$academic_year = "A.Y.: " . date('Y', strtotime('+1 year')) . " - " . date('Y', strtotime('+2 year'));
		}

		$extension = date('Y-m-d', strtotime($deadline . '+5 day'));

		$activity->addSchedule($database, $reportType, $semester, $academic_year, $deadline, $extension, $folder);

	}

	if(isset($_GET['deleteSchedule'])){
		$id = $_GET['id'];

		$activity->deleteSchedule($database, $id, $folder);
	}

	if(isset($_GET['numberRedirect'])){
		$number = mysqli_real_escape_string($database->con, $_POST['numberSubject']);
		$id = mysqli_real_escape_string($database->con, $_POST['id']);
		$type = mysqli_real_escape_string($database->con, $_POST['type']);
		$title = mysqli_real_escape_string($database->con, $_POST['title']);
		$author = $_SESSION['u_id'];
		$institute = $_SESSION['ins_id'];

		$activity->addOBTLList($database, $id, $title, $institute, $author, $number, $type);
	}

	if(isset($_GET['obtlReport'])){
		$subNum = $_GET['subNum'];
		$obtlId = $_GET['obtlId'];

		for($sub = $subNum; $sub >= 0; $sub--){
			$keyName = 'subjectName' . $sub;	
			$keyCode = 'subjectCode' . $sub;
			$keyId   = 'subjectId' . $sub;

			if($sub === 0){
				header("location:../" . $folder . "/index.php?obtl=true");
			}

			$subjectName = mysqli_real_escape_string($database->con, $_POST[$keyName]);
			$subjectCode = mysqli_real_escape_string($database->con, $_POST[$keyCode]);
			$subjectId = mysqli_real_escape_string($database->con, $_POST[$keyId]);
			$subjectId = explode(",", $subjectId);

			foreach($subjectId as $id):
				$activity->addOBTLDetails($database, $obtlId, $id, $subjectName, $subjectCode, $folder);
			endforeach;
		}

	}

	if(isset($_GET['addFaculty'])){
		$firstname = mysqli_real_escape_string($database->con, $_POST['firstname']);
		$middlename = mysqli_real_escape_string($database->con, $_POST['middlename']);
		$lastname = mysqli_real_escape_string($database->con, $_POST['lastname']);
		$extension = mysqli_real_escape_string($database->con, $_POST['extension']);
		$institute = $_SESSION['ins_id'];
		$position = mysqli_real_escape_string($database->con, $_POST['position']);
		$status = mysqli_real_escape_string($database->con, $_POST['status']);
		
		$activity->addFaculty($database, $firstname, $middlename, $lastname, $extension, $institute, $position, $status, $folder);
	}

	if(isset($_GET['deleteFaculty'])){
		$id = $_GET['id'];
		$institute = $_SESSION['ins_id'];
		$activity->archiveFaculty($database, $id, $institute, $folder);
	}

	if($_GET['editFaculty']){
		$id = $_GET['id'];
		$firstname = mysqli_real_escape_string($database->con, $_POST['firstname']);
		$middlename = mysqli_real_escape_string($database->con, $_POST['middlename']);
		$lastname = mysqli_real_escape_string($database->con, $_POST['lastname']);
		$extension = mysqli_real_escape_string($database->con, $_POST['extension']);
		$institute = $_SESSION['ins_id'];
		$position = mysqli_real_escape_string($database->con, $_POST['position']);
		$status = mysqli_real_escape_string($database->con, $_POST['status']);
		
		$activity->editFaculty($database, $id, $firstname, $middlename, $lastname, $extension, $institute, $position, $status, $folder);
	}

	if($_GET['reviseReport']){
		$id = mysqli_real_escape_string($database->con, $_POST['idList']);
		$comment = mysqli_real_escape_string($database->con, $_POST['comment-report']);

		$activity->reviseReport($database, $id, $comment, $folder);
	}

	if($_GET['acceptReport']){
		$id = mysqli_real_escape_string($database->con, $_POST['idList']);
		$comment = "";

		$activity->acceptReport($database, $id, $comment, $folder);	
	}

	if($_GET['deleteReport']){
		$id = mysqli_real_escape_string($database->con, $_POST['idList']);

		$activity->deleteReport($database, $id, $folder);
	}

	if(isset($_GET['archiveSchedule'])){
		$id = $_GET['id'];

		$activity->archiveSchedule($database, $id, $folder);
	}

	if(isset($_GET['printReport'])){
		$data = mysqli_real_escape_string($database->con, $_POST['data']);

		echo $data;
	}

}

?>