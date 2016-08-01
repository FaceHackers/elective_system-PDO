<?PHP
class Config {
    
    public $projectName;
    public $root;
    public $imgRoot;
    public $cssRoot;
    public $jsRoot;
    
    public $db;
    
    //public $whiteList;
    
    function __construct(){
         /* 專案名稱 - <title> */
        $this->projectName = '選課系統';
        
        /* 專案目錄結構設定 */
        $this->root = '/elective_system-PDO/';
        $this->imgRoot  = $this->root . 'views/images/';
        $this->cssRoot  = $this->root . 'views/css/';
        $this->scssRoot = $this->root . 'views/scss/';
        $this->jsRoot   = $this->root . 'views/js/';
        
        /* 資料庫連線設定 */
        $this->db['host']       = 'localhost';
        $this->db['port']       = '3306';
        $this->db['username']   = 'root';
        $this->db['password']   = '1221';
        $this->db['dbname']     = 'elective_system';
        
        
        /* 不需要經過 是否登入狀態 的 action */
        $this->whiteList = array(  "curd/index",
                                    // "player/isAccountExsist", 
                                    // "player/isNicknameExsist",
                                    // "player/forgetPassword",
                                    // "player/login",
                                    // "player/registe" 
                                );
    }
}
