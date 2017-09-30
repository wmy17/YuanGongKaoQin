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

function show()
{
		   document.getElementById('show_res').style.diaplay="block";   
}
</script>
<title>员工近期考勤信息</title>
</head>
<body>
<ol class="breadcrumb" style="background:#337AB7;">
<li><a href="<?php  echo base_url();?>index.php/M_att/read" style="color:#fff;">员工考勤信息管理</a></li>
<li><a href="#" style="color:#fff;">员工近期考勤信息</a></li>
</ol>
<div style="margin:20px 20px;" class="panel panel-default">
   <?php $e_no=$this->uri->segment(3); 
     echo form_open('M_att/do_rec/'.$e_no);?>
     <div class="panel panel-heading">
        <label style="margin-right: 30px;">请填写日期范围</label>
        <?php $place=array('placeholder'=>'起始日期','style'=>'margin-top:5px; height:25px;');echo form_input('start','',$place);?>---
        <?php $place=array('placeholder'=>'终止日期','style'=>'margin-top:5px; height:25px;'); echo form_input('end','',$place);?>      
        <?php  $style=array('class'=>'btn btn-primary btn-sm','style'=>'','onclick'=>"show()"); echo form_submit('submit','确定',$style);?>

        <a onclick="cf_print()" class="btn btn-primary btn-sm" style="float:right; margin-right:40px;">打印</a>

     </div>
     <div class="panel panel-body"   >
          <div class="form-inline" id="show_res"  style=" margin-bottom:20px;" > <?php echo "员工编号：".$data['emo']->e_no."&nbsp;&nbsp;&nbsp;";  ?> <?php echo "员工姓名：".$data['emo']->e_name."&nbsp;&nbsp;&nbsp;";?>
                        <?php $pos= $data['emo']->e_pos;
                        echo "所在职位：".$data['pos'][$pos-1]->name."&nbsp;&nbsp;&nbsp;";?>  
                      <?php $pos= $data['emo']->e_dep;
                        echo "  所在部门：".$data['dep'][$pos-1]->name."&nbsp;&nbsp;&nbsp;"; ?>
           </div>
        <table class="table" style="border:2px solid #ccc;">
	    <tr class="row">
	      <th>日期</th><th>上班状态</th><th>下班状态</th>
	    </tr>
       <?php if(is_array($data['att'])):
       	     foreach ($data['att'] as $v):?>
       	     <tr class="row" >
       	     <td><?php echo date('Y-m-d',$v->work_time);?></td>
       	     <td><?php  switch ( $v->s_status){case 0: echo '未打卡'; break;  
	                                           case 1: echo '正常上班'; break;
	                                           case 2: echo "<b>迟到</b>";break;}?></td>
	         <td><?php switch ( $v->e_status) {case 0: echo '未打卡'; break;  
	                                           case 1: echo '正常下班'; break;
	                                           case 2: echo "<b>早退</b>";break;}?></td>
       	     </tr>
       <?php endforeach;
             endif;
       ?>
       </table>     
     </div>
 </form>
 </div>
</body>
</html>