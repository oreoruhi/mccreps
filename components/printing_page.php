<?php
	require '../functions/common_connector.php';
	require '../functions/report.php';
?>
<style type="text/css">
	body {
	  background: rgb(204,204,204); 
	  font-style: "Times New Roman", Times, serif;
	}
	page {
	  background: white;
	  display: block;
	  margin: 0 auto;
	  margin-bottom: 0.5cm;
	  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
	}
	page[size="A4"][layout="portrait"] {
	  width: 21cm;
	  height: 29.7cm; 
	}
	@media print {
 	  body, page {
      margin: 0;
      box-shadow: 0;
  	}
</style>
<page size="A4" layout="portrait">
	<div style="padding-left: 96px;padding-right:96px;padding-top:20px;">
		<center>
			<table>
				<tr>
					<td style="width:15px;"></td>
					<td class="logo" id="logo"></td>
					<td style="padding-left: 28px;padding-right: 28px;">		
						<center>
							<p style="font-size: 12px;margin:0;">Republic of the Philippines</p>
							<p style="font-size: 12px;margin:0;">Province of Pampanga</p>
							<p style="font-size: 12px;margin:0;">Mabalacat City</p>
							<p style="font-size: 22px;margin:0;color:red;">MABALACAT CITY COLLEGE</p>
							<p style="font-size: 10px;margin-top:10px;margin-bottom:0;">www.mabalacatcitycollege.edu.ph</p>
							<p style="font-size: 10px;margin:0;">Tel. No.: (045)-875-6887 &nbsp;&nbsp;&nbsp; (045)-875-6978</p><br>
						</center>
					</td>
					<td><img src="../img/mcc-icon.png" alt="MCC Icon" height="96" width="96"></td>
					<td style="width:15px;"></td>
				</tr>
				<tr>
					<td colspan="5">
						<center><p style="font-size: 20px;margin:0; color: 00406d;" class="office" id="office"></p></center>
					</td>
				</tr>
			</table>
		</center>
	</div>
	<div>
		<hr style="height:0px;border: solid 2px;"><hr style="margin-top:0;">
	</div>
	<div style="padding-left: 96px;padding-right:96px;padding-bottom:96px;padding-top:20px;">
		<!-- Make the link dynamic -->
		<?php
			$page = 'obtl';  //change name to name of the page to print
			require 'print/' . $page . '.php'; 
		?> 
	</div>
</page>

<!-- Jquery Core Js -->
<script src="../plugins/jquery/jquery.min.js"></script>

<script>
	$(document).ready(function() {
    	window.print();
    	document.location.href= "../<?php echo $_SESSION['folder']; ?>/index.php?print=true";
	});
</script>