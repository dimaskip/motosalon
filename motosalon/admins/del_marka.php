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
if (isset($_GET['id'],$_GET['name'])&& !empty($_GET['id'])&&!empty($_GET['name']))
{
?>
<h1> Вы хотите удалить марку:
    <?= $_GET['name'] ?>?
    <h1>
        <form action="del_marka.php" method="post">
            <input type='radio' name="del" value="yes" checked>Да
            <input type="radio" name="del" value="no">Нет
            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
            <input type="submit" name="send" value="Подвтвердить"><br>
        </form>
        <?php

        }
            else if(isset($_POST['send'],$_POST['id'])&&!empty($_POST['id'])&& $_POSt['del']=="yes")
            {
                require_once ("param.php");
                $query="delete from marka where id=".$_POST['id'];
                mysqli_query($dbc,$query) or die ("error zapros");
                echo "Ваши данные успешно удалены";
                mysqli_close($dbc);

            }
            else
            {
                echo "Удаление отменено или не возможно";
            }
            ?>

</body>
</html>