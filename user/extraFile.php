<table  width="100%" border="1">
                    <tr>
                        <td>
                            <div>
                              <center><h3>My Squad</h3></center>
                            </div>
                              <table width="100%">
                                <?php
                                     
                                    $conn = mysqli_connect('localhost', 'root', '', 'criclive');

                                    $sql = "SELECT * FROM team where user_id='".$_SESSION['id']."'";

                                    $result = mysqli_query($conn, $sql);

                                    while($row = mysqli_fetch_assoc($result)){

                                        if(($row['player1'] == "") || ($row['player2'] == "") || ($row['player3'] == "") || ($row['player4'] == "") || ($row['player5'] == "")){
                                ?>
                                                <tr>
                                                    <td>
                                                        <center><h4>Create a team first</h4></center>
                                                    </td>
                                                </tr>
                                <?php
                                        }
                                        else{
                                ?>
                                                <thead>
                                                    <tr>
                                                        <th><center>Name</center></th>
                                                        <th><center>Country</center></th>
                                                        <th><center>Type</center></th>
                                                        <th><center>Rating</center></th>
                                                    </tr>
                                                </thead>
                                    <?php
                                            
                                                //$conn = mysqli_connect('localhost', 'root', '', 'criclive');
                        
                                                $sql= "SELECT * FROM `team` WHERE user_id='".$_SESSION['id']."'";

                                                $result = mysqli_query($conn, $sql);
                                                //echo mysqli_num_rows($result);
                                                
                                                while($row = mysqli_fetch_assoc($result)){ 
                                                    
                                                    $i = 1;
                                                    
                                                    while($i<12){
                                                        
                                                        $sql2= "SELECT * FROM `player info` WHERE player_id='".$row['player'.$i]."'";

                                                        $result2 = mysqli_query($conn, $sql2);
                                                        //echo mysqli_num_rows($result);

                                                        while($row2 = mysqli_fetch_assoc($result2)){
                                                            
                                    ?>
                                                            
                                                            <tr>
                                                                <td><center> <?=$row2['name']?> </center></td>
                                                                <td><center> <?=$row2['country']?> </center></td>
                                                                <td><center> <?=$row2['category']?> </center></td>
                                                                <td><center> <?=$row2['rating']?> </center></td>
                                                                
                                                            </tr>
                                                
                                            <?php                
                                                        }
                                                        
                                                        $i++;
                                                        
                                                    }
                                                    
                                                }
                                                
                                  
                                        }

                                    }
                                     
                                    mysqli_close($conn);
                                  
                                ?>
                                
                                
                          </table>
                        </td>
                    </tr>
                   
                </table>