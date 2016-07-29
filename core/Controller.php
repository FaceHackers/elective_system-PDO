<?PHP
class Controller {
    public function model($model) {
        require_once "core/myPDO.php";
        require_once "models/$model.php";
        return new $model ();
    }
    
    public function view($view, $data = Array()) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        //登入存session
        $config = $this->config();
        $student = Array();
        if(isset($_SESSION['loginid'])){
            $username = $_SESSION['loginid'];
        }
        $isLogin = null;
        if(isset($_SESSION['iflogin'])){ 
            $isLogin = $_SESSION['iflogin'];
        }
        require_once "views/$view.php";
    }
    
    public function config(){
        return new config();
    }
}