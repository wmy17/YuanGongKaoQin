<link rel="stylesheet" type="text/css" href="<?php  echo base_url();?>public/bootstrap/css/bootstrap.min.css" />
	<script src="<?php  echo base_url();?>public/bootstrap/js/bootstrap.min.js"></script>
<!-- 循环显示数据  用表格来读取-->
<table class="table table-bordered" style="height: 150px; width: 980px; margin-left:50px;">
	<tr>
		<th>工号</th><th>工作日期</th><th>上班时间</th><th>上班状态</th><th>下班时间</th><th>下班状态</th>
	</tr>
	
		<tr>
			<td><?php echo $data->empno;?></td>
			<td><?php $today = $data->work_time; echo date('Y-m-d',$today);?></td>
			<td><?php $s = $data->start; echo date('Y-m-d H:i:s',$s);?></td>
			<td><?php $key = $data->s_status; switch ($key){case 0:echo "未打卡"; break; case 1:echo "已上班"; break; case 2:echo "迟到"; break;}?></td>
			<td><?php $e = $data->end; echo date('Y-m-d H:i:s',$e);?></td>
			<td><?php $key = $data->e_status; switch ($key){case 0:echo "未打卡"; break; case 1:echo "已下班"; break; case 2:echo "早退"; break;}?></td>

			
		</tr>

</table>
	
	
	
	
	
	
	
	

	
	
	
	