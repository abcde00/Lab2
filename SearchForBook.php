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
  
  $str = $_POST['Author'];
  $temp = mysql_query("SELECT * FROM Author WHERE Name = '".$str."'");
  while($row = mysql_fetch_array($temp))
  {
    $id=$row['AuthorID']."\n";
  }
  echo '<h3>',"The books from Author ".$str." are:\n",'</h1>';
  echo "<br />";
  $result = mysql_query("SELECT * FROM Book WHERE AuthorID = '".$id."'");
  while($row = mysql_fetch_array($result))
  {
    $isbn = $row['ISBN'];
    echo '<li><a href="BookDetail.php?tid=',$isbn,'">',$row['Title'],'</li>';
  }
}
mysql_close($con);
?>