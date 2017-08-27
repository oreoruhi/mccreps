<?php 	
	$obtl_id = $_GET['data']; 
	$report = new Reports(); 
	$report_info = $report->obtlInfo($database, $obtl_id); 
	$report_details = $report->reviewDetails($database, $obtl_id);
	$approver = $report->reportNoter($database, $obtl_id);
	$vpaa = $report->reportApprover($database);
?>

<style>
	.report_table_base {
	    border-collapse: collapse;
	}

	.report_table_base, .report_table_head, .report_table_body, .report_table_tr, .report_table_td {
	    border: 1px solid black;
	}
</style>

<div class="report_date"><?php echo date_format(date_create($report_info['dean_fa_submitted']), 'M d, Y'); ?></div>
<div class="report-title"><center><b><?php echo $report_info['obtl_title']; ?></b></center></div><br>
<div style="text-align:justify;">The following table shows the assigned faculty for the available courses of the <?php echo $report_info['ins_name']; ?> for the <?php if($report_info['semester'] == '1') echo '1st'; else echo '2nd'; ?> semester of the <?php echo $report_info['academic_year']; ?>.</div>
<br>
<br>
<div class="report_table">
	<center>
		<table cellpadding="5" style="width:100%;" class="report_table_base">
			<thead class="report_table_head">
				<tr class="report_table_tr">
					<td class="report_table_td"><b>Course Code</b></td>
					<td class="report_table_td"><b>Course Description</b></td>
					<td class="report_table_td"><b>Assigned Faculty</b></td>
				</tr>
			</thead>
			<tbody class="report_table_body">
				<?php foreach($report_details as $rep):?>
				<tr class="report_table_tr">
					<?php
						$rowspan = count($rep['assigned_faculty']);
					?>
					<td rowspan="3" class="report_table_td"><?php echo $rep['course_code']; ?></td>
					<td rowspan="3" class="report_table_td"><?php echo $rep['course_desc']; ?></td>
					<?php for($i = 0; $i < $rowspan; $i++){ ?>
						<tr class="report_table_tr">
							<td class="report_table_td"><?php echo $rep['assigned_faculty'][$i]; ?></td>
						</tr>
					<?php } ?>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>	
	</center>
</div>
<br>
<br>
<div class="report_author">Prepared by:<br><br><br><b><?php echo $report_info['firstname'] . " " . $report_info['middlename'] . " " . $report_info['lastname']; ?></b><br><i><?php echo $report_info['sys_name']; ?>, <?php echo $report_info['ins_name']; ?></i><br><br><br></div>
<div class="report_noter">Noted by:<br><br><br><b><?php echo $approver['firstname'] . " " . $approver['middlename'] . " " . $approver['lastname']; ?></b><br><i><?php echo $approver['sys_name']; ?>, <?php echo $approver['ins_name']; ?></i><br><br><br></div>

<div class="report_approver">Approved by:<br><br><br><b><?php echo $vpaa['firstname'] . " " . $vpaa['middlename'] . " " . $vpaa['lastname']; ?></b><br><i><?php echo $vpaa['sys_name']; ?></i><br><br><br></div>

<script type="text/javascript">
	var institute = "<?php echo $report_info['ins_name']; ?>";
	var element = document.getElementById('office');
	element.innerHTML = institute.toUpperCase();

	var elem = document.createElement("img");
	elem.setAttribute("src", "../images/<?php echo $report_info['logo']; ?>");
	elem.setAttribute("height", "96");
	elem.setAttribute("width", "96");
	elem.setAttribute("alt", "<?php echo $report_info['ins_name']; ?>");
	document.getElementById('logo').appendChild(elem);
</script>
