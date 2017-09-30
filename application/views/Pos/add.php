<?php
/**
 * Created by PhpStorm.
 * User: whdn1
 * Date: 2017/8/17
 * Time: 20:41
 */


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel ="stylesheet" type="text/css"
          href ="<?php echo base_url();?>public/bootstrap/css/bootstrap.min.css">
    <script src ="<?php echo base_url();?>public/bootstrap/js/bootstap.min.js"></script>
    <title>添加职位信息</title>
</head>
<body>
<ol class="breadcrumb" style ="background: #337AB7;">
    <li><a href="#" style ="color: #800080;">员工考勤管理系统</a><>
    <li><a href="<?php echo site_url('Pos/add')?>"
           target="right" style ="color: #fff;">职位信息添加</a><>
    <li><a href ="<?php echo site_url('Pos/index')?>" target="right" style ="color: #fff;">职位信息查询删除和修改</a><>
</ol>
<div class="panel panel-default">
    <div class="panel-body" style="margin: 50px 50px;">
        <?php echo form_open('Pos/doadd')?>
        <div class="form-inline">
            <label class="control-label">职位</label>
            <?php echo form_input('name','',
                ['class'=>'form-control'])?>
        </div>
        <div class="form-group" style="margin: 10px 32px;">
            <?php echo form_submit('submit','添加数据',
                ['class'=>'btn btn-default btn-sm'])?>
        </div>
    </div>
</div>
</body>
</html>