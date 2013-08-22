    <div class="leftmenu">
		<h1>联系我们</h1>
		<dl id="menu">
            <dt rel="havechlid"><a href="javascript:void(0)">工作机会<s></s></a></dt>
			<dd>
                <a href="company.php?action=company">所属公司</a>
				<a href="location.php?action=location">工作地点</a>
                <a href="department.php?action=department">工作性质</a>
				<a href="job.php?action=job">招聘信息</a>
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