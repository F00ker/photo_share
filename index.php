<?php
echo '<head>';
echo '<meta http-equiv="Content-type" content="text/html;charset=UTF-8">';
echo '<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>';
echo '<link rel="stylesheet" href="js/jquery.fancybox.css" type="text/css" media="screen" />';
echo '<link rel="stylesheet" href="js/style.css" type="text/css" />';
echo '<script type="text/javascript" src="js/jquery.fancybox.pack.js?v=2.1.5"></script>';
echo '<title> Scott </title>';
echo '</head>';


// list files and sort by exif date
$files = scandir("./thumbs/");
$files = array_diff($files, array('.', '..'));
$sorted_files = array();

foreach($files as $file)
{
  array_push($sorted_files,[exif_read_data("photos/".$file)['DateTimeOriginal'],$file]);
}

asort($sorted_files);

// display sorted array of thumbnails
foreach ($sorted_files as $file)
{
  echo '<a class="fancybox" rel="group" href=show.php?file='.urlencode($file[1]).'>';
  echo '<img class="pic" src="thumbs/'.$file[1].'">';
  echo '</a>';
}

?>
