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
if(isset ($_GET['sort'])){
    $sort=$_GET['sort'];

}
// в свиче проверчем значение переменной сорт и устанавливаем её в определённый тип сортировки asc + desc -

switch ($sort){
    case "asc":
        $sort="desc";

       break;
    case "desc":
        $sort="asc";
        break;
    default:
        $sort="asc";
        break;

}

//запрос выбирает данные с таблицы мопед и сортирует по полю прайс в зависимости от значения переменной сорт asc + desc -

$query="select id,photo,name,price,probeg from moped order by price $sort";//оредер бай -сортировать по указываем название поля для сортировки после чего пишем деск или аск в зависимости от типа сортировки
$result=mysqli_query($dbc,$query) or die ("error zapros");
echo "<table border='1'><tr>
<th>фото</th>
<th>название</th>
<th><a href='sort.php?sort=".$sort."'>цена</a></th>
<th>пробег</th>

</tr>";
while ($next=mysqli_fetch_array($result)){
    $id=$next['id'];
    $photo=$next['photo'];
    if(empty($photo)){
        $photo="noy.jpg";
    }
    $name=$next['name'];
    $price=$next['price'];
    $probeg=$next['probeg'];
    echo "<tr>
<td><img width='200px' src='images/".$photo."'></td>
<td>$name</td>
<td>$price</td>
<td>$probeg</td></tr>";
}
echo "</table>";

mysqli_close($dbc);
?>

</body>
</html>