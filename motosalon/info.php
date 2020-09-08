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
if (isset ($_GET['id']) && !empty($_GET['id']))
{
    $id = $_GET['id'];
    require_once("admins/param.php");

    $query = "select name,probeg,price,har,dv,id_marka,photo from moped where id=$id ";
    
    $result = mysqli_query($dbc, $query) or die ("error zapros");
echo "<table border='1'><tr>
<th>название</th>
<th>пробег</th>
<th>цена</th>
<th>характеристика</th>
<th>дата выпуска</th>
<th>марка</th>
<th>фото</th>
</tr>";

$next = mysqli_fetch_array( $result);
$name = $next['name'];
$probeg = $next['probeg'];
$price = $next['price'];
$har = $next['har'];
$dv = $next['dv'];
$marka = $next['marka'];
$photo = $next['photo'];
 if (empty($photo)) {
     $photo = "noy.jpg";
 }

 echo "<tr>
<td><img width='200px' src='images/" . $photo . "'> </td>
<td>$name</td>
<td>$probeg</td>
<td>$price</td>
<td>$har</td>
<td>$dv</td>
<td>$marka</td>
<td>$photo</td>
 <td><a href='info.php?id=\".$id.\"'>подробнее</a></td></tr>";

 echo "</table>";
mysqli_close($dbc);


}
else echo "недостаочно данных для вывода";
 


?>

</body>
</html>