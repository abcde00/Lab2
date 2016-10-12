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
  echo '<h2>', "Book Detail:", '</h2>';
  $isbn=$_GET['tid'];
  echo '<h3>', "About the book:", '</h3>';
  $result = mysql_query("SELECT * FROM Book WHERE ISBN = '".$isbn."'");
  while($row = mysql_fetch_array($result))
  {
    echo "ISBN: ".$row['ISBN'];
    echo "<br />";
    echo "Title: ".$row['Title'];
    echo "<br />";
    /*
    echo "AuthorID: ".$row['AuthorID'];
    echo "<br />";*/
    $authorid = $row['AuthorID'];
    echo "Publisher: ".$row['Publisher'];
    echo "<br />";
    echo "PublishDate: ".$row['PublishDate'];
    echo "<br />";
    echo "Price: ".$row['Price'];
    echo "<br />";
  }
  echo '<h3>', "About the author:", '</h3>';
  $result = mysql_query("SELECT * FROM Author WHERE AuthorID = '".$authorid."'");
  while($row = mysql_fetch_array($result))
  {
    echo "AuthorID: ".$row['AuthorID'];
    echo "<br />";
    echo "Name: ".$row['Name'];
    echo "<br />";
    echo "Age: ".$row['Age'];
    echo "<br />";
    echo "Country: ".$row['Country'];
    echo "<br />";
  }

}
mysql_close($con);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Book Detail</title>
</head>
<body>
<?php
$isbn=$_GET['tid'];
?>

  <form action="DeleteBook.php" method="post">  
  <input type='hidden' name='isbn' value='<?php echo $isbn?>'> 
    <p><input type="submit" value="Delete"></p>
  </form>
  <form action="SearchForBook.html" method="post">  
    <p><input type="submit" value="Return"></p>
</body>
</html>