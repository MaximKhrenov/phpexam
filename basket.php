<?php
    require 'config.php';
  require 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Корзина</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/owl.carousel.css">
  <link rel="stylesheet" href="css/jquery-ui.css">

  <!-- Google Font -->
    <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/owl.carousel.css">
  <link rel="stylesheet" href="css/jquery-ui.css">

  <!-- Google Font -->
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

  <script src="js/jquery-3.1.1.min.js"></script>
  <link href="fonts/proxima/proxima.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

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
<main class="basket">
    <div class="container">
                        <div class="row">
  <?php
  if (isset($_GET['delete'])&& $_GET['delete'] == 'all'){
    session_unset();
    session_destroy();
  } 
   if (isset($_GET['oplata'])&& $_GET['oplata'] == 'opl'){
    session_unset();
    session_destroy();
  }
  if(!isset($_SESSION['cart'])) {
    echo 'Корзина пуста';
    $_SESSION['cart'] = array();
  }
  else {
    echo '
          <div class="col-md-12 basket">
           <table>
                <thead>
                    <tr>
                       
                        <td>Название</td>
                        <td>Цена</td>
                        <td>Колличесиво</td>
                        <td>Сумма</td>
                    </tr>
                </thead>';
    foreach ($_SESSION['cart'] as $key => $value) {
      $tovar = $db->query("SELECT * FROM `tovar` WHERE `id` = '$value'");
      while ($res = mysqli_fetch_assoc($tovar)) {

        echo '<tbody>
                   <tr>
                        <td><div class="col-md-2"></div>' . $res['name'] . '</td>
                        <td>' . $res['price'] . '<br> </td>
                        <td><input type="text" class="colvo" value="1"><br></td>
                        <td class="summa">' . $res['price'] . '<br></td>
                        <td>
                          <a href="?delete=' . $res['id'] . '">Удалить</a>
                        </td>
                    </tr>
                </tbody>
                
                ';
        if (isset($_GET['delete'])) {
          $delete = $_GET['delete'];
          if ($delete == $value) {
            unset($_SESSION['cart'][$key]);
          }
        }
      }
    }
    echo '</table>
    
                <a class="delete" href="?delete=all">Очистить Корзину</a>
                <a href="?oplata=opl"  class="oform_but" value="Оформить заказ" id="add">Оформить заказ</a>
                
                ';
  }
  ?>
  
                            
                            
                            
                            
                         <div id="box" class="col-md-12  oplata1" style="display: none;">
                   
                    
                        <?php

                
                   foreach ($_SESSION['cart'] as $key => $value) {
      $tovar = $db->query("SELECT * FROM `tovar` WHERE `id` = '$value'");
      while ($res = mysqli_fetch_assoc($tovar)) {

        $_SESSION['count'] = $i;
        $i++;
                   
                 
                        echo '
                        <form id="formMain" method="post" action="">
                        <h3>Услуга:</h3> <input type="text" value="'.$res['name'].'" name="name" >
                        <h3>К оплате:<h3> <input name="price" type="text" value="'.$res['price'].' Рублей" >
                        
                        
                    
                        
                        
                   ';
                         
      }}
             ?>
                        <input type="text" name="fio" placeholder="Введите фамилию" required="required"  ><br>
                       
                        <input type="text" name="phone" placeholder="Введите телефон" required="required"> <br>
                        <input type="text" name="mail" placeholder="Введите E-mail" required="required"><br>
                         <input type="submit" name="opl" onclick="AjaxFormRequest('messegeResult', 'formMain', 'form.php')"><br>
                        
                             </form>
        </div>
    
        </div>
                             
              
                            
                             
                             
                            

<?php
                             
if($_POST)
    {
    $to = "khrenoffmaxim@yandex.ru"; //куда отправлять письмо
    $from =    ''; // от кого
    $subject = ""; //тема
    $message = 'Product: '.$_POST['name'].'; Price: '.$_POST['price'].'; FIO: '.$_POST['fio'].'; PHONE: '.$_POST['phone'].'; Mail: '.$_POST['mail'].'';
    $headers = "Content-type: text/html; charset=UTF-8 \r\n";
    $headers .= "From:";
    $result = mail('khrenoffmaxim@yandex.ru', $subject, $message, $headers);
 
    if ($result){
        echo "<h2>Ваш заказ принят. Спасибо, что вы с нами!</h2>";
    }
    }
?>
                            </div>
        </div> 
    </div>
</main>
    
<script>
 function AjaxFormRequest(result_id,formMain,url) {
 jQuery.ajax({
 url: url,
 type: "POST",
 dataType: "html",
 data: jQuery("#"+formMain).serialize(),
 success: function(response) {
 document.getElementById(result_id).innerHTML = response;
 },
 error: function(response) {
 document.getElementById(result_id).innerHTML = "
 
Возникла ошибка при отправке формы. Попробуйте еще раз
 
";
 }
 });
 
 $(':input','#formMain')
 .not(':button, :submit, :reset, :hidden')
 .val('')
 .removeAttr('checked')
 .removeAttr('selected');
 }
</script>
<!--  Scripts-->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/jquery.scrolly.min.js"></script>
<script src="js/jquery.cookie.js"></script>
<script src="js/kor.js"></script>

</body>
</html>