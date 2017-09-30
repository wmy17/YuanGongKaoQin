<?php
/*时间：2017年8月17日*/
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
<title>员工考勤信息</title>
</head>
<body>
<ol class="breadcrumb" style="background:#337AB7;">
<li><a href="<?php  echo base_url();?>index.php/M_att/read" style="color:#fff;">员工考勤信息管理</a></li>
<li><a href="#" style="color:#fff;">员工考勤信息</a></li>
</ol>
<div style="margin-left:70px;">
   
    <ul style="list-style:none;">
      <li style="margin-bottom:10px;">
         <label style="margin-right:60px;">编号</label>
         <?php echo $data['att']->e_no; ?>
      </li>
      <li style="margin-bottom:10px;">
         <label style="margin-right:60px;">姓名</label>
         <?php echo $data['att']->e_name; ?>
      </li>
      <li style="margin-bottom:10px;">
         <label style="margin-right:60px;">性别</label>
         <?php echo $data['att']->e_sex; ?>
      </li>
      <li style="margin-bottom:10px;">
         <label style="margin-right:60px;">职位</label>
         <?php 
            $pos= $data['att']->e_pos;
            echo $data['pos'][$pos-1]->name;  
         ?>
      </li>
      <li style="margin-bottom:10px;">
         <label style="margin-right:60px;">部门</label>
         <?php 
            $dep= $data['att']->e_dep;
            echo $data['dep'][$dep-1]->name; 
         ?>
      </li>
      <li style="margin-bottom:10px;">
         <label style="margin-right:33px;">联系电话</label>
         <?php          
            echo $data['att']->e_del;  
         ?>
      </li>
      <li style="margin-bottom:10px;">
      <label style="margin-right:33px;" >上班打卡</label>
      <?php  switch ( $data['att']->s_status){case 0: echo '未打卡'; break;  
	                                           case 1: echo '正常上班'; break;
	                                           case 2: echo "<b>迟到</b>";break;}?>
	  </li>
	  <li style="margin-bottom:30px;">
	  <label style="margin-right:33px;" >下班打卡</label>
	  <?php switch ( $data['att']->e_status) {case 0: echo '未打卡'; break;  
	                                           case 1: echo '正常下班'; break;
	                                           case 2: echo "<b>早退</b>";break;}?>
	  </li>
    </ul>
     <div><a href="<?php echo site_url('M_att/recently/'.$data['att']->e_no);?>" class="btn btn-primary btn-md" style="margin-left:41px;">查看该员工近期考勤信息</a></div> 
    
    </div>
    </body>
</html>