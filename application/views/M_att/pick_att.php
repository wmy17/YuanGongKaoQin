<?php
/*时间：2017年8月18日*/
header("content-type:text/html;charset=utf-8");

?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="<?php  echo base_url();?>public/bootstrap/css/bootstrap.css ">
<script src="<?php  echo base_url();?>public/bootstrap/js/bootstrap.js " ></script>
<script> 

function cf_print()
{
	if(confirm('是否开始打印？'))
		{
		    window.print();
		}else{
			return false;
		}
}
</script>
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
<a onclick="cf_print()" class="btn btn-info btn-sm" style="float:right;margin-bottom:5px; margin-right:40px;">打印</a>
</div>
<div>
	<table class="table" style="border:2px solid #ccc;">
	<tr class="row">
	<th>员工编号</th><th>姓名</th><th>部门</th><th>上班状态</th><th>下班状态</th><th>更多</th>
	</tr>
	<?php foreach ($data['pick'] as $v):?>
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