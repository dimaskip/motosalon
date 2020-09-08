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
if (!isset($_POST['send'])) {

    ?>


    <form action="add_marka.php" method="post">
        <input type="text" name="name" placeholder="Введите название марки"><br>
        <input type="submit" name="send" value="добавить">
    </form>
    <?php
}
else if(isset($_POST['send'])&& !empty($_POST['name'])){

    require_once ("param.php");
    $query="insert into marka (name)value ('".$_POST['name']."')";
    mysqli_query($dbc,$query) or die ("error zapros");
    echo "марка успешно добавлена";
    mysqli_close($dbc);
}
else {
    echo "недостаточно данных для добавления<a href='add_marka.php'>";
}

?>



</body>
</html>