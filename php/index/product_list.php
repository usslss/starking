<?php

//获得产品类别名称
$sql = "SELECT DISTINCT product_class FROM product";
$result = mysqli_query($link, $sql);
$i = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $productClassName[$i] = $row["product_class"];
    $i++;
}

?>

		<div class="index-pro w-1200 mt40">
			<div class="title">
				<div class="fl">
					<h4>产品展示</h4>
					<span>PRODUCT</span>
				</div>
				<input type="hidden" id='class' value='<?php echo $productClassName[0]; ?>' />
        		<input type="hidden" id='type' value='咖啡' />
				<div class="fr">
					<div class="tab">
						<a href="javascript:;" class="on" onclick="product('<?php echo $productClassName[0]; ?>',1)"><?php echo $productClassName[0]; ?>系列</a>
<?php
for ($i = 1; $i < 5; $i++) {
    echo <<< CLS
						<a href="javascript:;" onclick="product('{$productClassName[$i]}',1)">{$productClassName[$i]}系列</a>

CLS;
}
?>
					</div>
				</div>
			</div>
			<div class="content" id="productContent">
				<ul style="display: block;">
<?php
$sql = "SELECT * from product WHERE product_class='{$productClassName[0]}' AND product_type='咖啡' LIMIT 4";
$result = mysqli_query($link, $sql);
$i = 0;
while ($row = mysqli_fetch_assoc($result)) {
	$showArr[$i]['product_img_url']=$row["product_img_url"];
	$showArr[$i]['product_img_alt']=$row["product_img_alt"];
	$showArr[$i]['product_url']='/product/show_'.$row["product_id"].'.html';
	$i++;
}
$show_sum=$i;
for($i=0;$i<$show_sum;$i++){
	echo <<<EOT
					<li>
						<a href="{$showArr[$i]['product_url']}">
							<img src="{$showArr[$i]['product_img_url']}" alt="{$showArr[$i]['product_img_alt']}">
						</a>
					</li>	

EOT;

}
?>

				</ul>
			</div>
			<div class="shaixuan">
				<h5>产品筛选：</h5>
				<ul>
					<li id="咖啡" class="active">
						<a href="javascript:;" onclick="product('咖啡',2)">咖啡</a>
					</li>
					<li id="黑糖">
						<a href="javascript:;" onclick="product('黑糖',2)">黑糖</a>
					</li>
					<li id="欧包">
						<a href="javascript:;" onclick="product('欧包',2)">欧包</a>
					</li> 
					<li id="奶茶">
						<a href="javascript:;" onclick="product('奶茶',2)">奶茶</a>
					</li>
					<li id="水果茶">
						<a href="javascript:;" onclick="product('水果茶',2)">水果茶</a>
					</li>
				</ul>
			</div>
			<script>
            $('.tab a').click(function() {
               // var i = $(this).index(); //下标第一种写法
                $(this).addClass('on').siblings().removeClass('on');
             //   $('.content ul').eq(i).show().siblings().hide();
            });

            function product(content, version) {

				var aa='#'+content
				$(aa).toggleClass('active').siblings().removeClass('active');;

                if (version == 1) {
                    $("#class").val(content);
                }
                if (version == 2) {
                    $("#type").val(content);
                }


                $.ajax({
                    type: "POST",
                    url: "php/index/product_list_query.php",
                    data: {
                        class: $("#class").val(),
                        type: $("#type").val()
                    },
                    dataType: "json",
                    success: function(callback) {
                        $('#productContent').empty(); //清空resText里面的所有内容
                      var html = '<ul style="display: block;">';


						for(var i=0;i<callback.sum;i++){
							html +='<li>';
							html +='<a href="'+callback.data[i].product_url+'">';
							html +='<img src="'+callback.data[i].product_img_url+'" alt="'+callback.data[i].product_img_alt+'">';
							html +='</li>';
						}
						html +='</ul>';

                       $('#productContent').html(html);

                    }
                });
            };
			</script>
		</div>