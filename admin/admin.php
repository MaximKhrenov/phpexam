<?php 
session_start();

if (isset( $_GET['do'] ) == 'logout'){
	unset($_SESSION['admin']);
	session_destroy();
}

if (!$_SESSION['admin']){
	header("Location: auth.php");
	exit;
}
?>
<?php
require 'db.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/main.js"></script>
    <title>Админ панель</title>
</head>
<body>
    <div class="container">
        <div class="row">
        <a href="index.php">
            <div class="logo">
              
            </div>
        </a>
      
        
      
        
    <main>
        <div class="col-md-12">
           <?php
    
            echo '<div class="col-md-12"><h1 style="margin-left: 1%;padding-top: 10px;font-family:"Roboto Condensed", sans-serif">Панель администрирования</h1></div>';
            echo '<div class="col-md-12">
                    <div class="col-md-2">
                    <h3><a href="?add_tovar">Добавить товар</a></h3></div>
                    
                    <div class="col-md-2">
                    <h3><a href="?delete_tovar">Удалить товар</a></h3>
                    </div>
                    
                    <div class="col-md-2">
                    <h3><a href="?update_tovar">Изменить товар</a></h3>
                    </div>
                    
                    <div class="col-md-2">
                    <h3><a href="?add_rubrika">Добавить категорию</a></h3>
                    </div>
                    
                    <div class="col-md-2">
                    <h3><a href="?delete_rubrika">Удалить категорию</a></h3>
                    </div>
                  
                    <div class="col-md-2">
                    <h3><a href="?update_rubrika">Изменить категорию</a></h3>
                  
                    </div>
                </div></div>';
            include "add_tovar.php";
    
    
        ?>
            
        </div>
        </div>
    </main>
    <footer>
        <div class="copy">

        </div>
        <div class="info" id="info">
         
        </div>
       
    </footer>
</body>
</html>