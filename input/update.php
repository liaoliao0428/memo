<!-- http://localhost/subject/memo/file/input/update.php -->
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

<?php
    
    $dataid = $_POST['dataid'];
    
        $sql = "select date, time, thing, importance from data where id = '$dataid' ";
        $select_where = mysqli_query($conn, $sql);
        $data = mysqli_fetch_all($select_where, MYSQLI_BOTH);
                    
    ?>

    <form method="POST" action=" http://localhost/subject/memo/file/input/sqlupdate.php">
    <input type="text" name = "dataid" value="<?= $dataid ?>" style="display:none">   
    日期 : <input type="date" name="updatedate" required="required" autocomplete=”off” value="<?= $data[0]['date'] ?>">
    <br/>
    時間 : <input type="time" name="updatetime" required="required" autocomplete=”off” value="<?= $data[0]['time'] ?>">
    <br/>
    事情 : <textarea name="updatething" required="required" autocomplete=”off” ><?= $data[0]['thing'] ?></textarea>
    <br/>
    重要度 : <select name="updateimportance" required="required" autocomplete=”off” value="<?= $data[0]['importance'] ?>">
                <option><?= $data[0]['importance'] ?></option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
            </select>
        <br/> 
    
        <input type="submit" value="修改">        
    </form>    
    <hr/>

<a href="http://localhost/subject/memo/file/input/input.php">輸入</a>
<a href="http://localhost/subject/memo/file/input/fetch.php">查詢</a>

<br>
</body>
</html>