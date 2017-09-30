<?php
/*
谢雅龙PHP
时间$date;
*/

header("content-type:text/html;charset=utf-8");

?>

<!DOCTYPE HTML >
<html lang="en">
<head>
<meta charset="UTF-8">
<title>用户登陆</title>
<link rel="stylesheet" type="text/css" href="<?php  echo base_url();?>public/bootstrap/css/bootstrap.css ">
<link rel="stylesheet" type="text/css" href="<?php  echo base_url();?>public/bootstrap/css/bootstrap.min.css">
<script src="<?php  echo base_url();?>public/bootstrap/js/bootstrap.min.js " ></script>



</head>
<body>
<div style="margin:100px 350px 40px;" class="panel panel-default">
<div class="panel-heading">用户登陆</div>

<div class="panel-body">
	<form action="<?php echo base_url();?>index.php/manager/check_login" method="post" class="form" >
	<div class="input-group input-group-sm">
		<label class="glyphicon glyphicon-user input-group-addon style=top:0px;"></label>
		<input type="text" name="e_no" id="e_no" class="form-control" placeholder="员工号">
	</div>
	<br>
	<div class="input-group input-group-sm">
		<label class="glyphicon glyphicon-lock input-group-addon style=top:0px;"></label>
		<input type="password" name="e_pwd" id="e_pwd" class="form-control" placeholder="密码">
	</div>
	<br>
	<div class="from-group">
		<input type="submit" name="submit"  value="登陆" class="btn btn-primary btn-sm form-control">
	</div>
	</form>
</div>
</div>
<div id="show" style="margin:40px 350px;display:none;" class="panel panel-default">
	<div class="panel-body">
		<span id="error" style="font-size: 13px;color:#f100;"></span>
	</div>
</div>	
</body>
</html>	