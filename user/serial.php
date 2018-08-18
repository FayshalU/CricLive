<?php
    $conn = mysqli_connect('localhost', 'root', '', 'criclive');

    $sql = "SELECT @a:=@a+1 serial_number, points FROM rank, (SELECT @a:= 0) AS a ORDER BY `points` DESC";

    $result = mysqli_query($conn, $sql);
    //echo mysqli_num_rows($result);
    $i = 1;
    while($row = mysqli_fetch_assoc($result)){
        echo $row['serial_number']." ".$row['points']."<br>";
    }

?>

