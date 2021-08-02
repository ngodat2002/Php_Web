<?php
$myDB =new mysqli('localhost','root','','demo');
if ($myDB -> connect_error){
    die('Connect Error (' . $myDB->connect_errno.')'.$myDB->connect_error);
}
$sql ="SELECT * FROM peoples";
$result =$myDB->query($sql);
?>
</table>
<html>
<head>
    <title>Peoples</title>
    <!-- jQuery library -->

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300&family=Noto+Sans+JP:wght@300&family=Poppins:wght@300&display=swap" rel="stylesheet">  <style>

        *{
            font-family: 'Hind Siliguri', sans-serif;
        }

    </style>

</head>
<body>
<?php
$name = '';
if (!empty($_POST['name'])){
    $name =$_POST['name'];
    echo "Finding record,{$_POST['name']}, and Result ";
}
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    Enter your name: <input type="text" name="name"/>
    <input type="submit" value="Search"/>
</form>
<?php
$myDB =new mysqli('localhost','root','','demo');
if ($myDB -> connect_error){
    die('Connect Error (' . $myDB->connect_errno.')'.$myDB->connect_error);
}
if ($name !=''){
    $sql = "SELECT * FROM peoples 
  WHERE F < 3   AND  name LIKE '%{$name}%'
    ORDER  BY name";
}else{
    $sql = "SELECT * FROM  peoples WHERE F < 3 ORDER BY name";
}
$result = $myDB ->query($sql);
?>

<table class="table table-bordered">
    <tr>
        <th colspan="5">
            <h3 align="center">Danh sách cách ly chống dịch COVID-19</h3>
        </th>
    </tr>
    <tr>
        <th width="250" scope="col">Name</th>
        <th scope="col">F</th>
        <th scope="col">Location</th>
        <th scope="col" >Start Date</th>
        <th scope="col" >End Date</th>

    </tr>
    <?php
    while ($row =$result ->fetch_assoc()){
        echo "<tr>";
        echo "<th>";
        echo stripcslashes($row['name']);
        echo "</th><th align = 'center'>";
        echo $row["F"];
        echo "</th><th>";
        echo $row["location"];
        echo "</th><th>";
        echo $row["start_date"];
        echo "</th><th>";
        echo $row["end_date"];
        echo "</th>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>
