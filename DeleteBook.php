<?php


$con = mysql_connect("localhost","root","123456");
if (!$con)
{
  die('数据库连接失败: ' . mysql_error());
}
else
{
    //open the database
  mysql_select_db("BookDB", $con);
  $isbn = $_POST['isbn'];
  $result = mysql_query("DELETE FROM Book WHERE ISBN = '".$isbn."'");
  echo "Book is already deleted!";
  echo "<br/>";
  //print the name of the reset books
  /*
  $result = mysql_query("SELECT * FROM Book");
  while($row = mysql_fetch_array($result))
  {
  echo $row['Title'];
  echo "<br />";
  }*/
   mysql_close($con);
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Book Detail</title>
</head>
<body>
<?php
@$isbn=$_GET['tid'];
?>

  <form action="SearchForBook.html" method="post">  
    <p><input type="submit" value="Return"></p>
    <?php
  ?>
  </form>
</body>
</html>