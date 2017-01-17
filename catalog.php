<?php 
session_start();
require 'db.php';
if (isset( $_GET['do'] ) == 'logout'){
	unset($_SESSION['login']);
	session_destroy();
    $status = [
    "Status" => 200,
    "Message" => "OK",
];
$jsonResult = json_encode($status);
echo $jsonResult;
}

if (!$_SESSION['login']){
	header("Location: index.php");
	exit;
}
?>
<html>
    <head>
        <title>Магазин</title>
        <script src="js/jquery-3.1.1.min.js"></script>
    </head>
    <body>
    <header>
        <?php
        if (isset($_SESSION["login"])) {
            $status = $_SESSION["login"];
            $jsonResult = json_encode($status);
            echo $jsonResult;
            } 
            else {
            echo'Не удалось войти';
            }
        ?>
        <a href="?do">Выход</a>
        
        
        
        
        
    </header>
        
        <?php
        $catalog = $db-> query("SELECT * FROM `catalog`");
        while($result = mysqli_fetch_assoc($catalog)) {
            echo '<div class="col-md-4"><a href="tovar.php?id='.$result['id'].'"><img src="kat/'.$result['img'].'"></a>
            
             <h3><a href="tovar.php?id='.$result['id'].'">
            '.$result['name'].'</a></h3>
            </div>';
        }
     
        
        ?>
        
        
        
        
        
    </body>
</html>