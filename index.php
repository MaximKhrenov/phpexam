<?php
session_start();
require 'registr.php';
?>
<html>
<head>
    <title>Вход</title>
    </head>
<body>
    
   <form method="post" action="">
    <label for="login">Введите логин</label>
    <input name="login" id="login" type="text" required>
    <label for="pass">Введите пароль</label>
    <input name="pass" id="pass" type="password" required>
       <br>
    <input type="submit" name="vhod">
    <a href="?registr">Регистрация</a>
    </form>
</body>
</html>

<?php
if(isset($_POST['vhod']))
{
require 'login.php';
    

    
    
}

?>