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
if(isset ($_GET['id'], $_GET['name']) && !empty($_GET['id'])&& !empty($_GET['name'])) {
    ?>
    <h1>Вы хотите удалить?</h1>
    <?= $_GET['name'] ?>?
    <h1>
        <form action="delete_moto.php" method="post">
        <input type="radio" name="del" value="yes" checked>да
        <input type="radio" name="del" value="no" checked>нет
        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
        <input type="submit" name="send" value="подтвердить"><br>
        </form>
    </h1>
    <?php
}
else if(isset($_POST['send'], $_POST['id']) && !empty($_POST['id']) && $_POST['del']=="yes") {
    require_once ("param.php");
    $queryf="select photo from moped where id=".$_POST['id'];
    $rezf=mysqli_query($dbc,$queryf) or die ("error query");
    $nextf=mysqli_fetch_array($rezf);
    if (!empty($nextf['photo']))
    {
        @unlink("../images/".$nextf['photo']);//ФУНКЦИЯ УН ЛИНК  удаляет файл параметром получает путь и название файла

    }

    $query ="delete from moped where id=".$_POST['id'];
    mysqli_query($dbc,$query) or die ("error zapros");
    echo "Ваши данные успешно удалены";
    mysqli_close($dbc);
}
  else
  {
      echo "Удаление не возможно";
  }


?>

</body>
</html>