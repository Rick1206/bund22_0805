    <div class="leftmenu">
		<h1>投资者关系</h1>
		<dl id="menu">
            <dt rel="havechlid"><a href="javascript:void(0)">财务运营数据<s></s></a></dt>
			<dd<?php echo (isset($left_nav) && $left_nav=='1') ? "" : " style=\"display:none;\"";?>>
                <a href="down.php?action=down">下载专区</a>
            </dd>
			<dt><a href="ir.php?action=ir">投资者关系活动</a></dt>
			<dt><a href="bulletin.php?action=bulletin">公告与通函</a></dt>
		</dl>
	</div>
	<script language="javascript">
		$(function(){
			var $menu = $("#menu");
			var $list = $menu.find("dt[rel='havechlid']");
			var $hide = $menu.find("dd");
			$list.click(function(e){
				var $this =  $(this);
				if(!$this.hasClass("ison")){
					$this.next("dd").slideDown(400).siblings("dd").slideUp(200);	
					$this.addClass("ison");
				}
				else
				{
					$this.next("dd").slideUp(200);	
					$this.removeClass("ison");	
				}
			});
		});
	</script>