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
  $isbn = $_POST['ISBN'];
  $title = $_POST['Title'];
  $authorId = $_POST['AuthorID'];
  $author = $_POST['Author'];
  $publisher = $_POST['Publisher'];
  $publishDate = $_POST['PublishDate'];
  $price = $_POST['Price'];

  //update the Book
  if($title != null){
    mysql_query("UPDATE Book SET Title = '".$title."' where ISBN = '".$isbn."'");
  }
  if($authorId != null){
    mysql_query("UPDATE Book SET AuthorID = '".$authorId."' where ISBN = '".$isbn."'");
  }
  if($publisher != null){
    mysql_query("UPDATE Book SET Publisher = '".$publisher."' where ISBN = '".$isbn."'");
  }
  if($publishDate != null){
    mysql_query("UPDATE Book SET PublishDate = '".$publishDate."' where ISBN = '".$isbn."'");
  }
  if($price != null){
    mysql_query("UPDATE Book SET Price = '".$price."' where ISBN = '".$isbn."'");
  }
  
  echo "Book have been updated successfully!";
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
@$isbn=$_GET['tid'];
?>

  <form action="SearchForBook.html" method="post">  
    <p><input type="submit" value="Return"></p>
    <?php
  ?>
  </form>
</body>
</html>