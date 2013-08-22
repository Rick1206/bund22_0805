    <div class="leftmenu">
		<h1>系统设置 </h1>
		<dl id="menu">
			<dt><a href="main.php">系统信息</a></dt>
			<dt><a href="cgpass.php">修改密码</a></dt>
			<?php
			if( @in_array('1',$a_right)) {
			?>
			<dt><a href="user.php?action=user">用户管理</a></dt>
			<?php
			}
			if( @in_array('2',$a_right)) {
			?>
			<dt><a href="user_group.php?action=user_group">用户组管理</a></dt>
			<?php
			}
			?>
		</dl>
	</div>