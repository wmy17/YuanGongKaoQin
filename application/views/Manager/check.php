<link rel="stylesheet" type="text/css" href="<?php  echo base_url();?>public/bootstrap/css/bootstrap.min.css" />
	<script src="<?php  echo base_url();?>public/bootstrap/js/bootstrap.min.js"></script>	

<div>
		<form action="<?php echo base_url();?>index.php/Manager/check" method="post" id="form1" class="height=300px;">
		
		<input style="margin-left: 225px" type="submit" name="work_submit" value="上班打卡" class="btn btn-primary btn-lg">
		<input style="margin-left: 225px" type="submit" name="leave_submit" value="下班打卡" class="btn btn-primary btn-lg">
		<input type="hidden" name="check_time" value="<?php echo time();?>">
		
		
		</form>
</div>	
	
	
	
