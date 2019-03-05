		<div class="store w-1200 mt40">
			<div class="store-title">
				<span>全国加盟店矩阵</span>
			</div>
            <input type="hidden" id='page' value='1' />
			<ul id='storeContent'>

			</ul>
			<div class="fy" id='pageContent'>
			</div>
		</div>

			<script>

			$('.fy a').click(function() {
				$(this).addClass('active').siblings().removeClass('active');
			});

			function plist(page) {
				$("#page").val(page);
							

                $.ajax({
                    type: "POST",
                    url: "php/store/store_query.php",
                    data: {
                        page: $("#page").val()
                    },
                    dataType: "json",
					success: function(callback) {
						//内容部分
						$('#storeContent').empty(); 
						var html = '';
						for (var i = 0; i < callback.page_show; i++) {
							html += '<li>';						
							html += '<a href="' + callback.data[i].store_url + '"><img src="' + callback.data[i]
								.store_img_url + '" alt="' + callback.data[i].store_img_alt + '"></a>'							
							html += '<p>' + callback.data[i].store_name + '</p>';
							html += '</li>';
						}
                        html += '<div class="clear"></div>';
						$('#storeContent').html(html);

						//分页部分
						$('#pageContent').empty();
						console.log($("#page").val(),callback.page_sum);

						if ($("#page").val() == 1) {
							var html2 = '<a href="javascript:;" onclick="plist(1)">上一页</a>';
						} else {
							var html2 = '<a href="javascript:;" onclick="plist(' + ($("#page").val() - 1) + ')">上一页</a>';
						}
						for (var i = 1; i <= callback.page_sum; i++) {
							if (i == $("#page").val()) {
								html2 += '<a href="javascript:;" onclick="plist(' + i + ')" class="active">' + i + '</a>';
							} else {
								html2 += '<a href="javascript:;" onclick="plist(' + i + ')">' + i + '</a>';
							}

						}

						if ($("#page").val() == callback.page_sum) {
						var page_next=$("#page").val();					
						} else {
						var page_next=parseInt($("#page").val())+1;
						}
						html2 += '<a href="javascript:;" onclick="plist(' + page_next + ')">下一页</a>';
						$('#pageContent').html(html2);

                    }
                });

            };
			
			$(document).ready(function(){  
			plist(1);   
			});  

			</script>        