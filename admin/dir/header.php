<?php
if($title != 'admin page'){
	echo ">MAIN </a>";
}
if($title != 'add article page'){
echo "<a href=\"add.php\">ADD NEW ARTICLE</a>";}
echo "<a href=\"/blog/admin/Logout.php\">LOGOUT</a>";