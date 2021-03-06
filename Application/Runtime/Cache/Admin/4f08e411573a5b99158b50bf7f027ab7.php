<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/ThinkPHP/Public/Admin/css/base.css">
    <link rel="stylesheet" type="text/css" href="/ThinkPHP/Public/Admin/css/info-mgt.css">
    <link rel="stylesheet" type="text/css" href="/ThinkPHP/Public/Admin/css/WdatePicker.css">
    <title>移动办公自动化系统</title>
</head>
<body>
<div class="title"><h2>信息管理</h2></div>
<div class="table-operate ue-clear">
    <a href="javascript:;" class="add">添加</a>
    <a href="javascript:;" class="del">删除</a>
    <a href="javascript:;" class="edit">编辑</a>
    <a href="javascript:;" class="count">统计</a>
    <a href="javascript:;" class="check">审核</a>
</div>
<div class="table-box">
    <table>
        <thead>
            <tr>
               
                <th class="num">序号</th>
                <th class="name">部门</th>
                <th class="process">所属部门</th>
                <th class="node">排序</th>
                <th class="time">备注</th>
                <th class="operate">操作</th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><tr>
                    <td class="num">
                        <?php echo ($vol["id"]); ?>
                    </td>
                    <td class="name"><?php echo (str_repeat( '&emsp;',$vol["name"]*2)); ?>  <?php echo ($vol["name"]); ?></td>
                    <td class="process">
                        <?php if($vol["pid"] == 0): ?>顶级部门 <?php else: ?> <?php echo ($vol["deptname"]); endif; ?>
                    </td>
                    <td class="node"><?php echo ($vol["sort"]); ?></td>
                    <td class="time"><?php echo ($vol["remark"]); ?></td>
                    <td class="operate">
                    <input type="checkbox" class="deptid" value="<?php echo ($vol["id"]); ?>">
                    <a href="/ThinkPHP/index.php/Admin/Dept/edit/id/<?php echo ($vol["id"]); ?>">编辑</a>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>

        </tbody>
    </table>
</div>
<div class="pagination ue-clear"></div>
</body>
<script src="/ThinkPHP/Public/Admin/js/jquery.js"></script>
<script src="/ThinkPHP/Public/Admin/js/common.js"></script>
<script src="/ThinkPHP/Public/Admin/js/WdatePicker.js"></script>
<script src="/ThinkPHP/Public/Admin/js/jquery.pagination.js"></script>
<script>
    $(".select-title").on("click",function(){
        $(".select-list").hide();
        $(this).siblings($(".select-list")).show();
        return false;
    })
    $(".select-list").on("click","li",function(){
        var txt = $(this).text();
        $(this).parent($(".select-list")).siblings($(".select-title")).find("span").text(txt);
    })
    $(".pagination").pagination(100,{
        callback:function(page){
            alert(page);
        },
        display_msg : true,
        setPageNo:true
    })
    $("tbody").find("tr:odd").css("backgroundColor","#eff6fa");
    $("tbody").find("tr:odd").css("backgroundColor","#eee6fa");


    $(function(){
        $(".del").on('click',function(){
            var idObj = $(":checkbox:checked"); //获取全部已经被选中的checkbox
            var id = ''; //接收处理后的部门id的值。组成id1，id2，
            //循环遍历idobj对象，获取其中的每一个的值。
            for(var i = 0;i < idObj.length;i++){
                id = id + idObj[i].value + ',';
            }
            //去掉最后的逗号
            id = id.substring(0,id.length-1);
            console.log(id);
            window.location.href="/ThinkPHP/index.php/Admin/Dept/del/id/" + id;
        })
    })
</script>
</html>