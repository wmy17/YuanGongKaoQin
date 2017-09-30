<?php
/**
 * Created by PhpStorm.
 * User: whdn1
 * Date: 2017/8/17
 * Time: 8:45
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel ="stylesheet" type="text/css"
          href ="<?php echo base_url();?>public/bootstrap/css/bootstrap.min.css">
    <!--base_url()==>localhost/CI/-->
    <script src ="<?php echo base_url();?>public/bootstrap/js/bootstap.min.js"></script>
    <title>学历信息管理</title>
</head>
<body>
    <ol class="breadcrumb" style ="background: #337AB7;">
        <li><a href="#" style ="color: #800080;">员工考勤管理系统</a><>
        <li><a href="<?php echo site_url('Edu/add')?>"
               target="right" style ="color: #fff;">员工学历添加</a><>
        <li><a href ="<?php echo site_url('Edu/index')?>"
               target="right" style ="color: #fff;">员工学历查询删除和修改</a><>
    </ol>
    <table class ="table">
        <tr class ="row">
            <td>编 号</td><td>学 历</td><td>编 辑</td>
        </tr>

        <?php foreach($data as $v):?>
            <tr class="row">
                <td><?php echo $v->id;?></td>
                <td><?php echo $v->name;?></td>
                <td>
                    <a href="<?php echo site_url('Edu/del/'.$v->id)?>"
                    class="btn btn-default btn-sm">删除</a>
                    <a href="<?php echo site_url('Edu/edit/'.$v->id)?>"
                       class="btn btn-default btn-sm">修改</a>
                </td>
            </tr>
        <?php endforeach?>
    </table>
</body>
</html>