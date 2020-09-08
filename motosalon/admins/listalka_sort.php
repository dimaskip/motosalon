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
if (isset($_GET['sort'])){
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






$zapis=3;
$queryz="select id from moped";
$rezz=mysqli_query($dbc,$queryz) or die ("error zapros1");
$count_rows=mysqli_num_rows($rezz);
$count_pages=ceil($count_rows/$zapis);
if (isset($_GET['page']))
{
    $active_page=$_GET['page'];
}
else {
    $active_page=1;
}
$scip=($active_page-1)*$zapis;





$query="select id,photo, name, price,probeg from moped order by price $sort limit $scip,$zapis ";
$result=mysqli_query($dbc,$query) or die ("error zapros");
echo "<table border='1'><tr>
    <th>фото</th>
<th>название</th>
<th><a href='listalka_sort.php?sort=".$sort."'> цена</a></th>
<th>пробег</th>
<th>подробнее</th>
</tr>";
while ($next=mysqli_fetch_array($result)){
    $name=$next['name'];
    $price=$next['price'];
    $probeg=$next['probeg'];
    $photo=$next['photo'];
    if(empty($photo)){
        $photo="noy.jpg";
    }
    echo "<tr>
<td><img width='200px' src='../images/".$photo."'></td>
<td>$name</td>
<td>$price</td>
<td>$probeg</td></tr>";
}
echo "</table>";
if(isset($sort) && $sort=="asc"){
    $sort1="desc";

}
else {
    $sort1="asc";
}
echo "<table><tr>";
if($active_page==1){
    echo "<td> << </td>";
}
else {
    echo "<td><a href='listalka_sort.php?page=".($active_page-1)."&sort=".$sort1."'> << </a><td>";
}
for ($i=1; $i<=$count_pages; $i++)
{
    if ($active_page==$i){
        echo "<td>$i</td>";
    }
    else {
        echo "<td><a href='listalka_sort.php?page=".$i."&sort=".$sort1."'>$i</a></td>";
    }
}
if ($active_page==$count_pages){
    echo "<td> >> </td>";
}
else {
    echo "<td><a href='listalka_sort.php?page=".($active_page +1)."&sort=".$sort1."'> >> </a></td>";
}
echo "</tr></table>";
mysqli_close($dbc);


?>

</body>
</html>