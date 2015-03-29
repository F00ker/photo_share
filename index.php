<?php
echo '<head>';
echo '<meta http-equiv="Content-type" content="text/html;charset=UTF-8">';
echo '<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>';
echo '<link rel="stylesheet" href="js/jquery.fancybox.css" type="text/css" media="screen" />';
echo '<link rel="stylesheet" href="js/style.css" type="text/css" />';
echo '<script type="text/javascript" src="js/jquery.fancybox.pack.js?v=2.1.5"></script>';
echo '<title> Scott </title>';
echo '</head>';


// Category (folder) choice
$files = scandir("./thumbs/");
foreach ($files as $file)
{
	if($file != "." && $file!=".." && substr($file,strlen($file)-4)!=".php" && $file!="js" && $file!="robots.txt" && $file!=".htpasswd")
	{
		echo '<a class="fancybox" rel="group" href="photos/'.$file.'">';
                echo '<img class="pic" src="thumbs/'.$file.'">';
                echo '</a>';
	}
}

?>
