<?php
   
    if (isset($_GET['add_tovar'])) {
        echo '<div class="dobavka">
        <form class="inn" enctype="multipart/form-data" method="POST">
        <h3>Добавление товара</h3>
        <input type="text" class="vhod" name="name" placeholder="Название" required><br>
        
        <input type="text" class="vhod" name="price" placeholder="Цена" required><br>
        <select name="category">'; 
        $category = $db->query("SELECT * FROM `catalog`");
        while($result = mysqli_fetch_assoc($category)) {
            echo '<option value="'.$result['id'].'">'.$result['name'].'</option>';
        }
        echo'</select>
        <input type="file" class="vhod" name="picture" required><br>
  <textarea name="text">Описание вместе с характеристиками</textarea><br>
  <input type="submit" class="but_vhod" name="submit_mouse" value="Добавить">
  </form></div>
  ';
        if(isset($_POST['submit_mouse'])) {
            $name = $_POST['name'];
            $text = $_POST['text'];
            $price = $_POST['price'];
            $category = $_POST['category'];
            $path = "../tovar/";
            $photo = time().$_FILES['picture']['name'];
            copy($_FILES['picture']['tmp_name'],$path.time().$_FILES['picture']['name']);
            $db->query("INSERT INTO `tovar` (`name`,`opis`,`price`,`img`,`category_id`) VALUES ('$name','$text','$price','$photo','$category')");
            
}
        }
    if(isset($_GET['delete_tovar'])) {
          echo '<div class="dobavka"><h3>Удаление товара</h3>';
        $category = $db->query("SELECT * FROM `catalog`");
        $result = mysqli_fetch_assoc($category);
        do {
                echo '<a style="margin-right: 10px;" href="?delete_tovar=1&category_id='.$result['id'].'">'.$result['name'].'</a>';
            }
            while($result = mysqli_fetch_assoc($category));
            if(isset($_GET['category_id'])) {
                $id = $_GET['category_id'];
                $tovar = $db->query("SELECT * FROM `tovar` WHERE `category_id` = '$id'");
                $tovarresult = mysqli_fetch_assoc($tovar);
                echo '<div><h3>Выберите товар, котоырй нужно удалить</h3></div>';
                do {
                    echo '<div style="margin-top:10px;"><a href="?delete_tovar=1&id='.$tovarresult['id'].'">'.$tovarresult['name'].'</a></div>';
                } while ($tovarresult = mysqli_fetch_assoc($tovar));
            }
            if(isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $concr = $db->query("SELECT * FROM `tovar` WHERE `id` = '$id'");
                    $concrresult = mysqli_fetch_assoc($concr);
                    echo '
                    <form enctype="multipart/form-data" method="POST">
                        <input type="text" name="name" value="'.$concrresult['name'].'" class="vhod"><br>
                        <input type="text" name="price" value="'.$concrresult['price'].'" class="vhod"><br>
                        <textarea>'.$concrresult['opis'].'</textarea>
                        
                        
                        
                        <br>
                        <br>
                        <input type="submit" name="delt" class="but_vhod" value="удалить"><br>
                    </form>';
                }
            echo '</div>';
        if(isset($_POST['delt'])) {
                $id = $_GET['id'];
                $db->query("DELETE FROM `tovar` WHERE `id` = '$id'");
            }
    }
       
    
    if(isset($_GET['update_tovar'])) {    
        echo '<div class="dobavka"><h3>Изменение товара</h3>';
        $category = $db->query("SELECT * FROM `catalog`");
        $result = mysqli_fetch_assoc($category);
        do {
                echo '<a style="margin-right: 10px;" href="?update_tovar=1&category_id='.$result['id'].'">'.$result['name'].'</a>';
            }
            while($result = mysqli_fetch_assoc($category));
            if(isset($_GET['category_id'])) {
                $id = $_GET['category_id'];
                $tovar = $db->query("SELECT * FROM `tovar` WHERE `category_id` = '$id'");
                $tovarresult = mysqli_fetch_assoc($tovar);
                echo '<div><h3>Выберите товар, котоырй нужно изменить</h3></div>';
                do {
                    echo '<div style="margin-top:10px;"><a href="?update_tovar=1&id='.$tovarresult['id'].'">'.$tovarresult['name'].'</a></div>';
                } while ($tovarresult = mysqli_fetch_assoc($tovar));
            }
            if(isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $concr = $db->query("SELECT * FROM `tovar` WHERE `id` = '$id'");
                    $concrresult = mysqli_fetch_assoc($concr);
                    echo '
                    <form enctype="multipart/form-data" method="POST">
                        <input type="text" name="name" value="'.$concrresult['name'].'" class="vhod"><br>
                        <input type="text" name="price" value="'.$concrresult['price'].'" class="vhod"><br>
                        
                        
                        
                        <input type="file" name="photo" class="vhod"><br>
                        <br>
                        <input type="submit" name="submit_tovar" class="but_vhod" value="Изменить"><br>
                    </form>';
                }
            echo '</div>';
        if(isset($_POST['submit_tovar'])) {
                $id = $_GET['id'];
                $name = $_POST['name'];
                $price = $_POST['price'];
                $path = "../tovar/";
            $photo = time().$_FILES['photo']['name'];
            copy($_FILES['photo']['tmp_name'],$path.time().$_FILES['photo']['name']);
                $db->query("UPDATE `tovar` SET `name` = '$name',`price` = '$price',  WHERE `id_tovar` = '$id'");
            }
    }
    if(isset($_GET['add_rubrika'] )) {
        echo '
            <div class="dobavka">
                <h3>Добавить категорию</h3>
                <form enctype="multipart/form-data" method="post">
                    <input type="text" name="name" placeholder="название" class="vhod"><br>
                    <input type="file" name="photo" class="vhod"><br>
                    <input type="submit" name="add_rbrk" value="Добавить" class="but_vhod">
                </form>
            </div>';
        if(isset($_POST['add_rbrk'])) {
            $name = $_POST['name'];
            $metatage = $_POST['metatage'];
            $path = "../kat/";
            $photo = time().$_FILES['photo']['name'];
            copy($_FILES['photo']['tmp_name'],$path.time().$_FILES['photo']['name']);
            $db->query("INSERT INTO `catalog` (`name`,`img`) VALUES('$name','$photo')");
        }
    }
    if(isset($_GET['delete_rubrika'])) {
        echo '
            <div class="dobavka"><h3>Удаление рубрики по названию</h3>
               '; 
        $category = $db->query("SELECT * FROM `catalog`");
        while($result = mysqli_fetch_assoc($category)) {
            
            echo '<div class="col-md-2"><p>'.$result['name'].'</p></div>';
        }
        echo'<form method="POST">
                <input type="text" class="vhod" name="name_rbrk" placeholder="Введите название рубрики"><input type="submit" class="but_vhod" name="delete_sbm" value="Удалить">
            </form></div>';
        
        if(isset($_POST['delete_sbm'])) {
            $tovar_delete = $_POST['name_rbrk'];
            $db->query("DELETE FROM `catalog` WHERE `name` = '$tovar_delete'");
            echo '<h4 style="margin-left:20px;">Рубрика успешно удалена</h4>';
        
        }
    }
    if(isset($_GET['update_rubrika'])) {
            echo '<div class="dobavka"><h3>Изменение категории</h3>';
            $category = $db->query("SELECT * FROM `catalog`");
            $result = mysqli_fetch_assoc($category);
            do {
                echo '<a style="margin-right: 10px;" href="?update_rubrika=1&category_id='.$result['id'].'">'.$result['name'].'</a>';
            }
            while($result = mysqli_fetch_assoc($category));
            if(isset($_GET['category_id'])) {
                $id = $_GET['category_id'];
                $cat = $db->query("SELECT * FROM `catalog` WHERE `id` = '$id'");
                $catresult = mysqli_fetch_assoc($cat);
                echo '
                    <form enctype="multipart/form-data" method="POST">
                        <input type="text" name="name" value="'.$catresult['name'].'" class="vhod"><br>
                        
                        <input type="file" name="photo" class="vhod"><br>
                        <input type="submit" name="submit_cat" class="but_vhod" value="Изменить"><br>
                    </form>';
            }
            echo '</div>';
            if(isset($_POST['submit_cat'])) {
                $name = $_POST['name'];
                $path = "../kat/";
            $photo = time().$_FILES['photo']['name'];
            copy($_FILES['photo']['tmp_name'],$path.time().$_FILES['photo']['name']);
                $db->query("UPDATE `catalog` SET `name` = '$name' WHERE `id` = '$id'");
            }
    }
   
  
?>