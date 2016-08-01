<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>個人基本資料表</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script>
            var root = '<?= $config->root ?>';
            var imgRoot = '<?= $config->imgRoot ?>';
        </script>
        <link href="<?= $config->cssRoot ?>layout.css" rel="stylesheet" type="text/css" />
        <link href="<?= $config->cssRoot ?>/menu.css" rel="stylesheet" type="text/css" />
        <link href="<?= $config->cssRoot ?>table.css" rel="stylesheet" type="text/css" />
        
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="<?= $config->jsRoot ?>resetCssUrl.js"></script>
    </head>
    <body>
    <?php
        require_once 'menu.php';
    ?>
     <table class="table-fill">
        
            <thead>
                <tr>
                    <th class="text-left">學號</th>
                    
                    <th class="text-left">姓名</th>
                    <th class="text-left">科系</th>
                    <th class="text-left">性別</th>
                    <th class="text-left">班級</th>
                </tr>
            </thead>
        <tbody class="table-hover">
            <?php
                foreach ($data as $row) {
            ?>
            <tr>
                <td class="text-left"><?=htmlspecialchars($row["student_id"]);?></td>
                <td class="text-left"><?=htmlspecialchars($row["student_name"]);?></td>
                <td class="text-left"><?=htmlspecialchars($row["Dept"]);?></td>
                <td class="text-left"><?=htmlspecialchars($row["sex"]);?></td>
                <td class="text-left"><?=htmlspecialchars($row["class"]);?></td>
            </tr>
           <?php } ?>
        </tbody>
    </table>
    </body>
</html>