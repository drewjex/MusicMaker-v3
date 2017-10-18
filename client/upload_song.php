<?php

$uploadOk = 1;
$target_dir = "../songs/";
$target_file = $target_dir . basename($_FILES["upload_song"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$name = pathinfo($target_file, PATHINFO_FILENAME);
$extension = pathinfo($target_file, PATHINFO_EXTENSION);
$increment = ''; 

while(file_exists($target_dir . $name . $increment . '.' . $extension)) {
    $increment++;
}

$basename = $name . $increment . '.' . $extension;
/*if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "pdf" ) {
    $uploadOk = 0;
}*/
move_uploaded_file($_FILES["upload_song"]["tmp_name"], $target_dir . $basename);

print json_encode(array("file_name" =>  $basename));

?>