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

$querym="select id,name from marka";

$resultm=mysqli_query($dbc,$querym) or die ("error zapros1");
while ($nextm=mysqli_fetch_array($resultm)){
    $idm=$nextm['id'];
    $marka=$nextm['name'];
    echo "<a href='listalka_filter.php?id_marka=".$idm."'>$marka</a>";
}
echo "<a href='listalka_filter.php'>все</a>";
////////////////////////////////////
$zapis=2;
if(isset($_GET['id_marka'])){
    $queryz="select id from moped where id_marka=".$_GET['id_marka'];

}
else{
    $queryz="select id from moped";
}

$rez=mysqli_query($dbc,$queryz) or die ("error zapros");
$count_rows=mysqli_num_rows($rez);

$count_pages=ceil($count_rows/$zapis);
if(isset($_GET['page'])){
    $active_page=$_GET['page'];
}
else {
    $active_page=1;
}


    $scip=($active_page-1)*$zapis;







/// //////////////////////////////////
if (isset($_GET['id_marka'])){
    $query="select name,probeg,price,har,dv,photo from moped  where id_marka=".$_GET['id_marka']." limit $scip ,$zapis";

}
else {
    $query="select name,probeg,price,har,dv,photo from moped limit $scip ,$zapis";
}


$result=mysqli_query($dbc,$query) or die ("error zapros");
echo "<table border='1'><tr>
<th>Название</th>
<th>пробег</th>
<th>характеристика</th>
<th>дата выпуска</th>
<th>цена</th>
<th>фото</th>
</tr>";
while ($next=mysqli_fetch_array($result)){
    $name=$next['name'];
    $probeg=$next['probeg'];
    $har=$next['har'];
    $dv=$next['dv'];
    $price=$next['price'];
    $photo=$next['photo'];
    if(empty($photo)){
        $photo="noy.jpg";
    }
    echo "<tr>
<td>$name</td>
<td>$probeg</td>
<td>$har</td>
<td>$dv</td>
<td>$price</td>
<td><img width='200px' src='../images/".$photo."'></td></tr>";
}

echo "</table>";
/////////////////////////////////////////////////////////////////

echo "<table><tr>";
if($active_page==1){
    echo "<td> << </td>";
}
else {
    if (isset($_GET['id_marka'])){
        echo "<td><a href='listalka_filter.php?page=".($active_page -1)."&id_marka=".$_GET['id_marka']."'> << </a></td>";

    }
    else {
        echo "<td><a href='listalka_filter.php?page=".($active_page -1)."'> << </a></td>";
    }

}
for ($i=1; $i<=$count_pages; $i++){
    if($active_page==$i){
        echo "<td>$i</td>";
    }

    else {
        if(isset($_GET['id_marka'])){
            echo "<td><a href='listalka_filter.php?page=".$i."&id_marka=".$_GET['id_marka']."'>$i</a></td>";

        }
        else {
            echo "<td><a href='listalka_filter.php?page=".$i."'>$i</a></td>";
        }


    }
}
if ($active_page==$count_pages){
    echo "<td> >> </td>";
}
else {
    if( isset($_GET['id_marka'])){
        echo "<td><a href='listalka_filter.php?page=".($active_page +1). "&id_marka=".$_GET['id_marka']."'> >> </a></td>";

    }
    else {

        echo "<td><a href='listalka_filter.php?page=".($active_page +1). "'> >> </a></td>";
    }


}
echo "</tr></table>";




/////////////////////////////////////////////////
mysqli_close($dbc);


?>

</body>
</html>