<?php

//获得产品类别名称
$sql = "SELECT DISTINCT product_class FROM product";
$result = mysqli_query($link, $sql);
$i = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $productClassName[$i] = $row["product_class"];
    $i++;
}
$product_class_sum = $i;
?>

		<div class="product w-1200">
			<div class="product-list fl">
				<input type="hidden" id='class' value='全部产品' />
        		<input type="hidden" id='page' value='1' />
				<div class="product-nav">
					<a href="javascript:;" class="active" onclick="plist('全部产品','class')">全部产品</a>
<?php
for ($i = 0; $i < $product_class_sum; $i++) {
    echo <<< CLS
					<a href="javascript:;" onclick="plist('{$productClassName[$i]}','class')">{$productClassName[$i]}系列</a>

CLS;
}
?>
				</div>
				<div id='productContent'>

				</div>
				<div class="fy" id='pageContent'>
				</div>
			</div>
			<script>
			$('.product-nav a').click(function() {
				$(this).addClass('active').siblings().removeClass('active');
			});

			$('.fy a').click(function() {
				$(this).addClass('active').siblings().removeClass('active');
			});



			function plist(content, version) {
				if (version == 'class') {
					$("#class").val(content);
					$("#page").val(1); //换分类的时候跳转到第一页
				}
				if (version == 'page') {
					$("#page").val(content);
				}			

                $.ajax({
                    type: "POST",
                    url: "php/product/product_query.php",
                    data: {
                        class: $("#class").val(),
                        page: $("#page").val()
                    },
                    dataType: "json",
					success: function(callback) {
						//内容部分
						$('#productContent').empty(); 
						var html = '<ul>';
						for (var i = 0; i < callback.page_show; i++) {
							html += '<li>';
							html += '<div class="img">';
							html += '<a href="' + callback.data[i].product_url + '"><img src="' + callback.data[i]
								.product_img_url + '" alt="' + callback.data[i].product_img_alt + '"></a>'
							html += '</div>';
							html += '<p><img src="' + callback.data[i].product_type_img_url + '" alt="' + callback
								.data[i].product_type_img_alt + '">' + callback.data[i].product_name + '</p>';
							html += '</li>';
						}
						html += '<div class="clear"></div>';
						html += '</ul>';
						$('#productContent').html(html);

						//分页部分
						$('#pageContent').empty();
						console.log($("#page").val(),callback.page_sum);

						if ($("#page").val() == 1) {
							var html2 = '<a href="javascript:;" onclick="plist(1,\'page\')">上一页</a>';
						} else {
							var html2 = '<a href="javascript:;" onclick="plist(' + ($("#page").val() - 1) + ',\'page\')">上一页</a>';
						}
						for (var i = 1; i <= callback.page_sum; i++) {
							if (i == $("#page").val()) {
								html2 += '<a href="javascript:;" onclick="plist(' + i + ',\'page\')" class="active">' + i + '</a>';
							} else {
								html2 += '<a href="javascript:;" onclick="plist(' + i + ',\'page\')">' + i + '</a>';
							}

						}

						if ($("#page").val() == callback.page_sum) {
						var page_next=$("#page").val();					
						} else {
						var page_next=parseInt($("#page").val())+1;
						}
						html2 += '<a href="javascript:;" onclick="plist(' + page_next + ',\'page\')">下一页</a>';
						$('#pageContent').html(html2);

                    }
                });

            };
			
			$(document).ready(function(){  
			plist('全部产品', 1);   
			});  
			
			</script>