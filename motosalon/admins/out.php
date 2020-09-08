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
require_once("param.php");

$query="select id,photo, name, price,probeg from moped ";
$result=mysqli_query($dbc,$query) or die ("error zapros");
echo "<table border='1'><tr>
<th>фото</th>
<th>название</th>
<th>цена</th>
<th>пробег</th>
<th>подробнее</th>
</tr>";
while ($next=mysqli_fetch_array($result)) {
    $id = $next['id'];
    $photo = $next['photo'];
    if(empty($photo))
    {
        $photo= "noy.jpg";
    }
    $name = $next['name'];
    $price = $next['price'];
    $probeg = $next['probeg'];

    echo "<tr>
    <td><img width='200px' src='../images/".$photo."'> </td>
<td>$name</td>
<td>$price</td>
<td>$probeg</td></tr>";
   
}
echo "</table>";
mysqli_close($dbc);

?>

</body>
</html>