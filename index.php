
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

    <script src="./resource/layui/layui.js"></script>

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
        <div class="layui-upload-drag" style="display: block;" id="ID-upload-demo-drag">
            <i class="layui-icon layui-icon-upload"></i>
            <div>点击上传，或将文件拖拽到此处</div>
            <div class="layui-hide" id="ID-upload-demo-preview">
                <hr> <img src="" alt="上传成功后渲染" style="max-width: 100%">
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

//        TODO 添加书籍
        for ($i = 0; $i < count($json->books); $i++) {
            echo "<div class='book' onclick='window.open(\"/yuedu/chapter.php?name=" . $json->books[$i]->name . "\")'>
                        <div class='title'>". $json->books[$i]->name ."</div>
                        <div class='synop'>". $json->books[$i]->remark ."</div>
                        <div class='details'>
                            <i class='layui-icon layui-icon-eye'></i>
                            ".$json->books[$i]->chapter."
                        </div>
                  </div>";
        }



    }
    ?>

</div>

<script>
    layui.use(function(){
        var upload = layui.upload;
        var $ = layui.$;
        // 渲染
        upload.render({
            elem: '#ID-upload-demo-drag',
            accept: 'file',
            dataType: 'json',
            url: '/yuedu/upload.php', // 实际使用时改成您自己的上传接口即可。
            done: function(res){
                layer.msg('上传成功');
                // $('#ID-upload-demo-preview').removeClass('layui-hide')
                //     .find('img').attr('src', res.files.file);
                console.log(res)
                console.log("okkk")
                var data=res['data'];
                console.log(data['name'])
                var tab=document.querySelector('#bookshelf');
                var div = "<div class='book' onclick='window.open(\"/yuedu/chapter.php?name="+data['name']+"\")'> " +
                "<div class='title'>"+data['name']+"</div> " +
                "<div class='synop'>"+data['remark']+"</div> " +
                "<div class='details'> " +
                "<i class='layui-icon layui-icon-eye'></i>" +
                data['chapter'] +
                "</div>" +
                "</div>";
                //字符串类型
                tab.insertAdjacentHTML('beforeend',div);	//插入元素内部的最后一个子节点之后

            }
        });
    });
</script>
</body>
</html>