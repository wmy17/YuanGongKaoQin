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
<title>修改员工信息</title>
</head>
<body>
<ol class="breadcrumb" style="background:#337AB7;">
<li><a href="<?php  echo base_url();?>index.php/M_emo/read" style="color:#fff;">员工信息管理</a></li>
<li><a href="#" style="color:#fff;">修改员工信息</a></li>
</ol>
<form action="<?php  echo base_url();?>index.php/M_emo/doedit" method="post" name="form">
    
      <div style="margin-bottom:10px;" class="form-inline">
         <label style="margin-right:60px;">编号</label>
         <input type="text" class="form-control" name="empno" readonly="true" value="<?php echo $data['emo']->e_no; ?>" >
      </div>
      <div style="margin-bottom:10px;" class="form-inline">
         <label style="margin-right:60px;">姓名</label>
         <input type="text" name="name" class="form-control" readonly="true" value="<?php echo $data['emo']->e_name; ?>" >
         
      </div>
      <div style="margin-bottom:10px;" class="form-inline">
         <label style="margin-right:60px;">密码</label>
          <input type="text" name="pwd" value="<?php echo $data['emo']->e_pwd; ?>" >
      </div>
      <div style="margin-bottom:10px;" class="form-inline">
         <label style="margin-right:60px;">性别</label>
         <input type="text" name="female" value="<?php echo $data['emo']->e_sex; ?>" >
      </div>
      <div style="margin-bottom:10px;" class="form-inline">
         <label style="margin-right:33px;">出生年月</label>
         <input type="text" name="birth" value="<?php echo date('Y-m-d',$data['emo']->e_birth); ?>" >
      </div>
      <div style="margin-bottom:10px;" class="form-inline">
         <label style="margin-right:60px;">职位</label>
          <select name="pos">
          <?php  
            foreach ($data['pos'] as $v){
            echo '<option value="'.$v->id.'">'.$v->name.'</option>';
           }
       
           ?>
          </select>
      </div>
       <div style="margin-bottom:10px;" class="form-inline">
         <label style="margin-right:60px;">学历</label>
         <select name="edu">
		    <?php 
		       foreach ($data['edu'] as $v){
		           echo '<option value="'.$v->id.'">'.$v->name.'</option>';
		       }
		    ?>
         </select>
      </div>
      <div style="margin-bottom:10px;" class="form-inline">
         <label style="margin-right:60px;">部门</label>
         <select name="dep">
			    <?php 
			       foreach ($data['dep'] as $v){
			           echo '<option value="'.$v->id.'">'.$v->name.'</option>';
			       }
			    ?>
         </select>
      </div>
      <div style="margin-bottom:10px;" class="form-inline">
         <label style="margin-right:33px;">联系电话</label>
                  
           <input type="text" name="phone" value="<?php echo $data['emo']->e_del; ?>" >  
      </div>
    </ul>
    <button type="submit" name="submit"  class="btn btn-info btn-sm" style="margin-bottom: 5px;" >确认修改</button>
</form>
    </body>
</html>