<html>
<head>
    <title>Add New | BookStore</title>
</head>
   <body>
   <?php
   $bookId= 0;
   $authorId=0;
   $title ="";
   $JSBN="";
   $pub_year=1999;
   $availiable =0;

   if (!empty($_POST['bookId'])){
       $bookId=$_POST['bookId'];
   }
   if (!empty($_POST['authorId'])){
       $authorId=$_POST['authorId'];
   }

   if (!empty($_POST['title'])){
       $title=$_POST['title'];
   }
   if (!empty($_POST['JSBN'])){
       $JSBN=$_POST['JSBN'];
   }

   if (!empty($_POST['pub_year'])){
       $pub_year=$_POST['pub_year'];
   }

   if (!empty($_POST['availiable'])){
       $availiable=$_POST['availiable'];
   }

   ?>
   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
       Book id: <input type="text" name="bookid"/><br>
       Author id: <input type="text" name="authorid"/><br>
       Title: <input type="text" name="title"/><br>
       JSBN: <input type="text" name="JSBN"/><br>
       Public Year: <input type="text" name="pub_year"/><br>
       Availiable: <input type="text" name="availiable"/><br>
       <input type="submit" value="Add Book">
   </form>
   <?php
   $myDB =new mysqli('localhost','root','','libary');
   if ($myDB -> connect_error){
       die('Connect Error (' . $myDB->connect_errno.')'.$myDB->connect_error);
   }
   if ($title != '' && $JSBN !=''){
       $insert ="INSERT INTO book(bookid, authorid, title, JSBN, pub_year, availiable) VALUES 
       ($bookId,$authorId,'$title','$JSBN',$pub_year,$availiable)";
       echo  $insert;
       $myDB->query($insert);
       echo "New record crated successfully";

   }
   if ($title != ''){
       $sql = "SELECT * FROM book WHERE availiable = 0 AND title LIKE '%{$title}%' ORDER BY title";

   }else{
       $sql ="SELECT * FROM book WHERE availiable=0 ORDER BY title";
   }
   $result =$myDB->query($sql);

   ?>
   <table cellSpacing="2" cellPadding="6" align="center" border="1">
       <tr>
           <td colspan="4">
               <h3 align="center">These Books are currently available</h3>
           </td>
       </tr>
       <tr>
           <td align="center">Title</td>
           <td align="center">Year Public</td>
           <td align="center">ISBN</td>
       </tr>
       <?php
       while ($row=$result->fetch_assoc()){
           echo "<tr>";
           echo "<td>";
           echo $row["title"];
           echo "</td><td align='center'>";
           echo $row["pub_year"];
           echo "</td><td>";
           echo $row["JSBN"];
           echo "</td>";
           echo "</tr>";
       }
       ?>
   </table>
   </body>
</html>
