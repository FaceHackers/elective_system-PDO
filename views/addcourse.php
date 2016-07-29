<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>後台選課系統</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script>
            var root = '<?= $config->root ?>';
            var imgRoot = '<?= $config->imgRoot ?>';
        </script>
        <link rel="shortcut icon" href="http://static.tmimgcdn.com/img/favicon.ico">
        <link rel="icon" href="http://static.tmimgcdn.com/img/favicon.ico">
        <link rel="stylesheet" type="text/css" media="all" href="<?= $config->cssRoot ?>form.css">
        <link rel="stylesheet" type="text/css" media="all" href="<?= $config->cssRoot ?>switchery.min.css">
         <script type="text/javascript" src="<?= $config->jsRoot ?>switchery.min.js"></script>
        <link href="<?= $config->cssRoot ?>layout.css" rel="stylesheet" type="text/css" />
        <link href="<?= $config->cssRoot ?>menu2.css" rel="stylesheet" type="text/css" />
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
       <script src="<?= $config->jsRoot ?>resetCssUrl.js"></script>
        
       
        <script language="javascript" type="text/javascript">
        function my_key_down(e){
            var key;
            //console.warn(e.keyCode);
            //console.warn(e.which);
            if(window.event) {
                key = e.keyCode;
            }else if(e.which) {
                key = e.which;
            } else {
                return true;
            }
            //console.log(key);
            if( (key>=48 && key<=57)
                || (key>=96 && key<=105) //數字鍵盤
                || 8==key || 46==key || 37==key || 39==key //8:backspace 46:delete 37:左 39:右 (倒退鍵、刪除鍵、左、右鍵也允許作用)
                ){
                return true;
            }else{
                return false;
            }
        }
        //console.log(String.fromCharCode(229));
        //console.log(String.fromCharCode(0));
</script>
    </head>
    <body>
    <?php
        require_once 'meun2.php';
    ?>
     <div id="wrapper">
  
  <h1>新增課程</h1>
  
  <form method="post" id="CodeForm" name="form" action="addcourse">
  <div class="col-2">
    <label>
     課程編號
      <input type="number" min="1" max="9999999999" placeholder=" 例046021、046022" id="course_id" name="course_id"  tabindex="1" autofocus = "autofocus" autocomplete="off" required>
    </label>
  </div>
  <div class="col-2">
    <label>
     課程名稱
      <input placeholder="course_name" id="course_name" name="course_name" tabindex="2" maxlength="20" autofocus = "autofocus" autocomplete="off" required>
    </label>
  </div>
  
  <div class="col-3">
    <label>
     教師姓名
      <input placeholder="teacher_name" id="teacher_name" name="teacher_name" tabindex="3" maxlength="20" autofocus = "autofocus" autocomplete="off" required>
    </label>
  </div>
  <div class="col-3">
    <label>
      上課地點
      <input placeholder="例電1、電3" id="course_place" name="course_place" tabindex="4" maxlength="15" autofocus = "autofocus" autocomplete="off" required>
    </label>
  </div>
  
  
  <div class="col-4">
    <label>
     學分
      <input type="number" min="1" max="10"  placeholder="Credit" id="Credit" name="Credit" tabindex="6" autofocus = "autofocus" autocomplete="off" maxlength="5" required onkeyup="this.value=this.value.replace(/[^\d]/g,'')" onkeydown="this.value=this.value.replace(/[^\d]/g,'')" onkeypress="return my_key_down(event)">
    </label>
  </div>
<div class="col-submit">
    <button class="submitbtn" id="SendBtn" name="insert">確定新增</button>
  </div>
  
  </form>
  </div>    
   <script type="text/javascript">
    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

    elems.forEach(function(html) {
    var switchery = new Switchery(html);
    });
</script> 
    	
</body>
</html>