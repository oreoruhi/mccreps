<?php

	Class Activity {

		public function instituteList($datacon){
			$array = array();
			$sql = "SELECT * FROM institutes WHERE status = 'Active'";
			$query = mysqli_query($datacon->con, $sql);
			if (!$query) {
			    header("location: ../index.php?error=true");
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
			}

			return $array;
		}

		public function addInstitute($datacon, $insname, $insabb, $target_file, $folder){
			$insid = "INS" . $insabb . rand(110, 500);
			$sql = "INSERT INTO institutes
					VALUES (null, '$insid', '$insname', '0', '$target_file', 'Active')";
			$query = mysqli_query($datacon->con, $sql);
			if(!$query){
				header("location:../" . $folder . "/institutes.php?error=true");
			} else {
				header("location:../" . $folder . "/institutes.php?added=true");
			}
		}

		public function editInstitute($datacon, $id, $insname, $insabb, $file_name, $folder){
			$insid = "INS" . $insabb . rand(110, 500);

			if($file_name === ''){
				$sql = "UPDATE institutes SET 
						ins_name ='$insname',
						ins_id = '$insid'
						WHERE id = '$id'";
			} else {
				$sql = "UPDATE institutes SET 
						ins_name ='$insname',
						ins_id = '$insid',
						logo = '$file_name'
						WHERE id = '$id'";
			}

			$query = mysqli_query($datacon->con, $sql);
			if(!$query){
				header("location:../" . $folder . "/institutes.php?error=true");
			} else {
				header("location:../" . $folder . "/institutes.php?updated=true");
			}

		}

		public function userList($datacon){
			$array = array();
			$sql = "SELECT users.*, institutes.*, sys_position.* 
					FROM users
					LEFT JOIN institutes
					ON (institutes.id = users.ins_id)
					LEFT JOIN sys_position
					ON (sys_position.id = users.sys_id) 
					WHERE users.status != 'Archived'";
			$query = mysqli_query($datacon->con, $sql);
			if (!$query) {
			    header("location: ../index.php?error=true");
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
			}

			return $array;
		}

		public function positionList($datacon){
			$array = array();
			$sql = "SELECT * FROM sys_position WHERE id != 1 AND id != 2";
			$query = mysqli_query($datacon->con, $sql);
			if (!$query) {
			    header("location: ../index.php?error=true");
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
			}

			return $array;			
		}

		public function addUser($datacon, $firstname, $middlename, $lastname, $institute, $position, $folder){
			$username = strtolower(str_replace(" ", "", $firstname)) . rand(10,99);
			$password = rand(100000, 999999);

			$sql = "INSERT INTO users
					VALUES(null, '$position', '$firstname', '$middlename', '$lastname', '$institute', '$username', md5('$password'), 'user.png', 'Inactive')";
			$query = mysqli_query($datacon->con, $sql);
			if (!$query) {
			    header("location:../" . $folder . "/users.php?error=true");
			} else {
				header("location:../" . $folder . "/users.php?user=" . $username . "&pass=" . $password);
			}

		}

		public function archiveUser($datacon, $id, $folder){			
			$sql = "UPDATE users SET 
					status = 'Archived'
					WHERE id = '$id'";
			$query = mysqli_query($datacon->con, $sql);
			if(!$query){
			    header("location:../" . $folder . "/users.php?error=true");
			} else {
				header("location:../" . $folder . "/users.php?archived=true");
			}	
	
		}

		public function archiveInstitute($datacon, $id, $folder){			
			$sql = "UPDATE institutes SET 
					status = 'Archived'
					WHERE id = '$id'";
			$query = mysqli_query($datacon->con, $sql);
			if(!$query){
			    header("location:../" . $folder . "/institutes.php?error=true");
			} else {
				$sql = "UPDATE faculty SET 
						sys_status = 'Archived'
						WHERE ins_id = '$id'";
				$query = mysqli_query($datacon->con, $sql);
				if(!$query){
				    header("location:../" . $folder . "/institutes.php?error=true");
				} else {
					
					header("location:../" . $folder . "/institutes.php?archived=true");
				}	
			}		
		}	

		public function addSchedule($datacon, $reportType, $semester, $academicYear, $deadline, $extension, $folder){
			$sql = "INSERT INTO report_schedule
					VALUES(null, '$reportType', '$semester', '$academicYear', '$deadline', '$extension', 'Ongoing')";

			$query = mysqli_query($datacon->con, $sql);
			if(!$query){
			    header("location:../" . $folder . "/index.php?error=true");
			} else {
				header("location:../" . $folder . "/index.php?added=true");
			}	
		}

		public function scheduleList($datacon){
			$array = array();
			$sql = "SELECT * FROM report_schedule ORDER BY deadline DESC";
			$query = mysqli_query($datacon->con, $sql);
			if (!$query) {
			    header("location: ../index.php?error=true");
			    // echo("Error description: " . mysqli_error($datacon->con));
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
			}

			return $array;				
		}

		public function editSchedule($datacon, $reportId, $semester, $academicYear, $deadline, $extension, $folder){
			$sql = "UPDATE report_schedule
					SET semester = '$semester',
						academic_year = '$academicYear',
						deadline = '$deadline',
						deadline_extension = '$extension'
						WHERE id = '$reportId'";

			$query = mysqli_query($datacon->con, $sql);
			if(!$query){
			    header("location:../" . $folder . "/index.php?error=true");
			} else {
				header("location:../" . $folder . "/index.php?updated=true");
			}	
		}

		public function deleteSchedule($datacon, $id, $folder){			
			$sql = "DELETE FROM report_schedule
					WHERE id = '$id'";
			$query = mysqli_query($datacon->con, $sql);
			if(!$query){
			    header("location:../" . $folder . "/index.php?error=true");
			} else {
				header("location:../" . $folder . "/index.php?deleted=true");
			}		
		}	

		public function archiveSchedule($datacon, $id, $folder){			
			$sql = "UPDATE report_schedule
					SET status = 'Archived'
					WHERE id = '$id'";
			$query = mysqli_query($datacon->con, $sql);
			if(!$query){
			    header("location:../" . $folder . "/index.php?error=true");
			} else {
				header("location:../" . $folder . "/index.php?archive=true");
			}		
		}	

		public function facultyList($datacon, $ins_id){
			$array = array();
			$sql = "SELECT * FROM faculty WHERE ins_id = '$ins_id' AND sys_status = 'Active'";
			$query = mysqli_query($datacon->con, $sql);
			if (!$query) {
			    header("location: ../index.php?error=true");
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
			}

			return $array;
		}

		public function addOBTLList($datacon, $id, $title, $institute, $author, $number, $type){

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

			$sql = "INSERT INTO obtl_list
					VALUES(null, '$id', '$title', '$institute', '$author', null, NOW(), 'Pending', null, null, 'Pending', null, '$sys_status')";

			$query = mysqli_query($datacon->con, $sql);
			if(!$query){
			    header("location:../" . $folder . "/index.php?error=true");
			} else {
				$sql = "SELECT id FROM obtl_list WHERE id = LAST_INSERT_ID()";

				$query = mysqli_query($datacon->con, $sql);
				if(!$query){
				    header("location:../" . $folder . "/index.php?error=true");
				} else {
					$row = mysqli_fetch_assoc($query);
					header("location:../clerk/report_create.php?obtlid=" . $row['id'] . "&type=" . $type . "&subjectNumber=" . $number);
				}
			}		
		}

		public function addOBTLDetails($datacon, $obtl_id, $faculty_id, $course_name, $course_code, $folder){
			$sql = "INSERT INTO obtl_details
					VALUES(null, '$obtl_id', '$faculty_id', '$course_name', '$course_code')";

			$query = mysqli_query($datacon->con, $sql);
			if(!$query){
			    //header("location:../" . $folder . "/index.php?error=true");
			    echo("Error description: " . mysqli_error($datacon->con));
			} else {
				header("location:../" . $folder . "/index.php?obtl=true");
				//echo "works?";
			}
		}

		public function reviewCount($datacon, $obtlId){
			$array = array();
			$ins_id = $_SESSION['ins_id'];
			$sql = "SELECT obtl_list.*, users.firstname, users.middlename, users.lastname, institutes.ins_name 
					FROM obtl_list
					LEFT JOIN users
					ON (obtl_list.obtl_author = users.id) 
					LEFT JOIN institutes
					ON (obtl_list.obtl_institute = institutes.id)
					WHERE sched_id = '$obtlId' AND obtl_institute = '$ins_id'";
			$query = mysqli_query($datacon->con, $sql);
			if (!$query) {
			    header("location: ../index.php?error=true");
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
			}

			return $array;				
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

		public function addFaculty($datacon, $firstname, $middlename, $lastname, $extension, $institute, $position, $status, $folder){
			$sql = "INSERT INTO faculty
					VALUES(null, '$institute', '$firstname', '$middlename', '$lastname', '$extension', '$status', '$position', 'Active')";
			$query = mysqli_query($datacon->con, $sql);
			if (!$query) {
			    header("location:../" . $folder . "/index.php?error=true");
			    // echo("Error description: " . mysqli_error($datacon->con));
			} else {
				$sql = "UPDATE institutes
						SET faculty_count = faculty_count+1
						WHERE id = '$institute'";
				$query = mysqli_query($datacon->con, $sql);
				if (!$query) {
			    	header("location:../" . $folder . "/index.php?error=true");
			    	//echo("Error description: " . mysqli_error($datacon->con));
				} else {
				
					header("location:../" . $folder . "/index.php?added=true");
				}
			}

		}

		public function archiveFaculty($datacon, $id, $institute, $folder){			
			$sql = "UPDATE faculty SET 
					sys_status = 'Archived'
					WHERE id = '$id'";
			$query = mysqli_query($datacon->con, $sql);
			if(!$query){
			    header("location:../index.php?error=true");
			} else {
				$sql = "UPDATE institutes
						SET faculty_count = faculty_count-1
						WHERE id = '$institute'";
				$query = mysqli_query($datacon->con, $sql);
				if (!$query) {
			    	header("location:../" . $folder . "/index.php?error=true");
				} else {
					header("location:../" . $folder . "/index.php?archived=true");
				}

			}		
		}

		public function editFaculty($datacon, $id, $firstname, $middlename, $lastname, $extension, $institute, $position, $status, $folder){
			$sql = "UPDATE faculty
					SET firstname = '$firstname',
						middlename = '$middlename',
						lastname = '$lastname',
						extension = '$extension',
						position = '$position',
						status = '$status'
					WHERE ins_id = '$institute'
					AND id = '$id'";
			$query = mysqli_query($datacon->con, $sql);
			if (!$query) {
			    header("location:../" . $folder . "/index.php?error=true");
			} else {
				header("location:../" . $folder . "/index.php?updated=true");
			}

		}

		public function reviseReport($datacon, $id, $comment, $folder){
			$sql;
			if($_SESSION['type'] == 'Dean'){
				$sql = "UPDATE obtl_list
						SET dean_comments = '$comment',
							dean_remarks = 'For Revision'
						WHERE id = '$id'";

			} else {
				$sql = "UPDATE obtl_list
						SET vpaa_comments = '$comment',
							vpaa_remarks = 'For Revision',
							dean_remarks = 'For Revision'
						WHERE id = '$id'";				
			}

			$query = mysqli_query($datacon->con, $sql);
			if (!$query) {
			    header("location:../" . $folder . "/index.php?error=true");
			} else {
				header("location:../" . $folder . "/index.php?revise=true");
			}
		}

		public function acceptReport($datacon, $id, $comment, $folder){
			$sql;
			if($_SESSION['type'] == 'Dean'){
				$dean_id = $_SESSION['u_id'];
				$sql = "UPDATE obtl_list
						SET dean_comments = '$comment',
							dean_remarks = 'Approved',
							obtl_approver = '$dean_id',
							vpaa_fa_submitted = NOW()
						WHERE id = '$id'";

			} else {
				$sql = "UPDATE obtl_list
						SET vpaa_comments = '$comment',
							vpaa_remarks = 'Approved'
						WHERE id = '$id'";				
			}

			$query = mysqli_query($datacon->con, $sql);
			if (!$query) {
			    header("location:../" . $folder . "/index.php?error=true");
			} else {
				header("location:../" . $folder . "/index.php?accepted=true");
			}
		}

		public function deleteReport($datacon, $id, $folder){			
			$sql = "DELETE FROM obtl_list
					WHERE id = '$id'";
			$query = mysqli_query($datacon->con, $sql);
			if(!$query){
			    header("location:../" . $folder . "/index.php?error=true");
			} else {
				header("location:../" . $folder . "/index.php?deleted=true");
			}		
		}	

	}

	require 'activity_options.php';

?>