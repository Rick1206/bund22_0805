    <div class="leftmenu">
		<h1>相册管理</h1>
		<dl id="menu">
            <dt rel="havechlid"><a href="javascript:void(0)">相册管理<s></s></a></dt>
			<dd<?php echo $left_nav=='1' ? "" : " style=\"display:none;\"";?>>
                <a href="gallery.php?action=gallery&type_id=1">about</a>
				<a href="gallery.php?action=gallery&type_id=2">discover</a>
				<a href="gallery.php?action=gallery&type_id=3">enticements</a>
				<a href="gallery.php?action=gallery&type_id=4">venue</a>
				<a href="gallery.php?action=gallery&type_id=5">wedding</a>
            </dd>
            <dt rel="havechlid"><a href="javascript:void(0)">视频管理<s></s></a></dt>
			<dd<?php echo $left_nav=='2' ? "" : " style=\"display:none;\"";?>>
                <a href="video.php?action=video&type_id=1">about</a>
				<a href="video.php?action=video&type_id=2">discover</a>
				<a href="video.php?action=video&type_id=3">enticements</a>
				<a href="video.php?action=video&type_id=4">venue</a>
				<a href="video.php?action=video&type_id=5">wedding</a>
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