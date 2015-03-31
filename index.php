<?php
echo '<head>';
echo '<link rel="stylesheet" href="css/main.css" type="text/css" />';
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

arsort($sorted_files);

// display sorted array of thumbnails
$taken_date = "";

echo "<div class=main>";
  foreach ($sorted_files as $file)
  {

    if($taken_date != substr($file[0],0,10))
    {
      if ($taken_date != "")
        echo "</div>";
      echo "<div class=newday>";
      echo "<div class=date>";
      echo date('d/m/Y',strtotime($file[0]));
      echo "</div>";
      $taken_date = substr($file[0],0,10);
    }
    echo "<div class=pic>";
    echo '<a href=show.php?file='.urlencode($file[1]).'>';
    echo '<img src="thumbs/'.$file[1].'">';
    echo '</a>';
    echo "</div>";
  }
  echo "</div>";
echo "</div>";
?>
