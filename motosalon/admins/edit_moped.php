<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
require_once ("param.php");
if(isset($_GET['id']) && !empty ($_GET['id'])) {
    $query = "select name , id ,probeg,id_marka,price,har,photo,dv from moped where id=" . $_GET['id'];
    $result = mysqli_query($dbc, $query) or die ("error zapros");
    $next = mysqli_fetch_array($result);
    $photo=$next['photo'];
    if( empty ($photo)){
        $photo = "noy.jpg";
    }
    ?>
    <h1> редактирование мото</h1>
    <form action="edit_moped.php" method="post" enctype="multipart/form-data">
        <label> измените фото  </label><br>
        <img src="../images/<?=$photo?>" width="100px"><br>
        <input type="hidden" name="old_photo" value='<?=$photo?>'>
        <input type="file" name="new_photo" ><br>


        <label>Отредактируйте название модели</label><br>
        <input type="text" name="name" value='<?= $next['name'] ?>'><br>
        <label>отредактируйте цену</label><br>
        <input type="hidden" name="id" value='<?= $next['id'] ?>'><br>
        <input type="text" name="price" value='<?= $next['price'] ?>'><br>
        <label> отредактируйте характеристику</label><br>
        <textarea name="har"><?= $next['har'] ?></textarea><br>
        <label> отредактируйте дату</label><br>
        <input type="date" name="dv" value='<?= $next['dv'] ?>'><br>
        <label>измините категорию </label><br>
        <select name="id_marka">
            <?php
            $querym="select id,name from marka ";
            $resultm=mysqli_query($dbc,$querym) or die ("error zapros");
            while ($nextm=mysqli_fetch_array($resultm)){
                if($next['id_marka']==$nextm['id']){// если с таблицы мопед поле айди марка совпадает с айди из таблицы марка то в данного товара сейчас установленно текущая марка
                    echo "<option value='".$nextm['id']."' selected>".$nextm['name']."</option>";
                    //оптион это елемент списка который показывает название категории но передает айди выбранной категории
                    // параметер селектед делает данную категорию активной тоисть показывет
                }
                else {
                    echo "<option value='" . $nextm['id'] . "'>" . $nextm['name'] . "</option>";
                }

            }
            ?>
        </select><br>
        <input type="submit" value="send" name="send">
    </form>
    <?php
}
//проверяем если кнопка нажата сначит форма отправлена то проверяем что бы обьязательные поля были не пусты
else if (isset ($_POST['send'],$_POST['id'],$_POST['name'],$_POST['price'],$_POST['har'],$_POST['dv']) && !empty($_POST['id'])&& !empty($_POST['name']) && !empty($_POST['price'])&& !empty($_POST['har']) &&!empty($_POST['dv'])){
    if($_FILES['new_photo']['error']==0){
        if (!empty($_POST['old_photo'])&& $_POST['old_photo']!="noy.jpg"){
            @unlink("../images/".$_POST['old_photo']);
        }

        $filenametmp=$_FILES['new_photo']['tmp_name'];
        $filename=time().$_FILES['new_photo']['name'];
        move_uploaded_file($filenametmp,"../images/$filename");
        $query="update moped set photo='".$filename."', id_marka='".$_POST['id_marka']."', name='".$_POST['name']."', price= '".$_POST['price']."', har='".$_POST['har']."', dv='".$_POST['dv']."' where id=".$_POST['id'];

    }
else {
    $query="update moped set id_marka='".$_POST['id_marka']."', name='".$_POST['name']."', price= '".$_POST['price']."', har='".$_POST['har']."', dv='".$_POST['dv']."' where id=".$_POST['id'];
}
    mysqli_query($dbc,$query) or  die ("error");
    echo "успешно";

}
else
    echo "недостаточно данных";
mysqli_close($dbc);


?>

</body>
</html>