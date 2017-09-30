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
<title>详细员工信息</title>
</head>
<body>
<ol class="breadcrumb" style="background:#337AB7;">
<li><a href="<?php  echo base_url();?>index.php/M_emo/read" style="color:#fff;">员工信息管理</a></li>
<li><a href="#" style="color:#fff;">显示员工信息</a></li>
</ol>
<form action="<?php  echo base_url();?>index.php/M_emo/exec" method="post" name="form">
    <ul style="list-style:none;">
      <li style="margin-bottom:10px;">
         <label style="margin-right:60px;">编号</label>
         <?php echo $data['emo']->e_no; ?>
      </li>
      <li style="margin-bottom:10px;">
         <label style="margin-right:60px;">姓名</label>
         <?php echo $data['emo']->e_name; ?>
      </li>
      <li style="margin-bottom:10px;">
         <label style="margin-right:60px;">密码</label>
         <?php echo $data['emo']->e_pwd; ?>
      </li>
      <li style="margin-bottom:10px;">
         <label style="margin-right:60px;">性别</label>
         <?php echo $data['emo']->e_sex; ?>
      </li>
      <li style="margin-bottom:10px;">
         <label style="margin-right:33px;">出生年月</label>
         <?php echo date('Y-m-d',$data['emo']->e_birth); ?>
      </li>
      <li style="margin-bottom:10px;">
         <label style="margin-right:60px;">职位</label>
         <?php 
            $pos= $data['emo']->e_pos;
            echo $data['pos'][$pos-1]->name;  
         ?>
      </li>
       <li style="margin-bottom:10px;">
         <label style="margin-right:60px;">学历</label>
         <?php 
            $edu= $data['emo']->e_edu;
            echo $data['edu'][$edu-1]->name;
         ?>
      </li>
      <li style="margin-bottom:10px;">
         <label style="margin-right:60px;">部门</label>
         <?php 
            $dep= $data['emo']->e_dep;
            echo $data['dep'][$dep-1]->name; 
         ?>
      </li>
      <li style="margin-bottom:30px;">
         <label style="margin-right:33px;">联系电话</label>
         <?php          
            echo $data['emo']->e_del;  
         ?>
      </li>
      <li>
      <button type="submit" name="edit_submit"  class="btn btn-info btn-sm" style="margin-bottom: 5px;" value="<?php echo $data['emo']->e_no;?>" >更新员工信息</button>
      </li>
    </ul>
</form>
    </body>
</html>