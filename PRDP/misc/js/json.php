<?php
    $HOST = "localhost";
    $USER = "root";
    $PASS = "";
    $DATABASE = "upampli";
    $con = mysql_connect($HOST, $USER, $PASS);
    $db = mysql_select_db($DATABASE, $con);
?>

<?
header('Content-type: text/json');
$sql=mysql_query("select UNIX_TIMESTAMP(date), img, name from events");
$comma=" ";
echo '[';
while($row=mysql_fetch_array($sql)){
echo $comma;
$title=$row['name']; 
$date=$row['UNIX_TIMESTAMP(date)']*1000; 
$description=$row['img'];
echo '{"date":"'; echo $date; echo'","title":"'; echo $title; echo'","description":"'; echo $description; echo '"}'; $comma=",";
}echo ']';
?>