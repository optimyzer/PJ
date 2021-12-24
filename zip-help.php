<?php require_once('include/connection.php'); ?>
<script  src="<?php echo JSPATH; ?>/citystate.js"  type="text/javascript"></script>
<div id="Lfromziphelp" style="display:none">
	<div class="stackbox-body">
		<select name="lfromstate" class="lstate lfromstate form-control">
			<option selected="selected">--Select State--</option>
			<?php
			// GENRIC FROM ZIP
			$lfromstate = oci_parse($conn, "SELECT fullstate FROM CITYAREACODE group by fullstate order by fullstate ASC");
			$state_result = oci_execute($lfromstate);
			while ($stateR = oci_fetch_array($lfromstate, OCI_ASSOC+OCI_RETURN_NULLS)) {
					// Use the uppercase column names for the associative array indices 
				$lfromdata=$stateR['FULLSTATE'];
				echo '<option value="'.$lfromdata.'">'.$lfromdata.'</option>';
			 } 
			 unset($stateR); 
			oci_free_statement($lfromstate);
			?>
		</select>
	<div id="loader_from" class="loader custom_loader"><img src="images/loader.gif"></div><br/><br/>
		<select name="lfromcity" class="lfromcity form-control">
			<option selected="selected">--Select City--</option>
		</select>
	</div>
</div>


