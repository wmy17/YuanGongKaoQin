<?php
/*时间：2017年8月15日*/
header("content-type:text/html;charset=utf-8");

?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="<?php  echo base_url();?>public/bootstrap/css/bootstrap.css ">
<script src="<?php  echo base_url();?>public/bootstrap/js/bootstrap.js " ></script>

<title>分部门显示员工信息</title>
</head>
<body>
<ol class="breadcrumb" style="background:#337AB7;">
    <li><a href="#" style="color:#fff;">员工考勤管理系统</a></li>  
    <li><a href="<?php  echo base_url();?>index.php/M_emo/read" style="color:#fff;">员工信息管理</a></li>  
    </ol>
   <form action="<?php  echo base_url();?>index.php/M_emo/exec" method="post" name="form">
    <label >财务部</label>
<table class="table" style="border:2px solid #ccc;">
<tr class="row">
<th>员工编号</th><th>姓名</th><th>性别</th><th>联系电话</th><th>详情</th><th>编辑</th>
</tr>
<?php 
		foreach ($data['caiw'] as $v):?>
      <tr class="row" >
         <td><?php echo $v->e_no;?></td><td><?php echo $v->e_name;?></td><td><?php echo $v->e_sex;?></td><td><?php echo $v->e_del;?></td>
         <td><button type="submit" name="detail_submit" value="<?php echo $v->e_no;?>" class="btn btn-default btn-xs" style="margin-left:0;">更多..</button></td>  
         <td><button type="submit" name="del_submit" value="<?php echo $v->e_no;?>" class="btn btn-default btn-xs" style="margin-left:0;">删除</button></td>        
       </tr>
       <?php endforeach;?>
       
   </table>
   <hr>
   <label >市场部</label>
<table class="table" style="border:2px solid #ccc;">
<tr class="row">
<th>员工编号</th><th>姓名</th><th>性别</th><th>联系电话</th><th>详情</th><th>编辑</th>
</tr>
<?php foreach ($data['shic'] as $v):?>
      <tr class="row" >
         <td><?php echo $v->e_no;?></td><td><?php echo $v->e_name;?></td><td><?php echo $v->e_sex;?></td><td><?php echo $v->e_del;?></td>
         <td><button type="submit" name="detail_submit" value="<?php echo $v->e_no;?>" class="btn btn-default btn-xs" style="margin-left:0;">更多..</button></td>  
         <td><button type="submit" name="del_submit" value="<?php echo $v->e_no;?>" class="btn btn-default btn-xs" style="margin-left:0;">删除</button></td>       
       </tr>
       <?php endforeach;?>
   </table>
   <hr>
   <label >人事部</label>
<table class="table" style="border:2px solid #ccc;">
<tr class="row">
<th>员工编号</th><th>姓名</th><th>性别</th><th>联系电话</th><th>详情</th><th>编辑</th>
</tr>
<?php foreach ($data['rens'] as $v):?>
      <tr class="row" >
         <td><?php echo $v->e_no;?></td><td><?php echo $v->e_name;?></td><td><?php echo $v->e_sex;?></td><td><?php echo $v->e_del;?></td>
         <td><button type="submit" name="detail_submit" value="<?php echo $v->e_no;?>" class="btn btn-default btn-xs" style="margin-left:0;">更多..</button></td>  
         <td><button type="submit" name="del_submit" value="<?php echo $v->e_no;?>" class="btn btn-default btn-xs" style="margin-left:0;">删除</button></td>       
       </tr>
       <?php endforeach;?>
   </table>
   <hr>
   <label >技术部</label>
<table class="table" style="border:2px solid #ccc;">
<tr class="row">
<th>员工编号</th><th>姓名</th><th>性别</th><th>联系电话</th><th>详情</th><th>编辑</th>
</tr>
<?php foreach ($data['jis'] as $v):?>
      <tr class="row" >
         <td><?php echo $v->e_no;?></td><td><?php echo $v->e_name;?></td><td><?php echo $v->e_sex;?></td><td><?php echo $v->e_del;?></td>
         <td><button type="submit" name="detail_submit" value="<?php echo $v->e_no;?>" class="btn btn-default btn-xs" style="margin-left:0;">更多..</button></td>  
         <td><button type="submit" name="del_submit" value="<?php echo $v->e_no;?>" class="btn btn-default btn-xs" style="margin-left:0;">删除</button></td>       
       </tr>
       <?php endforeach;?>
   </table>
   </form>
</body>
</html>