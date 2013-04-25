
<?php echo validation_errors(); ?>
<?php echo form_open('Admin/filter_by_month'); ?>

<ul class="nav nav-pills push-2" id="f">  
	<li class="dropdown all-camera-dropdown">  
		<a class="dropdown-toggle" data-toggle="dropdown" href="#">  
			Archives  
			<b class="caret"></b>  
		</a>  
			<ul class="dropdown-menu">  
				<li data-filter-camera-type="all"><a href=http://localhost/PRDP/index.php/Home/filter_by_month?&month=05>May</a></li>  
				<li data-filter-camera-type="Alpha"><a data-toggle="tab" href=http://localhost/PRDP/index.php/Home/filter_by_month?&month=06>June</a></li>  
				<li data-filter-camera-type="Zed"><a data-toggle="tab" href=http://localhost/PRDP/index.php/Home/filter_by_month?&month=07>July</a></li>  
				<li data-filter-camera-type="Bravo"><a data-toggle="tab" href=http://localhost/PRDP/index.php/Home/filter_by_month?&month=08>August</a></li>  
				<li data-filter-camera-type="Bravo"><a data-toggle="tab" href=http://localhost/PRDP/index.php/Home/filter_by_month?&month=09>September</a></li>  
				<li data-filter-camera-type="Bravo"><a data-toggle="tab" href=http://localhost/PRDP/index.php/Home/filter_by_month?&month=10>October</a></li>  
				<li data-filter-camera-type="Bravo"><a data-toggle="tab" href=http://localhost/PRDP/index.php/Home/filter_by_month?&month=11>November</a></li>  
				<li data-filter-camera-type="Bravo"><a data-toggle="tab" href=http://localhost/PRDP/index.php/Home/filter_by_month?&month=12>December</a></li>  

			</ul>  
	</li>
</ul>


<?php echo form_close(); ?>
<br/>
<br/>
<br/>
<br/>