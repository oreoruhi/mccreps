<?php

if(isset($_GET['activityOpt'])){

	session_start();
	require 'connect.php';
	$database = new Database();
	$counsel = new Counsel();
	$folder = $_GET['folder'];		



}

?>