<?php
/*时间：2017年8月12日*/
header("content-type:text/html;charset=utf-8");

?>
<!DOCTYPE HTML >
<html lang="en">
<head>
<meta charset="UTF-8">
<title>管理员后台登录</title>
<link rel="stylesheet" type="text/css" href="<?php  echo base_url();?>public/bootstrap/css/bootstrap.min.css ">
<script src="<?php  echo base_url();?>public/bootstrap/js/bootstrap.min.js " ></script>
<script type="text/javascript" src="<?php  echo base_url();?>public/JavaScript/backend.js"></script>
</head>
<body>
<div style="margin:50px 400px;" class="panel panel-default">
<div class="panel-heading">管理员登录</div>

<div class="panel-body">
<form action="<?php  echo base_url();?>index.php/M_admin/check_login" method="post" name="form" onsubmit="return checklogin();">

<div class="input-group input-group-sm ">
<label class="glyphicon glyphicon-user input-group-addon" style="top:0px"></label>
<input type="text" name="username" id="username" class="form-control" placeholder="用户名">
</div>
<!-- input-group-addon  将图标和文本框设为一行
style="top:0px"默认图标和文本框相差一个像素 修改为0 -->
<br>
<div class="input-group input-group-sm ">
<label class="glyphicon glyphicon-lock input-group-addon" style="top:0px"></label>
<input type="password" name="password" id="password" class="form-control" placeholder="密码">
</div>
<br>
<div class="form-group">
<input type="submit" name="submit" value="登陆" class="btn btn-primary btn-sm form-control">
</div>
<br>
</form>
</div>
</div>
<div id="show" style="margin:50px 500px; display:none;" class="panel panel-default">
<!-- display:none;默认情况不显示   (通过js修改) -->
<div>
<span id="error" style="font-size: 13px;color:#f00;"></span>
</div>
</div>
</body>
</html>