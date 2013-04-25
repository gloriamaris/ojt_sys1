<html>

      <div class="row">
        <div class="large-12 hide-for-small">
 
          <div id="featured">
              <center><img src="http://localhost/PRDP/misc/img/banner3.gif" alt="slide image" class="v"></center>
		  </div>
		
        </div>




	<?php

		$month_number = $_REQUEST['month'];
		switch($month_number){
			case 05:
				$month = 'May';
				break;
			case 06:
				$month = 'June';
				break;
			case 07:
				$month = 'July';
				break;
			case 08:
				$month = 'August';
				break;
			case 09:
				$month = 'September';
				break;
			case 10:
				$month = 'October';
				break;
			case 11:
				$month = 'November';
				break;
			case 12:
				$month = 'May';
				break;
		}
	?>
		  
		  
		  <hr/>
		<center><label><h3 class= "g">Published Sub-projects for the Month of <?php echo $month;  ?> </h3></label></center>
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
		if(!empty($results)){
			if ($current_date>$data->valid_period){
			foreach ($records as $data):
				$start_date = $data->start_date;
				$end_date = $data->valid_period;
				$current_date = date('Y-m-d');			
		
				echo "<tr>
					<td><center> $data->sp_name </center></td>
					<td><center> $data->sp_description </center></td>
					<td><center> $data->municipality </center></td>
					<td><center> $data->province </center></td>
					<td><center> $data->start_date </center></td>
					<td><center> $data->valid_period </center></td>"
		?>
		
				 <td><?php echo validation_errors(); echo form_open('Home/googleEarth'); ?><center> <label>Google Earth</label><input type = "image" value = "<?php echo $data->sp_number;?>" name = 'link' src="http://localhost/PRDP/misc/img/gearth.png" height=50></center></td>
				   <td><a href=http://localhost/PRDP/index.php/Home/downloadFile?&sp_number=<?php echo $data->sp_number?>> <label><center> Download PDF </label><br/> <img src="http://localhost/PRDP/misc/img/download-icon.png" style="width: 40%;" /> </center> </a> </td>
					
			<?php		  
				  "</tr>";	
			endforeach;		
					
			}
		}
		else{
			?>
				<script>
					var msg = 'No stored archives for this month!'
					alert(msg);
				</script>
			<?php
		}
			?>
		</table>
			<hr/>
			<?php $this->load->view('includes/admin_philgeps'); ?>
			<?php $this->load->view('includes/footer'); ?>
		
	</div>
</html>