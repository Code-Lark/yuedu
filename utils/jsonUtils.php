<?php
header("Content-type: text/html; charset=utf-8");

//json 读写工具类
class jsonUtils{

    /**
     * @var string 资源文件路径、文件名
     */
    var $filePath='';


    /**
     * @var array 书籍列表，存储书籍信息
     */
    var $bookLists=[];

    var $jsonData=[];

    /**
     * @return void 添加书籍
     */
    public function addBook($name,$remark=''){
        $obj=array();
        $obj['name']=$name;
        $obj['remark']=$remark;
        $obj['chapter']=0;

        array_push($this->bookLists,$obj);
//        echo "<br>path:".$this->filePath;

        $this->jsonData['books']=$this->bookLists;

        $json_string=json_encode($this->jsonData,JSON_UNESCAPED_UNICODE);
        $myfile = fopen($this->filePath, 'wb') or die("Unable to open file!");
//        fwrite($myfile,$json_string);
        fputs($myfile, $json_string);
        fclose($myfile);

    }

    /**
     * @param string $filePath 文件路径
     */
    public function __construct($filePath)
    {
        $this->filePath =$_SERVER['DOCUMENT_ROOT'].'/resource/' . $filePath;

        if (file_exists($this->filePath)){
            $fp=fopen($this->filePath,'r');
            $str=fread($fp,filesize($this->filePath));
            $jsonData=json_decode($str,true);
//            print_r($jsonData);
            $this->bookLists=$jsonData['books'];
            $this->jsonData=$jsonData;
        }
    }

    /**
     * @return string
     */
    public function getFilePath()
    {
        return $this->filePath;
    }

    /**
     * @param string $filePath
     */
    public function setFilePath($filePath)
    {
        $this->filePath = $filePath;
    }

    /**
     * @return array
     */
    public function getBookLists()
    {
        return $this->bookLists;
    }

    /**
     * @param array $bookLists
     */
    public function setBookLists($bookLists)
    {
        $this->bookLists = $bookLists;
    }

    /**
     * @return array
     */
    public function getJsonData()
    {
        return $this->jsonData;
    }

    /**
     * @param array $jsonData
     */
    public function setJsonData($jsonData)
    {
        $this->jsonData = $jsonData;
    }


}

?>