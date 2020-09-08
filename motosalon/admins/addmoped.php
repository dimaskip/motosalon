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

    <form action="addmoped.php" method="post" enctype="multipart/form-data">
        <!-- параметр enctype="multipart/form-data" необходим для передачи файлов формой работает паралельно с методом пост  -->
        <label> выбирите файл </label>
        <input type="file" name="foto"><br>


        <input type="text" name="name" placeholder="введите имя"><br>
        <input type="text" name="probeg" placeholder="введите пробег"><br>
        <input type="text" name="price" placeholder="введите цену"><br>
        <textarea name="opis" placeholder="введите описание">
    </textarea><br>
        <label>выберите дату</label><br>
        <input type="date" name="date"><br>
        <label>Выбирите марку</label>
        <br>
        <select id="marka" name="marka">
            <?php
            require_once ("param.php");
            $querym="select id,name from marka ";
            $resultm=mysqli_query($dbc,$querym) or die ("error");
            while ($nextm=mysqli_fetch_array($resultm))
            {
                echo"<option value='".$nextm['id']."'>".$nextm['name']."</option>";

            }

            ?>
        </select><br>







        <input type="submit" name="send" value="отправить">

    </form>
    <?php
}
    else if (isset($_POST['name'], $_POST['probeg'],$_POST['price'],$_POST['send'],$_POST['opis'], $_POST['date']) && !empty ($_POST['name']) &&!empty($_POST['probeg'])&&!empty($_POST['price'])&&!empty($_POST['opis'])&&!empty($_POST['date'])){

    require_once ("param.php");
/* работа с файлами
при передачи файла на сервер он попадает в супер глобальый масив файлс
$_FILES
так как на сервер ожет добавлться много файлов то для кадого файла создаетьс свой елемент
по названию input type file
<input type="file" name="foto"><br>
тоисть в супер глобальном масиве файл будем иметь елемент
$_FILES['foto']который будет иметь 5 состояний
1. $_FILES['foto']['size'] возвращает размер загружаемого файла
2. $_FILES['foto'][''type] возвращает мемо тип загружаемого файла например  image/png  text/txt
3. $_FILES['foto']['tmp_name'] - возвращает временный путь и временное располаженеи файла  на сервере
4. $_FILES['foto']['name'] возвращает название файла как он наывался на пк клиента
5. $_FILES ['foto']['error'] возвращает код ошибки если файл згружен успешно код ошибки ноль если нет то по коу ошибки можно определить проблему

*/

                        if( $_FILES['foto']['error']==0)
{
    $fileNameTMP=$_FILES['foto']['tmp_name'];
    $fileName=time().$_FILES['foto']['name'];
    move_uploaded_file($fileNameTMP,"../images/$fileName");


    $query ="insert into moped(name,probeg,price,har,dv,id_marka,photo) VALUES ('".$_POST['name']."','".$_POST['probeg']."','".$_POST['price']."','".$_POST['opis']."', '".$_POST['date']."','".$_POST['marka']."', '$fileName')";
}
else {
    $query ="insert into moped(name,probeg,price,har,dv,id_marka) VALUES ('".$_POST['name']."','".$_POST['probeg']."','".$_POST['price']."','".$_POST['opis']."', '".$_POST['date']."','".$_POST['marka']."')";

}


echo $query;
mysqli_query($dbc,$query) or die ("error zapros");
echo "успешно<a href='addmoped.php'>добавить ещё</a>";
mysqli_close($dbc);
}
else
{
    echo "недостаточно данных для добавления<a href='addmoped.php.php'>";
}

?>


</body>
</html>