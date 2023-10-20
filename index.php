
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./resource/layui/css/layui.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/card.css">

</head>
<body>


<div id='sideflap'>
    <div id='userpic'></div>
    <div id='userstats'>
        <div id='username'>
            Keli J. Wren
            <div id='usertags'>writes: mystery, drama, historical fiction</div>
        </div>
        <div id='userbio'>
            <div id='biotext'>
                Lorem ipsum sed dolor amet. Wentroph algor bollin bo. Fornumd illus gordoron fli innit pryon forglumery d'ton. Fredly wombo lok corne allin kaydon formulus domet; bittle frond golik.
            </div>
            <div id='biolinks'>
                <div id='linkbtn'>follow</div>
            </div>
        </div>
        <div id='usercounts'>
            <div class='count' id='books'>
                <div class='num'>7</div>
                books written
            </div>
            <div class='count' id='followers'>
                <div class='num'>441</div>
                following Keli
            </div>
            <div class='count' id='following'>
                <div class='num'>1,623</div>
                have read Keli's books
            </div>
        </div>
    </div>
</div>

<div id='navigation'>
    <a>books</a>
    <a>blog</a>
    <a>profile</a>
</div>



<div id='bookshelf'>

    <div class='book'>
        <div class='title'>Aggie's Diner</div>
        <div class='synop'>a greasy spoon mystery</div>
        <div class='details'>
            <i class="layui-icon layui-icon-eye"></i>
            23
        </div>
    </div>

    <?php
    $file_path = "./resource/bookshelf.txt";

    if(file_exists($file_path)) {

        $fp = fopen($file_path, "r");

        $str = fread($fp, filesize($file_path));//指定读取大小，这里把整个文件内容读取出来

        $json=json_decode($str);
        echo "<div class='book' onclick='window.open(\"/yuedu/chapter.php?name=" . $json->books[0]->name . "\")'>
        <div class='title'>". $json->books[0]->name ."</div>
        <div class='synop'>". $json->books[0]->remark ."</div>
        <div class='details'>
            <i class='layui-icon layui-icon-eye'></i>
            ".$json->books[0]->views."
        </div>
    </div>";

    }
    ?>

</div>


</body>
</html>