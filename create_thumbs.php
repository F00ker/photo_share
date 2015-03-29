<?php

##
# Resize photos for thumbnails
#
# Create thumbnails from file in upload/ and copy original to photos/
##


$files = scandir('upload/');
foreach($files as $file)
{
  if($file!="." && $file!='..')
  {
    $thumb = new Imagick('upload/'.$file);
    $thumb->resizeImage(480,360,Imagick::FILTER_LANCZOS,1,true);
    $thumb->writeImage('thumbs/'.$file);

    $thumb->destroy();

    rename('upload/'.$file,'photos/'.$file);
  }
}
?>
