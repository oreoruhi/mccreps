<?php

if(isset($_GET['counselOpt'])){

	session_start();
	require 'connect.php';
	$database = new Database();
	$counsel = new Counsel();
	$folder = $_GET['folder'];		

	if(isset($_GET['facultyAssign'])){
		$id = mysqli_real_escape_string($database->con, $_POST['id']);
		$type = mysqli_real_escape_string($database->con, $_POST['type']);
		$title = mysqli_real_escape_string($database->con, $_POST['title']);
		$author = $_SESSION['u_id'];
		$institute = $_SESSION['ins_id'];

		$counselId = $counsel->addCounselList($database, $id, $title, $institute, $author, $type, $folder);

		$number = mysqli_real_escape_string($database->con, $_POST['facultyAssignReps']);
		$facultyId = mysqli_real_escape_string($database->con, $_POST['facultyAssignId']);

		$facultyId = explode(",", $facultyId);

		foreach($facultyId as $fid):
			if($number <= 0){
				header("location: ../" . $folder . "/index.php?counsel=true");
			}
			$counsel->addCounselDetails($database, $counselId, $fid, $folder);
			echo $counselId . " " . $id . " " . $type . " " . $title . " " . $author . " " . $institute . " " . $fid . "<br>";
		endforeach;
	}

}

?>