<?php
$myDB =new mysqli('localhost','root','','libary');
if ($myDB -> connect_error){
    die('Connect Error (' . $myDB->connect_errno.')'.$myDB->connect_error);
}
$sql ="SELECT * FROM book WHERE availiable = 0 order by title";
$result =$myDB->query($sql);
?>
<table cellSpacing="2" cellPadding="6" align="center" border="1">
    <tr>
        <td colspan="4">
            <h3 align="center">These Books are currently avaiable</h3>
        </td>
    </tr>
    <tr>
        <td align="center">Title</td>
        <td align="center">Year Published</td>
        <td align="center">ISBN</td>
    </tr>
    <?php
    while ($row =$result ->fetch_assoc()){
        echo "<tr>";
        echo "<td>";
        echo stripcslashes($row['title']);
        echo "</td><td  align = 'center'>";
        echo $row["pub_year"];
        echo "</td><td>";
        echo $row["JSBN"];
        echo "</td>";
        echo "</tr>";
    }
    ?>
</table>

