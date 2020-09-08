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

$query="select id,name from marka";
$result=mysqli_query($dbc,$query) or die ("error zapros");
echo "<table  border='1'><tr>

<th>id</th>
<th>название</th>
<th>редактировать</th>
<th>удалить</th>
</tr>";

while ($next=mysqli_fetch_array($result)) {
    $id = $next['id'];
    $name = $next['name'];


    echo "<tr>
<td>$id</td>
<td>$name</td>
<td><a href='edit_marka.php?id=" . $id . "'>Редактировать</a></td>
 <td><a href='del_marka.php?id=" . $id . "&name=" . $name . "'>удалить<a/></td></tr>";
}
echo "</table>";

mysqli_close($dbc);


?>

</body>
</html>