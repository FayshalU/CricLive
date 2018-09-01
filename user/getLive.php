<?php

    $str = "";
    $bat = null;
    $ball1 = null;
    $t1 = null;
    $t2 = null;

    $matchId = $_GET['id'];
    $innings = $_GET['in'];
    $team1 = $_GET['t1'];
    $team2 = $_GET['t2'];

    if($innings == 1){
        $bat = $matchId.'_1';
        $ball1 = $matchId.'_2';
        $t1 = $team1;
        $t2 = $team2;
    }
    else{
        $bat = $matchId.'_2';
        $ball1 = $matchId.'_1';
        $t2 = $team1;
        $t1 = $team2;
    }
    //echo $t2;

    $str = "<h2>Batting</h2><table><tr><th>Batsman</th><th>Run</th><th>Ball</th><th>S/R</th></tr>";
    //echo $str;

        $conn = mysqli_connect('localhost', 'root', '', 'criclive');

        $sql= "SELECT * FROM `batting` where `id`='".$bat."'";

        $result = mysqli_query($conn, $sql);
        //echo mysqli_num_rows($result);

        //echo $sql;

        while($row = mysqli_fetch_assoc($result)){

            $name = null;
            $ball = 0;
            $run = 0;
            $SR = 0;
            $playerNum = null;

            for($i=1; $i<3; $i++){

                $playerNum = $row['batsman'.$i];
                $data = explode('/', $row[$playerNum]);
                $run = intval($data[0]);
                $ball = intval($data[1]);

                if($run == 0){
                    $SR = 0;
                }
                else{
                    $SR = round(($run/$ball) * 100,2);
                }



                $sql1= "SELECT * FROM `country` where `team_id`='".$t1."'";

                $result1 = mysqli_query($conn, $sql1);
                //echo mysqli_num_rows($result);



                while($row1 = mysqli_fetch_assoc($result1)){

                    $name = $row1[$playerNum];

                }

                if($row['player'.$i] == ""){

                    $str .= "<tr><td>".$name."</td><td colspan='3'>Did not bat</td></tr>";


                    continue;
                }




                $str .= "<tr><td>".$name."</td><td>".$run."</td><td>".$ball."</td><td >".$SR."</td></tr>";



            }



        }

    //echo $str;


    $str .= "</table><h2>Bowling</h2><table><tr><th>Bowler</th><th>Over</th><th>Run</th><th>Wicket</th><th>Economy</th></tr>";
    //echo $str;


        $sql= "SELECT * FROM `bowling` where `id`='".$ball1."'";

        $result = mysqli_query($conn, $sql);
        //echo mysqli_num_rows($result);

        //echo $ball1;

        while($row = mysqli_fetch_assoc($result)){

            $name = null;
            $over = null;
            $ball = 0;
            $run = 0;
            $wicket = 0;
            $econ = 0;
            $playerNum = null;

            for($i=1; $i<3; $i++){

                $playerNum = $row['bowler'.$i];
                $data = explode('-', $row[$playerNum]);
                $run = intval($data[1]);
                $wicket = intval($data[2]);
                $over = $data[0];
                $over1 =  floatval( $over);

                if($over1 == 0){
                    $econ = 0;
                }
                else{
                    $econ = round(($run/$over1),2);
                }


                //echo $playerNum;
                $sql1= "SELECT * FROM `country` where `team_id`='".$t2."'";

                $result1 = mysqli_query($conn, $sql1);
                //echo mysqli_num_rows($result);



                while($row1 = mysqli_fetch_assoc($result1)){

                    $name = $row1[$playerNum];

                }





                $str .= "<tr><td>".$name."</td><td>".$over."</td><td>".$run."</td><td >".$wicket."</td><td >".$econ."</td></tr>";



            }



        }

        $str .= "</table>";


        echo $str;
?>