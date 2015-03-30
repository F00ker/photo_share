<?php
echo '<head>';
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
$taken_date = "";
foreach ($sorted_files as $file)
{

  if($taken_date != substr($file[0],0,10))
  {
    if ($taken_date != "")
      echo "</div>";
    echo "<div class=newday>";
    echo substr($file[0],0,10);
    $taken_date = substr($file[0],0,10);
  }
  echo '<a class="fancybox" rel="group" href=show.php?file='.urlencode($file[1]).'>';
  echo '<img class="pic" src="thumbs/'.$file[1].'">';
  echo '</a>';
}
echo "</div>";
?>
