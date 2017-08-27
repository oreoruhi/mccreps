<?php

if(isset($_GET['reportOpt'])){

	session_start();
	require 'connect.php';
	$database = new Database();
	$reports = new Reports();
	$folder = $_GET['folder'];	
	$institute = $_GET['institute'];

	if(isset($_GET['obtlList'])){
		header("location: ../" . $folder . "/obtl.php?institute=" . $institute);
	}


}

?>