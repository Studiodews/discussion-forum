<?php
include'includes/loginFunctions.php';
include 'layout/header.php';
include 'layout/navigation.php';
$sql="SELECT catID,catName,catDesc FROM fcategories";
    $result= mysql_query($sql)or die("query failed ".mysql_error());
    echo "<table><caption>Forum Categories</caption>";
    while($row=mysql_fetch_assoc($result))
    {
        echo "<tr><td><h3><a href=\"category.php?id={$row['catID']}\">{$row['catName']}</a></h3>{$row['catDesc']}</td></tr>";
    }
    echo "</table>";
    
include 'layout/footer.php';
?>