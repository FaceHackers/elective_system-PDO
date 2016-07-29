<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once "core/Tools.php";
class adminController extends Controller {
    //接收使用者資料
    function setDefaultValue($admin){
        $admin->admin = isset( $_POST["pwd1"] ) ? $_POST["pwd1"] : "" ;
        $admin->password = isset( $_POST["pwd2"] ) ? $_POST["pwd2"] : "" ;
        $admin->course_id = isset( $_POST['course_id'] ) ? $_POST["course_id"] : "" ;
        $admin->course_name = isset( $_POST['course_name'] ) ? $_POST["course_name"] : "" ;
        $admin->teacher_name = isset( $_POST["teacher_name"] ) ? $_POST["teacher_name"] : "" ;
        $admin->course_place = isset( $_POST["course_place"] ) ? $_POST["course_place"] : "" ;
        $admin->Credit = isset( $_POST["Credit"] ) ? $_POST["Credit"] : "" ;
        $admin->edt_id = isset( $_GET["edt_id"] ) ? $_GET["edt_id"] : "" ;
    }
    function setstutValue($student){
        $student->student_id = isset( $_POST["student_id"] ) ? $_POST["student_id"] : "" ;
        $student->student_name = isset( $_POST["student_name"] ) ? $_POST["student_name"] : "" ;
        $student->Dept = isset( $_POST['Dept'] ) ? $_POST["Dept"] : "" ;
        $student->sex = isset( $_POST["sex"] ) ? $_POST["sex"] : "" ;
        $student->classs = isset( $_POST["class"] ) ? $_POST["class"] : "" ;
        $student->password = isset( $_POST["password"] ) ? $_POST["password"] : "" ;
    }
   
    //確認管理者資料
    function admin() {
        $admin= $this->model("admincurd");
        $this->setDefaultValue($admin);
        $admin->password_hash = Tools::getPasswordHash($admin->password);
       
        $data = $admin->check();
        if(isset($_POST["pwd1"])) {
            if($data){
                $this->readcourse();
                exit;
            }else{
                $this->view("admin");
            }
        }
    
        $this->view("admin");
        
    }
    //讀取課程清單
    function readcourse() {
        $crud =  $this->model("admincurd");
        $data = $crud->readclass();
        $this->view("adminclass", $data);
        
    }
    //修改課程資料
    function update() {
        
        $admin =  $this->model("admincurd");
        $this->setDefaultValue($admin);
        
        $data= $admin->update();
        echo "<script>alert('修改成功!!'); </script>";
        $this->readcourse();     

    
    }
    //讀取課程ID
    function readmodify() {
        
        $admin =  $this->model("admincurd");
        $this->setDefaultValue($admin);
       
        $data = $admin->readid();
        $this->view("editcourse", $data);
    }
    //新增課程
    function addcourse() {
        $admin =  $this->model("admincurd");
        $this->setDefaultValue($admin);
        $num = $admin->checkclassid();
        if(isset($_POST['course_id'])) {
            if($num==0) {
                $data= $admin->addcourse();
                echo "<script>alert('新增成功!!'); </script>";
                $this->readcourse();
                exit;
        	}
    		else {
    		    echo "<script>alert('課程代號重複!!'); </script>";
                $this->view("addcourse");
    		}
        }
        
       
       
      $this->view("addcourse");
        
    }
    //讀取學生資料
    function adminstu() {
        
        $crud =  $this->model("admincurd");
        $data = $crud->readstu();
        $this->view("adminstu", $data);
       
    }
    //新增學生資料
    function addstu() {
        $student =  $this->model("admincurd");
        $this->setstutValue($student);
        $student->password_hash = Tools::getPasswordHash($student->password);
        $num = $student->checkstu();
        
        if(isset($_POST['student_id'])) {
            if($num==0) {
                $data= $student->addstu();
                echo "<script>alert('新增成功!!'); </script>";
                $this->adminstu();
                exit;
        	}
    		else {
    		    echo "<script>alert('課程代號重複!!'); </script>";
                $this->view("addstu");
    		}
        }
        $this->view("addstu");
        
    }
    //登出系統
    function loginout2() {
        //$_SEESION["iflogin"]=0;
        session_destroy();
        header("Location: ".$this->root."admin");
        exit;
    }
}