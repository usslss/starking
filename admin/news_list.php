<?php
include('php/identify.php');
?>
<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="UTF-8">
    <title>news_list</title>
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
        <a href="news_list.php">新闻管理</a>
        <a>
          <cite>新闻列表</cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    
    <div class="x-body">


<table class="layui-hide" id="LAY_table_user" lay-filter="useruv"></table>


</div>


<script type="text/html" id="barDemo">
<a class="layui-btn layui-btn-xs " lay-event="edit" method="post"><i class="layui-icon">&#xe642;</i>编辑</a>    
<a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del"><i class="layui-icon">&#xe640;</i>删除</a>
</script>


<script src="./lib/layui/layui.js"></script>



<script>





    layui.use('table', function(){
        var table = layui.table;

        //方法级渲染
        table.render({
            elem: '#LAY_table_user'
            ,url: 'php/news/news_query.php'
            ,method: 'get'
            ,cols: [[
                {field:'news_id', title: '新闻ID', sort: true, fixed: false,width:100}
                ,{field:'news_title', title: '新闻标题', sort: false, fixed: false,width:300}
                ,{field:'news_summary', title: '新闻摘要文字',  sort: false, fixed: false}  
                ,{field:'news_img_alt', title: '新闻配图alt',  sort: false, fixed: false,width:150}                  
                ,{field:'news_click', title: '点击数量', sort: false, fixed: false,width:100}
                ,{field:'news_addtime', title: '添加时间', sort: true, fixed: false,width:180}
                ,{field:'right', title: '操作', width:178,align:'center',toolbar:"#barDemo", fixed: 'right'}
            ]]
            ,id: 'testReload'
            ,page: true
            //,height: 600
        });




        //监听表格复选框选择
        table.on('checkbox(useruv)', function(obj){
            console.log(obj)
        });
        //监听工具条
        table.on('tool(useruv)', function(obj){
            var data = obj.data;
            if(obj.event === 'edit'){

                var c='php/news/news_edit.php?news_id='+data.news_id;
                x_admin_show('新闻编辑',c,1200,810);
             	 
             	               
            } else if(obj.event === 'del'){
                layer.confirm('确定删除这条新闻?', function(index){
                    console.log(data);
                    obj.del();
                    layer.close(index);
                    $.ajax({
                        url: "php/news/news_delete.php",
                        type: "post",
                        data:{"news_id":data.news_id,"news_url":data.news_url},
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


    
    
</script>


  
</form>




      
      
      
      
      





      
      
      

 

 

               
          
   

      
      
      
      
      
      
      
  </body>

</html>