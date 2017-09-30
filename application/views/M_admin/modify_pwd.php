<?php
/*时间：2017年8月12日*/
header("content-type:text/html;charset=utf-8");
?>

<!DOCTYPE HTML >
<html lang="en">
<head>
<meta charset="UTF-8">
<title>管理员信息修改</title>
<link rel="stylesheet" type="text/css" href="<?php  echo base_url();?>public/bootstrap/css/bootstrap.css ">
<script src="<?php  echo base_url();?>public/bootstrap/js/bootstrap.js " ></script>
</head>
<body>
	<ol class="breadcrumb" style="background:#337AB7;">
    <li><a href="<?php  echo base_url();?>index.php/M_admin/index" style="color:#fff;">员工考勤管理系统</a></li>  
    <li><a href="<?php  echo base_url();?>index.php/M_admin/modify_pwd" style="color:#fff;">管理员信息设置</a></li>  
    </ol>
    <div class="panel panel-default">
    	<div class="panel-body">
  <form class="form-inline" method="post" action="<?php  echo base_url();?>index.php/M_admin/do_modify_pwd" >
  <div class="form-group">
    <label for="exampleInputName2">用户名</label>
    <input type="text" class="form-control" readonly="true" id="name" name="name" 
		    value="<?php if(isset($_SESSION['name'])){echo $_SESSION['name'];}?>" >
    
  </div>
  <div class="form-group" style="margin-right: 20px;">
    <label for="exampleInputEmail2">新密码</label>
    <input type="password" name="password" class="form-control" id="password" >
  </div>
  <button type="submit" name="submit" class="btn btn-info">保存修改</button>
</form>
    	    
    	</div>
    </div>
</body>
</html>