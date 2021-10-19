<?php
    if(isset($_POST['submit']))
    {
        $hostname = 'localhost';
        $database = 'userslogin';
        $username = 'root';
        $password = '';
        $connection = new mysqli($hostname, $username, $password);
        $select_db = mysqli_select_db($connection, $database);
    if(!$select_db){
        $createdb_sql = "CREATE DATABASE $database";
        $connection->query($createdb_sql);
    }
    mysqli_select_db($connection, $database);
    $query = $connection->query("SELECT * FROM grades");
    if($query === false){
        $createdb_sql = "CREATE TABLE grades
        (stud_id INT(10) PRIMARY KEY AUTO_INCREMENT,
        stud_fname VARCHAR(35),
        stud_lname VARCHAR(35),
	    mid_grade INT(10),
        proj_grade INT(10),
        final_grade INT(10),
        total INT(10)
        ) CHARACTER SET utf8 COLLATE utf8_general_ci";
        $create_table = $connection->query($createdb_sql);
        if($create_table === false) die ("Cannot create table".mysqli_connect_error());
    }
    $query = "SELECT * FROM grades";
    $fname = $_POST['uservalue1'];
    $lname = $_POST['uservalue2'];
    $midGrade = $_POST['uservalue3'];
    $projGrade = $_POST['uservalue4'];
    $finalGrade = $_POST['uservalue5'];
    $total = $midGrade + $projGrade + $finalGrade;
    $query_insert="INSERT INTO grades (stud_fname, stud_lname, mid_grade, proj_grade, final_grade, total) VALUES ('$fname', '$lname', '$midGrade', '$projGrade', '$finalGrade', '$total')";
    $connection->query($query_insert);
    $result = $connection->query($query);
    if(!$result) die ("Can not insert ".mysqli_connect_error());
        else{
            $rows = $result->num_rows;
            for ($j = 0 ; $j < $rows ; ++$j)
            {
                $result->data_seek($j);
                echo 'ID : ' .htmlspecialchars($result->fetch_assoc()['stud_id']) .'<br>';
                $result->data_seek($j);
                echo 'Firstname: ' .htmlspecialchars($result->fetch_assoc()['stud_fname']) .'<br>';
                $result->data_seek($j);
                echo 'Lastname: '.htmlspecialchars($result->fetch_assoc()['stud_lname']).'<br>';
                $result->data_seek($j);
                echo 'MidtermGrade: ' .htmlspecialchars($result->fetch_assoc()['mid_grade']) .'<br><br>';
                $result->data_seek($j);
                echo 'ProjectGrade: ' .htmlspecialchars($result->fetch_assoc()['proj_grade']) .'<br><br>';
                $result->data_seek($j);
                echo 'FinalExamGrade: ' .htmlspecialchars($result->fetch_assoc()['final_grade']) .'<br><br>';
                $result->data_seek($j);
                echo 'Total: ' .htmlspecialchars($result->fetch_assoc()['total']) .'<br><br>';
            }
            $result->close();
            $connection->close();
        }
        echo "Click here to return ==> <a href=\"http://localhost/finalExam/index_maitri_patel.php\">RETURN";
    }
?>