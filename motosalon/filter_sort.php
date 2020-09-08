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
if(isset($_GET['sort'])){
    $sort=$_GET['sort'];
}

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
$querym="select id,name from marka";
$resultm=mysqli_query($dbc,$querym) or die ("error zapros");
while($nextm=mysqli_fetch_array($resultm)){
    $idm=$nextm['id'];
    $marka=$nextm['name'];
    echo "<a href='filter_sort.php?id_marka=".$idm."'>$marka</a>";
}
echo "<a href='filter_sort.php'>все</a>";

if(isset($_GET['id_marka'])&& !empty($_GET['id_marka'])){
    $id_marka=$_GET['id_marka'];
    $query ="select id,photo,name,price from moped where id_marka=$id_marka order by price $sort";
}


else{
    $query="select id,photo,name,price,probeg from moped order by price $sort";

}





$result=mysqli_query($dbc,$query) or die ("error zapros");
echo "<table border='2'><tr>
<th>фото</th>
<th>название</th>";
if(isset ($_GET['id_marka'])){//проверяем если в гете существует айди марка то добавляем к сортировке айди марку
    $id_marka=$_GET['id_marka'];
    echo "<th><a href='filter_sort.php?sort=".$sort."&id_marka=".$id_marka."'> цена</a></th>";


}
else {
    echo "<th><a href='filter_sort.php?sort=".$sort."'> цена</a></th>";
}


echo "<th>пробег</th>

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
<td><img width='200px' src='images/" . $photo . "'></td>
<td>$name</td>
<td>$price</td>
<td>$probeg</td></tr>";
}
echo "</table>";

    mysqli_close($dbc);


?>

</body>
</html>