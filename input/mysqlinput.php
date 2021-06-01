<!-- http://localhost/subject/memo/file/input/mysqlinput.php -->

<html>
    <head>
    </head>

    <body>
 
<?php

if($_POST["date"]){

$date = $_POST["date"];

$time = $_POST["time"];

$thing = $_POST["thing"];

$importance = $_POST["importance"];

$conn = mysqli_connect('localhost', 'root', 'liao0428');

mysqli_select_db($conn, 'memo');

$insert = "INSERT INTO data(date, time, thing, importance) values ('$date', '$time', '$thing', '$importance')";

$test = mysqli_query($conn, $insert);

if($test){
    echo "輸入成功";
}else{
    echo "輸入失敗";
}

echo "<br>";
}else{
    exit;
}

?>

<a href="http://localhost/subject/memo/file/input/input.php">輸入</a>
<a href="http://localhost/subject/memo/file/input/fetch.php">查詢</a>


</body>

</html>