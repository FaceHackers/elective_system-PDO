<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>檢視選課清單</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script>
            var root = '<?= $config->root ?>';
            var imgRoot = '<?= $config->imgRoot ?>';
        </script>
        <link href="<?= $config->cssRoot ?>layout.css" rel="stylesheet" type="text/css" />
        <link href="<?= $config->cssRoot ?>menu.css" rel="stylesheet" type="text/css" />
        <link href="<?= $config->cssRoot ?>table.css" rel="stylesheet" type="text/css" />
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="<?= $config->jsRoot ?>resetCssUrl.js"></script>
        <?php
            if(isset($_SESSION['alert'])) {
               echo "<script>alert('" .$_SESSION['alert'] . "');</script>";
               unset($_SESSION['alert']);
            }
        ?> 	  
    </head>
    <body>
        <?php
        require_once 'menu.php';
        ?>
        <table class="table-fill">
            <thead>
                <tr>
                    <th class="text-left">課程編號</th>
                    <th class="text-left">課程名稱</th>
                    <th class="text-left">教師姓名</th>
                    <th class="text-left">上課地點</th>
                    <th class="text-left">學分</th>
                    <th class="text-left">選課</th>
                </tr>
            </thead>
        <tbody class="table-hover">
             <?php
            if(!empty($data)){
                foreach ($data as $row) {
             ?>
            <tr>
                <td class="text-left"><?=htmlspecialchars($row["course_id"]);?></td>
                <td class="text-left"><?=htmlspecialchars($row["course_name"]);?></td>
                <td class="text-left"><?=htmlspecialchars($row["course_name"]);?></td>
                <td class="text-left"><?=htmlspecialchars($row["course_place"]);?></td>
                <td class="text-left"><?=htmlspecialchars($row["Credit"]);?></td>
                <td class="text-left"><a href="delcourse?delid=<?=htmlspecialchars($row["course_id"]);?>" >退選</a></td>
            </tr>
            <?php }} ?>
            </tbody>
        </table>
    	
    </body>
</html>