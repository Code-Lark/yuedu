
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./resource/layui/css/layui.css">
    <link rel="stylesheet" href="css/chapter.css">
    <link rel="stylesheet" href="./css/card.css">

</head>
<body class="layui-bg-gray">

<!--  头部导航栏  -->
<div class="page-header">
    <div class="container">
        <ul class="layui-nav">
            <li class="layui-nav-item layui-this"><a href="">选中</a></li>
            <li class="layui-nav-item">
                <a href="javascript:;">常规</a>
            </li>
            <li class="layui-nav-item"><a href="">导航</a></li>
            <li class="layui-nav-item">
                <a href="javascript:;">子级</a>
                <dl class="layui-nav-child">
                    <dd><a href="">菜单1</a></dd>
                    <dd><a href="">菜单2</a></dd>
                    <dd><a href="">菜单3</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item">
                <a href="javascript:;">选项</a>
                <dl class="layui-nav-child">
                    <dd><a href="">选项1</a></dd>
                    <dd class="layui-this"><a href="">选项2</a></dd>
                    <dd><a href="">选项3</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item"><a href="">演示</a></li>
        </ul>
    </div>
</div>


<!--  主内容区  -->
<div class="main">
    <div class="container">
        <ul class="left-nav">
            <li>li1</li>
            <li>li2</li>
            <li>li3</li>
            <li>li4</li>
            <li>li5</li>

        </ul>

        <div class="main-content">
            <!--     菜单       -->
            <?php
            function str_to_utf8 ($str) {
                $current_encode = mb_detect_encoding($str, array("ASCII","GB2312","GBK",'BIG5','UTF-8'));
                $encoded_str = mb_convert_encoding($str, 'UTF-8', $current_encode);
                return $encoded_str;
            }

            $bookName=$_GET['name'];
            $path="./resource/books/".$bookName.".txt";


            $cbody = file($path); //file（）函数作用是返回一行数组，txt里有三行数据，因此一行被识别为一个数组，三行被识别为三个数组
            for($i=0;$i<count($cbody);$i++){ //count函数就是获取数组的长度的，长度为3 因为一行被识别为一个数组 有三行

                echo str_to_utf8($cbody[$i]);
                echo "<br/>"; //最后是循环输出每个数组，在每个数组输出完毕后 ，输出一个换行，这样就可以达到换行效果
            }

            ?>

        </div>


    </div>
</div>

<script src="resource/layui/layui.js"></script>

</body>
</html>