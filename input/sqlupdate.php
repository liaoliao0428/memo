<!-- http://localhost/subject/memo/file/input/sqlupdate.php -->
<html>

<head>
</head>

<body>

<?php
    //與資料庫連線
    $conn = mysqli_connect('localhost', 'root', 'liao0428');

    //選擇資料庫
    $sbase = mysqli_select_db($conn, 'memo');
    
?>

<?php

$dataid = $_POST['dataid'];
$updatedate = $_POST["updatedate"];
$updatetime = $_POST["updatetime"];
$updatething = $_POST["updatething"];
$updateimportance = $_POST["updateimportance"];

$sql_updatedate = "update data set date = '$updatedate' where id = '$dataid' ";
$sql_updatetime = "update data set time = '$updatetime' where id = '$dataid' ";
$sql_updatething = "update data set thing = '$updatething' where id = '$dataid' ";
$sql_updateimportance = "update data set importance = '$updateimportance' where id = '$dataid' ";


$s1 = mysqli_query($conn, $sql_updatedate);
$s2 = mysqli_query($conn, $sql_updatetime);
$s3 = mysqli_query($conn, $sql_updatething);
$s4 = mysqli_query($conn, $sql_updateimportance);

if($s1){
    echo "成功";
}else{
    echo "失敗";
}

if($s2){
    echo "成功";
}else{
    echo "失敗";
}

if($s3){
    echo "成功";
}else{
    echo "失敗";
}

if($s4){
    echo "成功";
}else{
    echo "失敗";
}

?>

<a href="http://localhost/subject/memo/file/input/input.php">輸入</a>
<a href="http://localhost/subject/memo/file/input/fetch.php">查詢</a>
</body>

</html>