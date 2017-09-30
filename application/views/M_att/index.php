<?php
/*时间：2017年8月16日*/
header("content-type:text/html;charset=utf-8");


?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="<?php  echo base_url();?>public/bootstrap/css/bootstrap.css ">
<script src="<?php  echo base_url();?>public/bootstrap/js/bootstrap.js " ></script>
<style>
  b{
       color:#f00;
  }
</style>
<title>显示考勤信息</title>
</head>
<body>
<ol class="breadcrumb" style="background:#337AB7;">
    <li><a href="#" style="color:#fff;">员工考勤管理系统</a></li>  
    <li><a href="<?php  echo base_url();?>index.php/M_att/read" style="color:#fff;">员工考勤信息</a></li>  
</ol>
 

<div style="margin-bottom: 5px; margin-left:10px; font-size:14px;"><strong><?php echo "Date: &nbsp;&nbsp;" .date('Y-m-d',time());?></strong>
<a href="<?php echo site_url('M_att/pick');?>"  class="btn btn-info btn-sm" style="margin-bottom: 10px; margin-right:30px;float:right;">显示未正常考勤员工名单</a>
</div>
<div>
	<table class="table" style="border:2px solid #ccc;">
	<tr class="row">
	<th>员工编号</th><th>姓名</th><th>部门</th><th>职位</th><th>上班状态</th><th>下班状态</th><th>更多</th>
	</tr>
	<?php foreach ($data['att'] as $v):?>
	      <tr class="row" >
	         <td><?php echo $v->e_no;?></td><td><?php echo $v->e_name;?></td>
	         <td><?php $dep= $v->e_dep; echo $data['dep'][$dep-1]->name; ?></td>
	         <td><?php $pos= $v->e_pos; echo $data['pos'][$pos-1]->name; ?></td>
	         <td><?php  switch ( $v->s_status){case 0: echo '未打卡'; break;  
	                                           case 1: echo '正常上班'; break;
	                                           case 2: echo "<b>迟到</b>";break;}?></td>
	         <td><?php switch ( $v->e_status) {case 0: echo '未打卡'; break;  
	                                           case 1: echo '正常下班'; break;
	                                           case 2: echo "<b>早退</b>";break;}?></td>
	         <td><a href="<?php echo site_url('M_att/detail/'.$v->e_no);?>" class="btn btn-default btn-xs" style="margin-left:0;">查看更多</a></td> 
	       </tr>
	       <?php endforeach;?>
	</table>
</div>
</body>
</html>