    <div class="leftmenu">
		<h1>Customer管理</h1>
		<dl id="menu">
            <dt rel="havechlid"><a href="javascript:void(0)">Customer<s></s></a></dt>
			<dd<?php echo $left_nav=='1' ? "" : " style=\"display:none;\"";?>>
                <a href="customer.php?action=customer">Customer 管理</a>
            </dd>
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