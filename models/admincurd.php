  <?php
    session_start();
    echo "<meta charset='utf-8'>";
    class admincurd {
        public function __construct() {
            
        }
        //確認使用者
        public function check() {
            $PDO = new myPDO();
            $conn = $PDO->getConnection();
            $stmt = $conn->prepare("SELECT * FROM `teacher` WHERE `teacher_id` = ? and `password` = ? LIMIT 1");
            $stmt->bindValue(1, $this->admin, PDO::PARAM_STR);
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
        public function checkclassid() {
		    $PDO = new myPDO();
            $conn = $PDO->getConnection();
            $stmt = $conn->prepare("SELECT * FROM `course` WHERE `course_id` = ? LIMIT 1");
            $stmt->bindValue(1, $this->course_id, PDO::PARAM_STR);
            $stmt->execute();
            $rows = $stmt->fetch(); 
            $PDO->closeConnection();
            //return $rows;
            if($rows > 0) {
                $_SESSION['alert'] = "課程代號重複";
                return true;
            }
        }
        //新增課程資料
        public function addcourse() {
            $PDO = new myPDO();
            $conn = $PDO->getConnection();
            $sql = "INSERT INTO `course` (`course_id`,`course_name`,`teacher_name`,`course_place`,`Credit`) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $this->course_id);
            $stmt->bindValue(2, $this->course_name);
            $stmt->bindValue(3, $this->teacher_name);
            $stmt->bindValue(4, $this->course_place);
            $stmt->bindValue(5, $this->Credit);
            $data = $stmt->execute();
            $PDO->closeConnection();
            return $data;
            
        }
        //修改課程
        public function update()
         {
            $PDO = new myPDO();
            $conn = $PDO->getConnection();
            $sql = "UPDATE `course` SET `course_name` = ?, `teacher_name` = ?, `course_place` = ?, `Credit` = ? WHERE `course_id` = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $this->course_name, PDO::PARAM_STR);
            $stmt->bindValue(2, $this->teacher_name, PDO::PARAM_STR);
            $stmt->bindValue(3, $this->course_place, PDO::PARAM_STR);
            $stmt->bindValue(4, $this->Credit, PDO::PARAM_STR);
            $stmt->bindValue(5, $this->course_id, PDO::PARAM_STR);
            $data = $stmt->execute();
            $PDO->closeConnection();
            return $data;
         }
        //判斷學生資料
        public function checkstu() {
		    $PDO = new myPDO();
            $conn = $PDO->getConnection();
            $stmt = $conn->prepare("SELECT * FROM `student` WHERE `student_id` = ? LIMIT 1");
            $stmt->bindValue(1, $this->student_id, PDO::PARAM_STR);
            $stmt->execute();
            $rows = $stmt->fetch(); 
            $PDO->closeConnection();
            //return $rows;
             if($rows > 0) {
                $_SESSION['alert'] = "學號重複";
                return true;
            }
        }
        //新增學生資料
        public function addstu (){
            $PDO = new myPDO();
            $conn = $PDO->getConnection();
            $sql = "INSERT INTO `student` (`student_id`,`student_name`,`Dept`,`sex`,`class`,`password`) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $this->student_id, PDO::PARAM_STR);
            $stmt->bindValue(2, $this->student_name, PDO::PARAM_STR);
            $stmt->bindValue(3, $this->Dept, PDO::PARAM_STR);
            $stmt->bindValue(4, $this->sex, PDO::PARAM_STR);
            $stmt->bindValue(5, $this->classs, PDO::PARAM_STR);
            $stmt->bindValue(6, $this->password_hash);
            $data = $stmt->execute();
            $PDO->closeConnection();
            //return $data;
             if($data){
                 $_SESSION['alert'] = "新增成功";
                return true;
            }
        }
        //讀取學生資料
        public function readstu() {
            $PDO = new myPDO();
            $conn = $PDO->getConnection();
            $stmt = $conn->prepare("SELECT * FROM `student` order by `student_id`");
            $stmt->execute();
            $data = $stmt->fetchAll();
            $PDO->closeConnection();
            return $data;
        }
        //讀取修改資料
        public function readid() {
            $PDO = new myPDO();
            $conn = $PDO->getConnection();
            $stmt = $conn->prepare("SELECT * FROM `course` WHERE `course_id` = ? LIMIT 1");
            $stmt->bindValue(1, $this->edt_id, PDO::PARAM_STR);
            $stmt->execute();
            $data = $stmt->fetch();
            $PDO->closeConnection();
            return $data;
        }
        public function sessionDecide() {
		   if($_SESSION["iflogin"]==0){
                return true;
	       }else{
	            return false;
	       }
		}
    }