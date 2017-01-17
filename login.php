<?php

require 'db.php';
    if (isset($_POST))
    {
   
        $login = $_POST['login'];
        $password = $_POST['pass'];
        $vhod = $db->query("SELECT `id` FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
        $id_user = mysqli_fetch_assoc($vhod);
        if (empty($id_user['id']))
        {

            
            echo 'Ошибка';
        }
        else
        {
            $arr = array(
				"username" => $login,
                "password" => $password
				);

            $request = json_encode($arr, true);
            file_put_contents('config.json', $request);
            $_SESSION['login'] = $login;
            header("Location:  catalog.php");
            echo json_encode($arr);
        }
    }

