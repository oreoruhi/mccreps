<?php

	Class Counsel {

		public function counselListReview($datacon, $insid){
			$array = array();
			$sql = "SELECT counsel_list.*, users.firstname, users.middlename, users.lastname, institutes.ins_name 
					FROM counsel_list
					LEFT JOIN users
					ON (counsel_list.counsel_author = users.id)
					LEFT JOIN institutes
					ON (counsel_list.counsel_institute = institutes.id)
					WHERE counsel_list.sched_id = '$insid'";
			$query = mysqli_query($datacon->con, $sql);
			if (!$query) {
			    //header("location: ../index.php?invalid=true");
			    echo("Error description: " . mysqli_error($datacon->con));
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
			}

			// if(!empty($array)){

			// 	return $array;

			// } else {
			// 	$sql = "SELECT * FROM institutes WHERE id = '$insid'";
			// 	$query = mysqli_query($datacon->con, $sql);
			// 	if (!$query) {
			// 	    //header("location: ../index.php?invalid=true");
			// 	    echo("Error description: " . mysqli_error($datacon->con));
			// 	} else {
			// 		$row = mysqli_fetch_assoc($query);
			// 		$array = $row['ins_name'];
			// 	}

			// 	return $array;
			// }

			return $array;
		}

	}

	require 'counsel_options.php';

?>