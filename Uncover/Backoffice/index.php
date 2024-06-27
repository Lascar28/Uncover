<?php
$page = $_GET['page'];
$pages = scandir("pages");
if(!empty($page) && in_array($_GET['page']. ".php", $pages)){

    $content = 'pages/'.$_GET['page']. ".php";

}else{
    header("Location:index.php?page=connexion");
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="...">
    <title>Uncover</title>
    <link rel="stylesheet" href="css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
   <div class="content">
        <?php
        include($content);
        ?>
   </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>