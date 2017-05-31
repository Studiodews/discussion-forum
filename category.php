<?php
include'includes/loginFunctions.php';
include 'layout/header.php';
include 'layout/navigation.php';
if(isset($_GET['id']))
{
    $catID=mysql_real_escape_string($_GET['id']);
    $sql="SELECT catName,catDesc FROM fcategories WHERE catID='$catID'";
    $result= mysql_query($sql)or die("query failed ".mysql_error());
    $row=mysql_fetch_assoc($result);
    echo "<h2>{$row['catName']}</h2>";
    echo "<p>{$row['catDesc']}</p>" ;
    echo "<table><tr><th>Topic</th><th>Author</th><th>Date</th></tr>";
    $sql="SELECT ftopics.topicTitle,
                ftopics.topicID,
                ftopics.topicDate,
                fusers.userName
                From ftopics , fusers WHERE ftopics.author=fusers.userID AND ftopics.topicCat=$catID";
                $result= mysql_query($sql)or die("query failed ".mysql_error());
                if(mysql_num_rows($result)>0)
                {
                while($row=mysql_fetch_assoc($result))
                {
                    echo "<tr><td><a href=\"topic.php?id={$row['topicID']}\">{$row['topicTitle']}</a></td><td>{$row['userName']}</td><td>".date('d-m-Y', strtotime($row['topicDate']))."</td></tr>";
                }
                }
                else
                {
                    echo '<tr><td colspan="3"> There is no topics till now</td></tr>';
                }
                echo "</table>";
}

include 'layout/footer.php';
?>