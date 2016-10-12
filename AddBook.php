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

  //add the Book
  mysql_query("INSERT INTO Book (ISBN, Title, AuthorID, Publisher, PublishDate, Price) VALUES ('$isbn', '$title', '$authorId', '$publisher', '$publishDate', '$price')");
  //search is there is such author
  $result = mysql_query("SELECT * FROM Author WHERE AuthorID = '".$authorId."'");
  //Did not find such author
  if(!mysql_num_rows($result))
  {
    mysql_query("INSERT INTO Author (AuthorID, Name) VALUES ('$authorId', '$author')");
  }
  echo "Book have been added successfully!";
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