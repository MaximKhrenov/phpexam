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
    // Показываем, что пользователь аутентифицирован
       $status = $_SESSION["login"];
            $jsonResult = json_encode($status);
            echo $jsonResult;
        } 
        else {
    // Выводим ошибку
    $error = [
        "Status" => 401,
        "Message" => "Unauthorized",
    ];
    $jsonError = json_encode($error);
    echo $jsonError;
        }
        ?>
        <a href="?do">Выход</a>
        
        
        
        
        
    </header>
        
        <?php
        
        require'config.php';
        $id = $_GET['id'];
         $tovar = $db-> query("SELECT * FROM `tovar` WHERE `category_id` = '$id'");
        $category = $db ->query("SELECT * FROM `catalog` WHERE `id` = '$id'");
        
        $cat = mysqli_fetch_assoc($category);

                    echo '<h2 class="category">'.$cat['name'].'</h2>';
        
        while( $res = mysqli_fetch_assoc($tovar))
         {
             
             
                    echo '
                   
       <div class="name">
                <img src="tovar/'.$res['img'].'">
            </div>
        <a href="karta_tovara.php?id='.$res['id'].'">
            <div class="name">
                '.$res['name'].'
            </div>
        </a>
        <div class="price">Стоимость: 
            '.$res['price'].'руб.
        </div>                
        <button class="add_basket" id="addCart'.$res['id'].'">В корзину</button>
        
                     
              <script>
                $(document).ready(function(){
                    $("#addCart'.$res['id'].'").bind("click", function(){
                        $.ajax({
                            url: "config.php",
                            type:"GET",
                            data:({add_tovar: '.$res['id'].'}),
                            dataType :"html",
                            success: function (data){
                                $(".successadd").show();
                                $(".successadd").fadeOut(3000);
                                delay(3000);

                            }


                        })
                    })
                });
            </script>
         
        
        
        
        
        
        ';
            $request = json_encode($res, true);
            file_put_contents('tovar.json', $request);
    
    }
            


        
        ?>
        <h1 class="successadd" style="display:none;">Товар добавлен в корзину</h1>
        
        
        
        
    </body>
</html>