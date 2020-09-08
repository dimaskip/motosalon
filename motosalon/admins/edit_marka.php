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
if (isset ($_GET['id']) && !empty($_GET['id'])) {
    $query = "select name from marka where id=" . $_GET['id'];
    $rez = mysqli_query($dbc, $query) or die ("error zapros");
    $next = mysqli_fetch_array($rez);
    ?>
    <h1>редакт мото марок</h1>
    <form action="edit_marka.php" method="post">
        <label> отредактируйте марку</label>
        <input type="text" name='name' value='<?=$next['name'] ?>'>
        <input type="hidden" name="id" value='<?=$_GET['id'] ?>'>
        <input type="submit" name="send" value="подтвердить"><br>
    </form>
    <?php
}

else if (isset( $_POST['send'],$_POST['id'], $_POST['name']) && !empty ($_POST['id']) && !empty ($_POST['name'])){
    $query="Update marka set name='".$_POST['name']."' where id=".$_POST['id'];
    //обновить таблицу марка установить поле нейм в новое значение при условии что поле айди равно переменной айди
    // внимание если условие вер не дописать все строки станут одинаковые!

    mysqli_query($dbc,$query) or die (error);
    echo "категории успешно отредактированы";

}
else
    echo "недостаточно данных для редактирования";

    mysqli_close($dbc);

?>


</body>
</html>