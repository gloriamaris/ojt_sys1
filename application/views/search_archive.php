
	<table height="0%" border="1" align="center" cellpadding="5" cellspacing="2">
		<th> Sub-Project Name </th>
		<th> Sub-Project Description </th>
		<th> Municipality/City </th>
		<th> Province </th>
		<th> Start Date<br/>(YYYY/MM/DD) </th>
		<th> End Date<br/>(YYYY/MM/DD) </th>
		<th> GoogleEarth<br/>Link </th>
		<th> Philippine Bidding Documents </th>
		<?php
		
		foreach ($records as $data):
			$start_date = $data->start_date;
			$end_date = $data->valid_period;
			$current_date = date('Y-m-d');
			
			if ($start_date<=$current_date && $current_date<=$end_date){
			echo "<tr>
				  <td><center> $data->sp_name </center></td>
				  <td><center> $data->sp_description </center></td>
				  <td><center> $data->municipality </center></td>
				  <td><center> $data->province </center></td>
				  <td><center> $data->start_date </center></td>
				  <td><center> $data->valid_period </center></td>"
			?>
		
				  <td><?php echo validation_errors(); echo form_open('Home/googleEarth'); ?><center> <a href="#"><br/>Google Earth</a><br/><input type = "image" value = "<?php echo $data->sp_number;?>" name = 'link' src="http://localhost/PRDP/misc/img/gearth.png" height=50></center></td>
				  <td><a href=http://localhost/PRDP/index.php/Home/downloadFile?&sp_number=<?php echo $data->sp_number?>> <center> Download PDF <br/> <img src="http://localhost/PRDP/misc/img/download-icon.png" style="width: 40%;" /> </center> </a> </td>
		
			<?php		  
				  "</tr>";			
				}
			endforeach;		
			?>
		</table>