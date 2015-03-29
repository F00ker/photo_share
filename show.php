<?php
echo '<link rel="stylesheet" href="css/show.css" type="text/css" />';

$taken_date = strtotime(exif_read_data("photos/".$_GET['file'])['DateTimeOriginal']);

echo '<div class="pic">';
  echo '<div name="content">';
    echo '<img class="pic_object" src="photos/'.$_GET['file'].'">';
  echo '</div>';
  echo '<div class="meta">';
    #check if taken_date not null
    echo 'Taken: '.date('d/m/Y',$taken_date);
  echo '</div>';
echo '</div>';
?>
