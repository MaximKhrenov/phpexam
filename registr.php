<?php 
if(isset($_GET['registr'])==1){
    echo'
        <form method="post" action="">
        <input name="login" type="text">
        <input name="pass" type="password">
        <input name="name" type="password">
        <input name="lastname" type="password">
        <input name="mail" type="password">
        <input name="add" type="submit">
        </form>
    ';

if(isset($_POST['add'])){
   $login =  $_POST['login'];
   $pass = $_POST['pass'];
  $name = $_POST['name'];
   $last = $_POST['lastname'];
  $mail = $_POST['mail'];
    $reg = $db -> query("INSERT INTO `users` (`login`,`password`,`name`,`lastname`,`mail`) VALUES ('$login','$pass','$name','$last,'$mail')");    
        
}
}
