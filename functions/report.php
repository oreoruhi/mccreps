<?php 

	Class Reports {

		public function obtlList($datacon, $insid){
			$array = array();
			$sql = "SELECT obtl_list.*, users.firstname, users.middlename, users.lastname, institutes.ins_name 
					FROM obtl_list
					LEFT JOIN users
					ON (obtl_list.obtl_author = users.id)
					LEFT JOIN institutes
					ON (obtl_list.obtl_institute = institutes.id)
					WHERE obtl_list.obtl_institute = '$insid'";
			$query = mysqli_query($datacon->con, $sql);
			if (!$query) {
			    header("location: ../index.php?invalid=true");
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
			}

			if(!empty($array)){

				return $array;

			} else {
				$sql = "SELECT * FROM institutes WHERE id = '$insid'";
				$query = mysqli_query($datacon->con, $sql);
				if (!$query) {
				    header("location: ../index.php?invalid=true");
				} else {
					$row = mysqli_fetch_assoc($query);
					$array = $row['ins_name'];
				}

				return $array;
			}
		}

		public function obtlListReview($datacon, $insid){
			$array = array();
			$sql = "SELECT obtl_list.*, users.firstname, users.middlename, users.lastname, institutes.ins_name 
					FROM obtl_list
					LEFT JOIN users
					ON (obtl_list.obtl_author = users.id)
					LEFT JOIN institutes
					ON (obtl_list.obtl_institute = institutes.id)
					WHERE obtl_list.sched_id = '$insid'";
			$query = mysqli_query($datacon->con, $sql);
			if (!$query) {
			    //header("location: ../index.php?invalid=true");
			    echo("Error description: " . mysqli_error($datacon->con));
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
			}

			if(!empty($array)){

				return $array;

			} else {
				$sql = "SELECT * FROM institutes WHERE id = '$insid'";
				$query = mysqli_query($datacon->con, $sql);
				if (!$query) {
				    //header("location: ../index.php?invalid=true");
				    echo("Error description: " . mysqli_error($datacon->con));
				} else {
					$row = mysqli_fetch_assoc($query);
					$array = $row['ins_name'];
				}

				return $array;
			}
		}

		public function obtlInfo($datacon, $id){
			$sql = "SELECT obtl_list.*, users.firstname, users.middlename, users.lastname, institutes.ins_name, institutes.logo, report_schedule.academic_year, report_schedule.semester, sys_position.sys_name 
					FROM obtl_list
					LEFT JOIN users
					ON (obtl_list.obtl_author = users.id)
					LEFT JOIN institutes
					ON (obtl_list.obtl_institute = institutes.id)
					LEFT JOIN report_schedule
					ON (obtl_list.sched_id = report_schedule.id)
					LEFT JOIN sys_position
					ON (users.sys_id = sys_position.id)
					WHERE obtl_list.id = '$id'";
			$query = mysqli_query($datacon->con, $sql);
			if (!$query) {
			    //header("location: ../index.php?invalid=true");
			    echo("Error description: " . mysqli_error($datacon->con));
			} else {
				$obtlInfo = mysqli_fetch_assoc($query);
				return $obtlInfo;
			}
		}

		public function reviewDetails($datacon, $id){
			$array = array();
			$valueChecker = "";
			$i = 0;
			$sql = "SELECT obtl_details.*, faculty.firstname, faculty.middlename, faculty.lastname, faculty.extension 
					FROM obtl_details
					LEFT JOIN faculty
					ON (faculty.id = obtl_details.faculty_id) 
					WHERE obtl_id = '$id'";
			$query = mysqli_query($datacon->con, $sql);
			if (!$query) {
			    header("location: ../index.php?invalid=true");
			} else {
				while($row = mysqli_fetch_array($query)){
					if($valueChecker != $row['course_code']){
						$valueChecker = $row['course_code'];
						$array[$i] = ['course_code' => $row['course_code'], 'course_desc' => $row['course_desc'], 'assigned_faculty' => Array(0 => $row['firstname'] . " " . $row['middlename'] . " " . $row['lastname'] . " " . $row['extension'])];
						$i++;
					} else {
						$i--;
						$faculty_name = $row['firstname'] . " " . $row['middlename'] . " " . $row['lastname'] . " " . $row['extension'];
						array_push($array[$i]['assigned_faculty'], $faculty_name);
						$i++;
					}

				} 

			}

			return $array;				
		}

		public function reportNoter($datacon, $id){
			$sql = "SELECT users.firstname, users.middlename, users.lastname, institutes.ins_name, sys_position.sys_name
					FROM obtl_list
					LEFT JOIN users
					ON (obtl_list.obtl_approver = users.id)
					LEFT JOIN institutes
					ON (obtl_list.obtl_institute = institutes.id)
					LEFT JOIN sys_position
					ON (users.sys_id = sys_position.id)
					WHERE obtl_list.id = '$id'";
			$query = mysqli_query($datacon->con, $sql);
			if (!$query) {
			    //header("location: ../index.php?invalid=true");
			    echo("Error description: " . mysqli_error($datacon->con));
			} else {
				$noter = mysqli_fetch_assoc($query);
				return $noter;
			}
		}

		public function reportApprover($datacon){
			$sql = "SELECT users.firstname, users.middlename, users.lastname, institutes.ins_name, sys_position.sys_name
					FROM users
					LEFT JOIN institutes
					ON (users.ins_id = institutes.id)
					LEFT JOIN sys_position
					ON (users.sys_id = sys_position.id)
					WHERE users.sys_id = '2'";
			$query = mysqli_query($datacon->con, $sql);
			if (!$query) {
			    //header("location: ../index.php?invalid=true");
			    echo("Error description: " . mysqli_error($datacon->con));
			} else {
				$approver = mysqli_fetch_assoc($query);
				return $approver;
			}
		}

	}

	require 'report_options.php';

?>