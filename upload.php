<?php
$fileInfo = $_FILES["file"];
$fileName = $fileInfo["name"];
$filePath = $fileInfo["tmp_name"];

move_uploaded_file($filePath, "./resource/books/".$fileName);





//echo '{"code":1,"msg":"the API!","data":{"filename":"'. $filename .'","temp":"'. $temp_name .'"}}';
//echo '{"code":1,"msg":"the API!"}';
echo '{"code":1,"msg":"ok"}';