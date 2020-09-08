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
///////////////////////////////
$zapis=2;//переменая хранит колчество записей показываемых на одной странице
$queryZ="select id from moped";//выбираем найменшее поле которое гарантировано есть в каждоый строке
$rezZ=mysqli_query($dbc,$queryZ) or die ("rror 1 zapros");
$count_rows=mysqli_num_rows($rezZ);//mysqli_num_rows - функция возвращает количество строк в результате выполнения запроса селект тоисть мы будем иметь количество строк в бд

$count_pages=ceil($count_rows/$zapis);//в результате деления получим количество страниц
//функция цеил округляет к большему целому
// функция floor округляет результат деления к меншему целому
// функия round округляет к ближайшему целому
//echo $count_pages;
if(isset($_GET['page']))// если ссылка нажата то это значит что пользователь переходит на определёную стр которая становиться активной

{
    $active_page=$_GET['page'];// получаем номер активной странички

}
else //иначе если ссылка не нажата то активная страница первая
{
    $active_page=1;
}
$scip=($active_page-1)*$zapis;//формула вычисляет количество записей которые необходимо пропустить при показе записей для активной страницы
// от активной страницы отнимаем еденицу получаем количество приведущих страниц умножаем на количество записей одной стр получаем общее количество записей которое нужно пропускать перед показом активной страницы

////////////////////////

$query="select id, photo,name, price,probeg from moped limit $scip,$zapis";
//оператор лимит пишеться в запросе самым последним и ограничивает выбор строк с базы данных по параметрам 1) количество записей которое пропускаем 2) количество записей которое выбираем и показываем

$result=mysqli_query($dbc,$query) or die ("error zapros");

echo "<table border='2'><tr>
<th>фото</th>
<th>название</th>
<th>цена</th>
<th>пробег</th>
</tr>";
while ($next=mysqli_fetch_array($result)) {
    $id = $next['id'];
    $photo = $next['photo'];
    if (empty($photo)) {
        $photo = "noy.jpg";
    }
    $name = $next['name'];
    $price = $next['price'];
    $probeg = $next['probeg'];
    echo "<tr>
<td><img width='200px' src='../images/" . $photo . "'></td>
<td>$name</td>
<td>$price</td>
<td>$probeg</td></tr>";
}
echo "</table>";
///////////////////////////////
echo "<table><tr>";
if($active_page==1){
    echo "<td> << </td>";
}
else {


    echo "<td><a href='listalka.php?page=".($active_page-1)."'> << </a></td>";

}
for ($i=1; $i<=$count_pages; $i++)
{
    if ($active_page==$i){
        echo "<td>$i</td>";
    }
    else {
        echo "<td><a href='listalka.php?page=" . $i . "'>$i</a></td>";
    }
}
if($active_page==$count_pages){
    echo "<td> >> </td>";
}
else {


    echo "<td><a href='listalka.php?page=".($active_page +1)."'> >> </a></td>";

}
echo "</tr></table>";


////////////////////////
mysqli_close($dbc);


?>

</body>
</html>