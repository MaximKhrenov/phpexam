<?php

session_start();
        $admin = 'admin';
        $pass = '395a8f6a4ea21cb38243e0b7e529d9db';
?>
<!Doctype htmL>
<html>
    <head>
        <title>админ панель</title>
        
        <link rel="stylesheet" src="..css/bootstrap.css">
                <link rel="stylesheet" src="../css/style.css">
    </head>
    <body>
        
        <main id="auth">
            <div class="container">
            <div class="row">
            <div class="col-md-12">
            <form class="auth" action="" method="post">
                <label for="name">Введите имя</label><br>
                <input type="text" name="name" placeholder="Введите логин"><br>
                <label for="pass">Введите пароль</label><br>
                <input type="password" name="pass" plaсeholder="Введите пароль"><br>
                <input type="submit" name="add">
                
            </form>
                </div>
                </div>
            </div>
        </main>
        <?php
        
        if(isset($_POST['add'])){

                if($admin == $_POST['name'] AND $pass == md5($_POST['pass'])){

                $_SESSION['admin'] = $admin;

                header("Location: admin.php");

                    exit;

                }else 
                echo '<p>Логин или пароль неверны!</p>';
                }
        
        
        ?>
        
       

    </body>
</html>