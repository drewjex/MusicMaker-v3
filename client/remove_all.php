<?php

$files = glob('../songs/*'); // get all file names
foreach($files as $file){ // iterate files
  echo $file."\n";
  if(is_file($file))
    unlink($file); // delete file
}

?>