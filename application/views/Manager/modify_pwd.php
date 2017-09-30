<link rel="stylesheet" type="text/css" href="<?php  echo base_url();?>public/bootstrap/css/bootstrap.min.css" />
	<script src="<?php  echo base_url();?>public/bootstrap/js/bootstrap.min.js"></script>
	<div class="panel panel-default" >
	<div class="panel-body" >
		<form class="form-inline" style="text-align:center;" method="post" action="<?php echo base_url();?>index.php/Manager/do_modify_pwd">
		  <div class="form-group">
		    <label for="exampleInputName2">员工号</label>
		    <input type="text" class="form-control" readonly="true" id="e_no" name="e_no" 
		    value="<?php if(isset($_SESSION['e_no'])){echo $_SESSION['e_no'];}?>" >
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail2">新密码</label>
		    <input type="password" class="form-control" id="e_pwd" name="e_pwd">
		  </div>
		  <button type="submit" name="submit" class="btn btn-success">保存修改</button>
		</form>
	</div>
</div>
	
		
	
