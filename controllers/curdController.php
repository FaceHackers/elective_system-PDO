<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once "core/Tools.php";
class curdController extends Controller {
     
     //接收使用者資料值
     function setDefaultValue($student){
        $student->student_id    = isset( $_POST["user"] ) ? $_POST["user"] : "" ;
        $student->password      = isset( $_POST["password"] ) ? $_POST["password"] : "" ;
        $student->addid         = isset( $_GET['addid'] ) ? $_GET['addid'] : "" ;
        $student->loginid       = isset( $_SESSION["loginid"] ) ? $_SESSION["loginid"] : "" ;
        $student->delid         = isset( $_GET['delid'] ) ? $_GET['delid'] : "" ;
    }
    function index() {
       $this->view("index");
    }
    //確認學生資料
    function login() {
        $student= $this->model("curd");
        $this->setDefaultValue($student);
        $student->password_hash = Tools::getPasswordHash($student->password);
            // check
            $data = $student->check();
            
            if(isset($_POST["user"])) {
            if($data){
                 header("Location: classview");
                 exit;
            }else{
                $this->view("index");
            }
        }
        $this->view("index");
    }
    //讀取選修課程清單
    function classview() {
        $session =  $this->model("curd");
        $dataa = $session->sessionDecide();
        if($dataa){
                header("Location: index");
                exit; 
            }
        $crud =  $this->model("curd");
        $data = $crud->readclass();
        $this->view("classview", $data);
    }
    //新增選修課程
    function addcourse() {
        $session =  $this->model("curd");
        $dataa = $session->sessionDecide();
        if($dataa){
                header("Location: index");
                exit; 
            }
        
        $student =  $this->model("curd");
        $this->setDefaultValue($student);
        $num = $student->createclass();
        if(isset($_GET['addid'])) {
            if($num==0) {
                $data= $student->newclass();
                echo "<script>alert('新增成功!!'); </script>";
                $this->classview();
        	}
    		else {
    		    echo "<script>alert('已有選課資料，不能重複選課!!'); </script>";
                $this->classview();
    		}
        }
        $this->classview();
    }
    //刪除選修課程
    function delcourse() {
        $session =  $this->model("curd");
        $dataa = $session->sessionDecide();
        if($dataa){
                header("Location: index");
                exit; 
            }
        $student =  $this->model("curd");
        $this->setDefaultValue($student);
        if(isset($_GET['delid']))
        {
            $data = $student->deletecourse();
            //echo "<script>alert('退選成功!!'); </script>";
            $this->readstuu();
        }
    }
    //讀取學生選修課程
    function readstuu() {
        $session =  $this->model("curd");
        $dataa = $session->sessionDecide();
        if($dataa){
                header("Location: index");
                exit; 
            }
        $student =  $this->model("curd");
        $this->setDefaultValue($student);
        $data = $student->readviewclass();
        $dataArray;
        foreach($data as $row){
            $classID = $student->readClassID($row['course_id']);
            if(count($classID) > 0){
                $dataArray[] = $classID;
            }
        }
       $this->view("viewclass", $dataArray);
    }
    //讀取學生個人資料
    function readstu() {
        $session =  $this->model("curd");
        $dataa = $session->sessionDecide();
        if($dataa){
                header("Location: index");
                exit; 
            }
        $student =  $this->model("curd");
        $this->setDefaultValue($student);
        $data = $student->readstu();
        $this->view("stu", $data);
    }
    //登出系統
    function loginout() {
        session_destroy();
        header("Location: ".$this->root."index");
        exit;
    }
}