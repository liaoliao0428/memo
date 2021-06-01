<!-- http://localhost/subject/memo/file/input/fetch.php -->
<html>
    <head>
    
    </head>

    <body>

<?php
//與資料庫連線
$conn = mysqli_connect('localhost', 'root', 'liao0428');

//選擇資料庫
$sbase = mysqli_select_db($conn, 'memo');

//選擇需要的資訊
$s = 'select date from data';

$select = mysqli_query($conn, $s);
 

?>

<!-- 製作備忘錄查詢功能日期的下拉式選單與輸入------------------------------------------------------------- -->
<form method="POST" action="http://localhost/subject/memo/file/input/fetch.php">
    <select name="selectdate" autocomplete=”off”>

<?php

//製作備忘錄查詢日期的下拉式選單內的日期
echo "<option disabled selected>" . "選擇日期" . "</option>";
$row = mysqli_fetch_all($select, MYSQLI_ASSOC);

//因為資料庫內的日期會有很多重複的 所以要先把重複的日期去掉 然後再丟進選單內
function assoc_unique($arr, $key) {
    $tmp_arr = array();
        foreach ($arr as $k => $v) {
            if (in_array($v[$key], $tmp_arr)) {//搜索$v[$key]是否在$tmp_arr數組中存在，若存在返回true
                    unset($arr[$k]);
            } else {
                $tmp_arr[] = $v[$key];
              }
        }
    sort($arr); //sort函數對數組進行排序
    return $arr;
    }

    $key = 'date'; //指定鍵值
    $newdate = assoc_unique($row, $key);

    $c = count($newdate);

    for($i = 0; $i < $c; $i++){
        foreach($newdate[$i] as $aaa => $bbb){
            echo "<option>" . $bbb . "</option>";
        }      
 }
?>
    </select>
<!-- ---------------------------------------------------------------------------------------------- -->

<!-- 製作備忘錄查詢功能重要度的下拉式選單與輸入------------------------------------------------------------- --> 
    
    <select name="selectimportance" autocomplete=”off” aria-placeholder="以杜">
        <option value="0" disabled selected>選擇重要度</option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
    </select>

    <input type="submit" >
</form>
<!-- ---------------------------------------------------------------------------------------------- -->

<?php

//empty ()內有值則回傳空值 沒值則回傳1
$emptydate = empty($_POST["selectdate"]);
$emptyimportance = empty($_POST["selectimportance"]);

if($emptyimportance == 1){
    $s = 1;
}else if($emptydate == 1){
    $s = 2;
}else{
    $s = 3;
}

echo "mdoe" . $s . "<br>";

switch($s){

    case 1: //依照選單選的日期輸出那天的資訊 -----------------------------------------------------------------
        echo "日期 : " . $_POST["selectdate"] . "<br>" . "<br>" . "<hr/>";
        $date = $_POST["selectdate"];

        $sql = "select id, date, time, thing, importance from data where date = '$date' ";
        $select_where = mysqli_query($conn, $sql);
        $data = mysqli_fetch_all($select_where, MYSQLI_BOTH);
        sort($data);//排序所得到的陣列       

        $count = count($data);
            for($c = 0; $c < $count; $c++){
                $dataid = $data[$c]['id'];
            
                echo "日期 : " . $data[$c]['date'] . "<br>";
                echo "時間 : " . $data[$c]['time'] . "<br>";
                echo "事情 : " . $data[$c]['thing'] . "<br>";
                echo "重要度 : " . $data[$c]['importance'] . "<br>" . "<br>";
                ?>
            <form method="POST" action="http://localhost/subject/memo/file/input/update.php">
            要修改的那筆資料的id : <input name = "dataid" type="submit" value="<?= $dataid ?>">
            </form>
        
        <?php
            echo "<hr/>";
            }
        echo "<br>";
    break;

    case 2: //依照選單選的重要度輸出那天的資訊 -----------------------------------------------------------------
        echo "重要度 : " . $_POST["selectimportance"] . "<br>" . "<br>" . "<hr/>";
        $importance = $_POST["selectimportance"];

        $sql = "select id, date, time, thing, importance from data where importance = '$importance' ";
        $select_where = mysqli_query($conn, $sql);
        $data = mysqli_fetch_all($select_where, MYSQLI_BOTH);
        sort($data);//排序所得到的陣列 

        $count = count($data);
            for($c = 0; $c < $count; $c++){
                $dataid = $data[$c]['id'];

                echo "日期 : " . $data[$c]['date'] . "<br>";
                echo "時間 : " . $data[$c]['time'] . "<br>";
                echo "事情 : " . $data[$c]['thing'] . "<br>";
                echo "重要度 : " . $data[$c]['importance'] . "<br>" . "<br>";
                ?>
            <form method="POST" action="http://localhost/subject/memo/file/input/update.php">
            <input name = "dataid" type="submit" value="<?= $dataid ?>">
            </form>
        
        <?php          
                echo "<hr/>";
            }
        echo "<br>";
    break;

    case 3: //依照選單選的當天的日期及重要度輸出那天的資訊 -----------------------------------------------------------------
        echo "日期 : " . $_POST["selectdate"] . " --- " . "重要度 : " . $_POST["selectimportance"] . "<br>" . "<br>" . "<hr/>";
        $date = $_POST["selectdate"];
        $importance = $_POST["selectimportance"];

        $sql = "select id, date, time, thing, importance from data where date = '$date' and importance = '$importance' ";
        $select_where = mysqli_query($conn, $sql);
        $data = mysqli_fetch_all($select_where, MYSQLI_BOTH);
        sort($data);//排序所得到的陣列

        $count = count($data);
            for($c = 0; $c < $count; $c++){
                $dataid = $data[$c]['id'];

                echo "日期 : " . $data[$c]['date'] . "<br>";
                echo "時間 : " . $data[$c]['time'] . "<br>";
                echo "事情 : " . $data[$c]['thing'] . "<br>";
                echo "重要度 : " . $data[$c]['importance'] . "<br>" . "<br>";
                ?>
            <form method="POST" action="http://localhost/subject/memo/file/input/update.php">
            <input name = "dataid" type="submit" value="<?= $dataid ?>">
            </form>
        
        <?php           
                echo "<hr/>";
            }
        echo "<br>";
    break;
}

?>
<!-- ---------------------------------------------------------------------------------------------- -->

<br>
<a href="http://localhost/subject/memo/file/input/input.php">輸入</a>


</body>

</html>