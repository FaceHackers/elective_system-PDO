<?php
    session_start();
    class curd {
        
        public function __construct() {
            
        }
        //確認使用者
        public function check() {
            $PDO = new myPDO();
            $conn = $PDO->getConnection();
            $stmt = $conn->prepare("SELECT * FROM `student` WHERE `student_id` = ? and `password` = ? LIMIT 1");
            $stmt->bindValue(1, $this->student_id, PDO::PARAM_STR);
            $stmt->bindValue(2, $this->password_hash, PDO::PARAM_STR);
    
            $stmt->execute();
            $data = $stmt->fetch();
           
            $PDO->closeConnection();
            if($data){
                $_SESSION["iflogin"]=1;
                $_SESSION['loginid'] = $data[0]; 
                return true;
            }else{
                return false;
            }
        }
        //讀取課程資料
        public function readclass() {
            $PDO = new myPDO();
            $conn = $PDO->getConnection();
            $stmt = $conn->prepare("SELECT * FROM `course` order by `course_id`");
            $stmt->execute();
            $data = $stmt->fetchAll();
            
            $PDO->closeConnection();
    
            return $data;
        }
        //判斷課程資料
        public function createclass() {
            $PDO = new myPDO();
            $conn = $PDO->getConnection();
            $stmt = $conn->prepare("SELECT * FROM `stu_class` WHERE `course_id` = ? LIMIT 1");
            $stmt->bindValue(1, $this->addid, PDO::PARAM_STR);
            $stmt->execute();
            $rows = $stmt->fetch(); 
            $PDO->closeConnection();
    
            return $rows;
        }
        //新增課程資料
        public function newclass (){
            $PDO = new myPDO();
            $conn = $PDO->getConnection();
            $sql = "INSERT INTO `stu_class` (`student_id`, `course_id`)  VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $this->loginid, PDO::PARAM_STR);
            $stmt->bindValue(2, $this->addid, PDO::PARAM_STR);
            
            $stmt->execute();
            $data = $stmt->fetch();
            
            $PDO->closeConnection();
            
            return $data;
        }
        //讀取選課課程資料
        public function readviewclass() {
            $PDO = new myPDO();
            $conn = $PDO->getConnection();
            $stmt = $conn->prepare("SELECT * FROM `stu_class` WHERE `student_id` = ? ");
            $stmt->bindValue(1, $this->loginid, PDO::PARAM_STR);
            $stmt->execute();
            $data = $stmt->fetchAll(); 
            $PDO->closeConnection();
    
            return $data;
        }
        //讀取課程ID
        public function readClassID($course_id){
		    $PDO = new myPDO();
            $conn = $PDO->getConnection();
            $stmt = $conn->prepare("SELECT * FROM `course` WHERE `course_id` = ? ");
            $stmt->bindValue(1, $course_id, PDO::PARAM_STR);
            $stmt->execute();
            $data = $stmt->fetch(); 
            $PDO->closeConnection();
    
            return $data;
		}
        //刪除課程資料表
		public function deletecourse() {
		    $PDO = new myPDO();
            $conn = $PDO->getConnection();
            $stmt = $conn->prepare("DELETE  FROM `stu_class` WHERE `course_id` = ? ");
            $stmt->bindValue(1, $this->delid, PDO::PARAM_STR);
            $stmt->execute();
            $data = $stmt->fetch(); 
            $PDO->closeConnection();
    
            return $data;
		    
		}
		//讀取學生基本資料
		public function readstu() {
		    $PDO = new myPDO();
            $conn = $PDO->getConnection();
            $stmt = $conn->prepare("SELECT * FROM `student` WHERE `student_id` = ? ");
            $stmt->bindValue(1, $this->loginid, PDO::PARAM_STR);
            $stmt->execute();
            $data = $stmt->fetchAll(); 
            $PDO->closeConnection();
            return $data;
		}
    }
?>