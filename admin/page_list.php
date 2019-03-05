<?php

include('php/identify.php');


?>

<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="UTF-8">
    <title>news_page</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="./css/font.css">
    <link rel="stylesheet" href="./css/xadmin.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="./lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="./js/xadmin.js"></script>
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
      <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
      <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <body>
    <div class="x-nav">
      <span class="layui-breadcrumb">
        <a target="_parent" href="index.php">首页</a>
        <a href="page_list.php">页面管理</a>
        <a>
          <cite>页面列表</cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    
    <div class="x-body">
    

<table class="layui-hide" id="LAY_table_user" lay-filter="useruv"></table>


</div>


<script type="text/html" id="barDemo">
<a class="layui-btn layui-btn-xs " lay-event="edit" method="post"><i class="layui-icon">&#xe642;</i>编辑</a>    

</script>


<script src="./lib/layui/layui.js"></script>



<script>





    layui.use('table', function(){
        var table = layui.table;

        //方法级渲染
        table.render({
            elem: '#LAY_table_user'
            ,url: 'php/page/page_query.php'
            ,method: 'get'
            ,where: {website: '',xx:5 }
            ,cols: [[
                {field:'page_class', title: '页面', sort: true, fixed: false,width:100}
                ,{field:'page_title', title: '页面标题', sort: false, fixed: false,width:300}
                ,{field:'page_keywords', title: '页面关键字',  sort: false, fixed: false}
                ,{field:'page_description', title: '页面描述', sort: false, fixed: false,width:100}        
                ,{field:'page_website', title: '网站', sort: true, fixed: false,width:100}
                ,{field:'right', title: '操作', width:178,align:'center',toolbar:"#barDemo", fixed: 'right'}
            ]]
            ,id: 'testReload'
            ,page: true
            //,height: 600
        });




        //监听工具条
        table.on('tool(useruv)', function(obj){
            var data = obj.data;
            if(obj.event === 'edit'){

                var c='php/page/page_edit.php?page_class='+data.page_class+'_'+data.page_website;
                x_admin_show('页面编辑',c,1000,380);
             	 
             	               
            } else if(obj.event === 'del'){
                layer.confirm('确定删除?', function(index){
                    console.log(data);
                    obj.del();
                    layer.close(index);
                    $.ajax({
                        url: "php/page/page_delete.php",
                        type: "post",
                        data:{"page_class":data.page_class,"page_website":data.page_website},
                        dataType: "text",
                        

                    });
                });
            } else if(obj.event === 'editnouse'){

                layer.prompt({
                    formType: 2
                    ,title: '修改 ID 为 ['+ data.id +'] 的访问量'
                    ,value: data.uv
                }, function(value, index){
                    EidtUv(data,value,index,obj);
                   


                });



            }
        });

        $('.demoTable .layui-btn').on('click', function(){
            var type = $(this).data('type');
            active[type] ? active[type].call(this) : '';
        });

        function  EidtUv(data,value,index,obj) {
            $.ajax({
                url: "UVServlet",
                type: "POST",
                data:{"uvid":data.id,"memthodname":"edituv","aid":data.aid,"uv":value},
                dataType: "json",
                success: function(data){

                    if(data.state==1){

                        layer.close(index);
                        //同步更新表格和缓存对应的值
                        obj.update({
                            uv: value
                        });
                        layer.msg("修改成功", {icon: 6});
                    }else{
                        layer.msg("修改失败", {icon: 5});
                    }
                }

            });
        }


    });



    layui.use('laydate', function(){
        var laydate = layui.laydate;
                
        //执行一个laydate实例
        laydate.render({
          elem: '#search_startdate' //指定元素
        });

        //执行一个laydate实例
        laydate.render({
          elem: '#search_enddate' //指定元素
        });
      
      });



    
    
</script>


  
</form>




      
      
      
      
      





      
      
      


 

 

               
          
   

      
      
      
      
      
      
      
  </body>

</html>