<!-- http://localhost/subject/memo/file/input/input.php -->

<html>
    <head>
    </head>

    <body>
        <form method="POST" action="http://localhost/subject/memo/file/input/mysqlinput.php">
            <input type="date" name="date" required="required" autocomplete=”off”>
            <input type="time" name="time" required="required" autocomplete=”off”>
            <textarea name="thing" required="required" autocomplete=”off”></textarea>
            重要性
            <select name="importance" required="required" autocomplete=”off”>
                <option>1</option>
                <option>2</option>
                <option>3</option>
            </select>
            <input type="submit">

        </form>

        <a href="http://localhost/subject/memo/file/input/fetch.php">查詢</a>
        
    </body>

</html>