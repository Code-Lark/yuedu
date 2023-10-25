<?php
require_once "./utils/jsonUtils.php";
$fileInfo = $_FILES["file"];
$fileName = $fileInfo["name"];
$filePath = $fileInfo["tmp_name"];
$name= substr($fileName, 0, strrpos($fileName, "."));

move_uploaded_file($filePath, "./resource/books/".$fileName);

$myJson=new jsonUtils("bookshelf.txt");
$myJson->addBook($name);


//echo '{"code":1,"msg":"the API!","data":{"filename":"'. $filename .'","temp":"'. $temp_name .'"}}';
//echo '{"code":1,"msg":"the API!"}';
echo '{"code":1,"msg":"ok","data":{"name":"'. $name .'","chapter": 0}}';