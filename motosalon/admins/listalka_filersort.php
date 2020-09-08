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
if(isset($_GET['sort'])){
    $sort=$_GET['sort'];
}

switch ($sort) {
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
$querym="select id, name from marka";
$resultm=mysqli_query($dbc,$querym) or die ("error zapros1");
while ($nextm=mysqli_fetch_array($resultm)) {
    $idm = $nextm['id'];
    $marka = $nextm['name'];
    echo "<a href='listalka_filersort.php?id_marka=".$idm." '>$marka</a>";
}
    echo "<a  href='listalka_filersort.php'>все</a>";
/////////////////////////////////////////////////////////////////////////////////////////////
$zapis=2;
if (isset ($_GET['id_marka'])){
    $queryz="select id from moped where id_marka=".$_GET['id_marka'];
}
else {
    $queryz="select id from moped";
}
$rez=mysqli_query($dbc,$queryz) or die("error zapros2");
$count_rows=mysqli_num_rows($rez);
$count_pages=ceil($count_rows/$zapis);
if(isset($_GET['page'])){
    $active_page=$_GET['page'];
}
else {
    $active_page=1;
}
$scip=($active_page-1)*$zapis;

//////////////////////////////////////////////////////////////////
if (isset($_GET['id_marka'])){
    $query="select name,probeg,price,har,dv,photo from moped where id_marka=".$_GET['id_marka']." order by price $sort limit $scip ,$zapis";
}

else {
        $query="select name,probeg,price,har,dv,photo from moped order by price $sort limit $scip ,$zapis";
    }


$result=mysqli_query($dbc,$query) or die ("error zapros");

echo "<table border='1'><tr>
<th>название</th>
<th>пробег</th>";
if (isset($_GET['id_marka'])){
    echo "<th><a href='listalka_filersort.php?sort=".$sort."&id_marka=".$_GET['id_marka']."'>цена</a></th>";
}
else {
    echo "<th><a href='listalka_filersort.php?sort=".$sort."'>цена</a></th>";
}


echo "<th>харктеристика</th>
<th>дата выпуска</th>
<th>фото</th>
</tr>";
while ($next=mysqli_fetch_array($result)){
    $name=$next['name'];
    $probeg=$next['probeg'];
    $price=$next['price'];
    $har=$next['har'];
    $dv=$next['dv'];
    $photo=$next['photo'];
    if(empty($photo)){
        $photo="noy.jpg";
    }
    echo "<tr>
<td>$name</td>
<td>$price</td>
<td>$har</td>
<td>$dv</td>
<td><img width='200px' src='../images/".$photo."'></td></tr>";
}
echo "</table>";
///////////////////////////////////////////////////////////////

if(isset($sort)&&$sort=="asc"){
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
    if (isset($_GET['id_marka'])){
        echo "<td><a href='listalka_filersort.php?page=".($active_page -1)."&id_marka=".$_GET['id_marka']."&sort=".$sort1."'> << </a></td>";

    }
    else {
        echo "<td><a href='listalka_filersort.php?page=".($active_page -1)."&sort=".$sort1."'> << </a></td>";
    }

}
for ($i=1; $i<=$count_pages; $i++){
    if($active_page==$i){
        echo "<td>$i</td>";
    }

    else {
        if(isset($_GET['id_marka'])){
            echo "<td><a href='listalka_filersort.php?page=".$i."&id_marka=".$_GET['id_marka']."&sort=".$sort1."'>$i</a></td>";

        }
        else {
            echo "<td><a href='listalka_filersort.php?page=".$i."&sort=".$sort1."'>$i</a></td>";
        }


    }
}
if ($active_page==$count_pages){
    echo "<td> >> </td>";
}
else {
    if( isset($_GET['id_marka'])){
        echo "<td><a href='listalka_filersort.php?page=".($active_page +1). "&id_marka=".$_GET['id_marka']."&sort=".$sort1."'> >> </a></td>";

    }
    else {

        echo "<td><a href='listalka_filersort.php?page=".($active_page +1). "&sort=".$sort1."'> >> </a></td>";
    }


}
echo "</tr></table>";










////////////////////////////////////////////////////////////////////


mysqli_close($dbc);

?>

</body>
</html>