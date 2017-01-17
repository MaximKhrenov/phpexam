<?php
require 'config.php';
require 'db.php';
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Товар</title>
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <meta charset="utf-8">
                <link rel="stylesheet" src="css/bootstrap.css">
                  <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/jquery-3.1.1.min.js"></script>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/jquery-ui.css">

        <!-- Google Font -->
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>


    </head>
    <body>
         <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="logo">
                        <a href="#"><img src="img/logo.png"></a>
                    </div>
                    <div class="navigation">
                         <nav>
                            <ul class="custom-list list-inline">
                                <li><a href="index.php">Главная</a></li>
                                <li><a href="catalog.php">Каталог</a></li>
                                <li><a href="about.html">Наша команда</a></li>
                                <li><a href="portfolio.html">Портфолио</a></li>
                                <li><a href="contacts.php">Контакты</a></li>
                                <li class="corz"><a href="basket.php"><img src="img/corz.png"></a></li>

                            </ul>
                        </nav>

                    </div>
                </div>
            </div>
        </div>
    </header>
        
            <main class="kart_tovar">
                <div class="container">
                <div class="row">
                 <?php
                    $id = $_GET['id'];
                
                    $product = $db->query("SELECT * FROM `tovar` WHERE `id` = '$id'");
                    $res = mysqli_fetch_assoc($product);
                   
                    do{
                        echo '
                   
                        <div class="col-md-9"><div class="col-md-12 namekart"><img src="tovar/'.$res['img'].'"><hr></div>
                        
                        <div class="col-md-9"><div class="col-md-12 namekart">'.$res['name'].'<hr></div>
                        <div class="col-md-12 pricekart">Цена:<span id="price" name="ppp">'.$res['price'].'руб.</span><br><br></div>
                        <div class="col-md-12">
                                <p> Время съемки (часы):</p> <br> 
<span class="hour_minus confi">-</span> 
 <input type="text" id="hour" name="hour" class="hour" value="1" style="width:60px; user-select:none; text-align:center;" readonly required/>
<span class="hour_plus confi">+</span></p>
                <p class="kach">Качество съемки : <br><span class="full">FullHd</span>
                <br><span class="2k">2K</span>
                <br><span class="4k">4K</span>
                        </div>
                        <div class="col-md-12 opiskart">Описание:<hr></div>
                        <div class="col-md-12 opistext">'.$res['opis'].'</div>
                        <div class="col-md-12 knopki"> 
                        <div class="col-md-6"> 
                         <button  class="buy" '.$res['id'].'>Купить</button>
                         </div>
                         <div class="col-md-6"> 
                                    <button class="add_basket" id="addCart'.$res['id'].'">В корзину</button>
                                    </div>
                                    </div>
                                    
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
                                $(".successadd").fadeOut(2000);
                                delay(3000);

                            }


                        })
                    })
                });
            </script>
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    </div></div>';
                        
                    }
                    while($res = mysqli_fetch_assoc($product))

            
                ?>
                <div id="box" class="col-md-12  oplata" style="display: none;">
                    <form  id="formMain" method="post" action="">
                      
               
  </div>
</div>

                 </form></div>
             
                    
                   
           
            
            </div>
                    
        </div>
                 <div class="successadd" style="display:none;"><p>Товар успешно добавлен в корзину!</p></div>
        </main>
                    

                    
                    
                    
                    

        <script src="js/raschet.js"></script> 
<script src="js/raschet1.js"></script>
        <script src="js/js.js"></script>
            <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
            <script src="js/jquery-3.1.1.min.js"></script>
            <script src="js/jquery.cookie.js"></script>
    </body>
</html>