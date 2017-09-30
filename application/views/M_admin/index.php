<?php
/*时间：2017年8月12日*/
header("content-type:text/html;charset=utf-8");


?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset=UTF-8>
<title>员工考勤后台管理</title>
<link rel="stylesheet" type="text/css" href="<?php  echo base_url();?>public/bootstrap/css/bootstrap.css ">
<script src="<?php  echo base_url();?>public/bootstrap/js/bootstrap.js " ></script>
</head>
<body>
<div class="container-fluid">
<div class="row">
<div class="col-sm-3">
<div class="list-group">
<a href="#" class="list-group-item active">
<span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>&nbsp;&nbsp;员工考勤系统管理</a>
<a href="<?php  echo base_url();?>index.php/M_emo/read" target="right" class="list-group-item"><span class="glyphicon glyphicon-cog" style="margin-left:10px;"></span>&nbsp;&nbsp;员工信息管理</a>
<a href="<?php  echo base_url();?>index.php/Edu/index" target="right" class="list-group-item"><span class="glyphicon glyphicon-th-list" style="margin-left:10px;"></span>&nbsp;&nbsp;学历信息管理</a>
<a href="<?php  echo base_url();?>index.php/Dep/index" target="right" class="list-group-item"><span class="glyphicon glyphicon-link " style="margin-left:10px;"></span>&nbsp;&nbsp;部门信息管理</a>
<a href="<?php  echo base_url();?>index.php/Pos/index" target="right" class="list-group-item"><span class="glyphicon glyphicon-list-alt" style="margin-left:10px;"></span>&nbsp;&nbsp;职位信息管理</a>
<a href="<?php  echo base_url();?>index.php/M_att/read"  target="right" class="list-group-item"><span class="glyphicon glyphicon-lock" style="margin-left:10px;"></span>&nbsp;&nbsp;员工考勤信息管理</a>
<a href="<?php  echo base_url();?>index.php/M_admin/modify_pwd" target="right" class="list-group-item"><span class="glyphicon glyphicon-log-out" style="margin-left:10px;"></span>&nbsp;&nbsp;管理员信息设置</a>
<a href="<?php  echo base_url();?>index.php/M_admin/logout"  class="list-group-item"><span class="glyphicon glyphicon-log-out" style="margin-left:10px;"></span>&nbsp;&nbsp;退出系统</a>
</div>
</div>
<div class="col-sm-9">
<iframe src="<?php  echo base_url();?>public/right.html" name="right" style="width:100%; border:none;" height="800" ></iframe>
 </div>
</div>
</div>

</body>
</html>