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
require_once ("admins/param.php");
//////////////////////////////////////////////////////////////////////////////////////ФИЛЬТРФИЛЬТРФИЛЬТРФИЛЬТРФИЛЬТРФИЛЬТРФИЛЬТРФИЛЬТРФИЛЬТРФИЛЬТРФИЛЬТРФИЛЬТРФИЛЬТРФИЛЬТРФИЛЬТР
$querym="select id,name from marka";
$resultm=mysqli_query($dbc,$querym) or die ("error zapros");
while ($nextm=mysqli_fetch_array($resultm)){
    $idm=$nextm['id'];
    $marka=$nextm['name'];

    echo "<a href='filter.php?id_marka=".$idm."'>$marka</a> ";

}
echo "<a href='filter.php'>все</a>";




//////////////////////////////////////////////////////////////////////////////////////////ФИЛЬТРФИЛЬТРФИЛЬТРФИЛЬТРФИЛЬТРФИЛЬТРФИЛЬТРФИЛЬТРФИЛЬТРФИЛЬТР
if(isset ($_GET['id_marka']) && !empty ($_GET['id_marka'])){
    $id_marka=$_GET['id_marka'];
    $query="select id,photo,name,price,probeg from moped where id_marka=$id_marka";//запрос выбирает товары пренадлежащие категории айди которых получаем по ссылке
    //where это условие где поле = значению переменной
}

else {
    $query="select id,photo,name,price,probeg from moped";
}
$result=mysqli_query($dbc,$query) or die ("error zapros");
echo "<table border='1'> <tr>
<td>id</td>
<td>photo</td>
<td>name</td>
<td>price</td>
<td>probeg</td>
</tr>";
while ($next=mysqli_fetch_array($result)){
    $id=$next['id'];
    $photo=$next['photo'];
    if (empty($photo))
    {
        $photo="noy.jpg";

    }
    $price=$next['price'];
    $name=$next['name'];
    $price=$next['price'];
    $probeg=$next['probeg'];
    echo "<tr>
<td>$id</td>
    <td><img width='200px ' src='images/".$photo."'></td>
    <td>$name</td>
    <td>$price</td>
    <td>$probeg</td></tr>";
}
echo "</table>";
mysqli_close($dbc);






?>

</body>
</html>