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

			return $array;
		}

		public function addCounselList($datacon, $id, $title, $institute, $author, $folder){
			$current_date = date('Y-m-d');
			$sys_status;

			$get_date = "SELECT deadline	
						FROM report_schedule
						WHERE id = '$id'";
			$get_query = mysqli_query($datacon->con, $get_date);
			if(!$get_query){
				header("location:../" . $folder . "/index.php?error=true");
			} else {
				$row = mysqli_fetch_assoc($get_query);
				$deadline = $row['deadline'];

				if($current_date <= $deadline){
					$sys_status = 'OK';
				} else {
					$sys_status = 'LATE';
				}
			}

			$sql = "INSERT INTO counsel_list
					VALUES(null, '$id', '$title', '$institute', '$author', null, NOW(), 'Pending', null, null, 'Pending', null, '$sys_status')";

			$query = mysqli_query($datacon->con, $sql);
			if(!$query){
			    header("location:../" . $folder . "/index.php?error=true");
			} else {
				$sql = "SELECT id FROM counsel_list WHERE id = LAST_INSERT_ID()";

				$query = mysqli_query($datacon->con, $sql);
				if(!$query){
				    header("location:../" . $folder . "/index.php?error=true");
				} else {
					$row = mysqli_fetch_assoc($query);
			
					return $row['id'];
				}
			}
		}

		public function addCounselDetails($datacon, $counselId, $fid, $folder){
			$sql = "INSERT INTO counsel_details
					VALUES(null, '$counselId', '$fid', null, null)";

			$query = mysqli_query($datacon->con, $sql);
			if(!$query){
			    //header("location:../" . $folder . "/index.php?error=true");
			    echo("Error description: " . mysqli_error($datacon->con));
			} 
		}

	}

	require 'counsel_options.php';

?>