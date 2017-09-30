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
<title>添加员工信息</title>
</head>
<body>
<ol class="breadcrumb" style="background:#337AB7;">
<li><a href="<?php  echo base_url();?>index.php/M_emo/read" style="color:#fff;">员工信息管理</a></li>
<li><a href="<?php  echo base_url();?>index.php/M_emo/add" style="color:#fff;">添加员工信息</a></li>
</ol>
   <form class="form-inline" method="post" action="<?php  echo base_url();?>index.php/M_emo/doadd" >
  <div class="form-group" style="margin:0 5px 5px 20px;">
    <label >员工编号</label>
    <input type="text" class="form-control"  id="empno" name="empno" >    
  </div>
  <br><br>
  <div class="form-group" style="margin:0 5px 5px 20px;">
    <label >员工姓名</label>
    <input type="text" class="form-control"  id="name" name="name" >    
  </div>
  <br><br>
  <div class="form-group" style="margin:0 5px 5px 20px;">
    <label >登录密码</label>
    <input type="text" class="form-control"  id="pwd" name="pwd" value="<?php echo "111111"; ?>">    
  </div>
  <br><br>
  <div class="form-group" style="margin:0 5px 5px 20px;">
    <label style="margin-right:30px;" >性别</label>
       <input  type="radio" name="female" value="男">男
       <input  type="radio" name="female" value="女">女<br>    
  </div>
  <br><br>
  <div class="form-group" style="margin:0 5px 5px 20px;">
    <label >出生年月</label>   
    <!-- 
    <select name="year">
    <?php 
      /*  $years=range(date('Y'),date("Y",strtotime("now - 90 years")));
       foreach ($years as $year){
       	echo '<option value="'.$year.'">'.$year.'</option>';
       } */
    ?>
    </select>
    -->
    <input type="text" class="form-control"  id="birth" name="birth" placeholder="Y-m-d" >    
  </div>
  <br><br>
  <div class="form-group" style="margin:0 5px 5px 20px;">
    <label style="margin-right:30px;">职位</label>
     <select name="pos">
    <?php 
      
       foreach ($data['pos'] as $v){
           echo '<option value="'.$v->id.'">'.$v->name.'</option>';
       }
       
    ?>
    </select>
  </div>
  <br><br>
  <div class="form-group" style="margin:0 5px 5px 20px;">
    <label style="margin-right:30px;" >学历</label>
    <select name="edu">
    <?php 
       foreach ($data['edu'] as $v){
           echo '<option value="'.$v->id.'">'.$v->name.'</option>';
       }
    ?>
    </select>
  </div>
  <br><br>
  <div class="form-group" style="margin:0 5px 5px 20px;">
    <label >所属部门</label>
   <select name="dep">
    <?php 
       foreach ($data['dep'] as $v){
           echo '<option value="'.$v->id.'">'.$v->name.'</option>';
       }
    ?>
    </select>
  </div>
  <br><br>
  <div class="form-group" style="margin:0 5px 5px 20px;">
    <label >联系电话</label>
    <input type="text" name="phone" class="form-control" id="phone" >
  </div>
  <br><br>
  <button type="submit" name="submit" class="btn btn-info">确认添加</button>
</form>
</body>
</html>