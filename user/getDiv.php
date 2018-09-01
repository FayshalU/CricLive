
<?php

    error_reporting(0);

    $batting = $_GET['bat'];
    $bowling = $_GET['ball'];
    $team1 = $_GET['t1'];
    $team2 = $_GET['t2'];

    $str = "";
    $str .= "<h2>Batting</h2>
    <table>
        <tr>
            <th>Batsman</th>
            <th></th>
            <th>Run</th>
            <th>Ball</th>
            <th>S/R</th>
        </tr>";

        $conn = mysqli_connect('localhost', 'root', '', 'criclive');

        $sql= "SELECT * FROM `batting` where `id`='".$batting."'";

        $result = mysqli_query($conn, $sql);
        //echo mysqli_num_rows($result);



        while($row = mysqli_fetch_assoc($result)){

            $name = null;
            $ball = 0;
            $run = 0;
            $SR = 0;

            for($i=1; $i<12; $i++){


                $data = explode('/', $row['player'.$i]);
                $run = intval($data[0]);
                $ball = intval($data[1]);

                if($run == 0){
                    $SR = 0;
                }
                else{
                    $SR = round(($run/$ball) * 100,2);
                }


                $sql1= "SELECT * FROM `country` where `team_id`='".$team1."'";

                $result1 = mysqli_query($conn, $sql1);
                //echo mysqli_num_rows($result);



                while($row1 = mysqli_fetch_assoc($result1)){

                    $name = $row1['player'.$i];

                }

                if($row['player'.$i] == ""){

                    $str .= "<tr>
                            <td>".$name."</td>
                            <td colspan='3'>Did not bat</td>

                        </tr>";
                    continue;
                }

                $wicketName = null;

                $sql2= "SELECT * FROM `wicket` where `id`='".$batting."'";

                $result2 = mysqli_query($conn, $sql2);
                //echo mysqli_num_rows($result);



                while($row2 = mysqli_fetch_assoc($result2)){

                    $wicketName = $row2['player'.$i];

                }

                if($wicketName == ""){

                    $wicketName = 'Not out';

                }



                


                $str .= "<tr>
                    <td>".$name."</td>
                    <td>".$wicketName."</td>
                    <td>".$run."</td>
                    <td>".$ball."</td>
                    <td >".$SR."</td>
                </tr>";


               
            }



        }


    $str .= "</table>

    <h2>Bowling</h2>

    <table>
        <tr>
            <th>Bowler</th>
            <th>Over</th>
            <th>Run</th>
            <th>Wicket</th>
            <th>Economy</th>
        </tr>";


        $sql= "SELECT * FROM `bowling` where `id`='".$bowling."'";

        $result = mysqli_query($conn, $sql);
        //echo mysqli_num_rows($result);



        while($row = mysqli_fetch_assoc($result)){

            $name = null;
            $over = null;
            $ball = 0;
            $run = 0;
            $wicket = 0;
            $econ = 0;

            for($i=1; $i<12; $i++){


                $data = explode('-', $row['player'.$i]);
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

                


                $sql1= "SELECT * FROM `country` where `team_id`='".$team2."'";

                $result1 = mysqli_query($conn, $sql1);
                //echo mysqli_num_rows($result);



                while($row1 = mysqli_fetch_assoc($result1)){

                    $name = $row1['player'.$i];

                }

                if($row['player'.$i] == ""){

//                                    echo '<tr>
//                                            <td>'.$name.'</td>
//                                            <td colspan="3">Did not bat</td>
//                                            
//                                        </tr>';
                    continue;
                }

                


                $str .= "<tr>
                    <td>".$name."</td>
                    <td>".$over."</td>
                    <td>".$run."</td>
                    <td >".$wicket."</td>
                    <td >".$econ."</td>
                </tr>";


               
            }



        }




    $str .= "</table>";

    echo $str;

?>