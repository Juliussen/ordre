<?php


    $serverName = "tcp:ordremekka.database.windows.net,1433"; // update me
    $connectionOptions = array(
        "Database" => "ordremekka", // update me
        "Uid" => "madsjuliussen", // update me
        "PWD" => "Gme1234567890987654321" // update me
    );
    //Establishes the connection
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    $tsql= "SELECT * FROM [Avdeling]";
    $getResults= sqlsrv_query($conn, $tsql);
    echo ("Reading data from table" . PHP_EOL);
    if ($getResults == FALSE)
        echo (sqlsrv_errors());
    while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
     echo ($row['avdelingsnr'] . " <br>" . $row['avdelingsnavn'] . PHP_EOL);
    }
    sqlsrv_free_stmt($getResults);


// PHP Data Objects(PDO) Sample Code:
// try {
//     $conn = new PDO("sqlsrv:server = tcp:ordremekka.database.windows.net,1433; Database = ordremekka", "madsjuliussen", "Gme1234567890987654321");
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// }
// catch (PDOException $e) {
//     print("Error connecting to SQL Server.");
//     die(print_r($e));
// }

// // SQL Server Extension Sample Code:
// $connectionInfo = array("UID" => "madsjuliussen", "pwd" => "Gme1234567890987654321", "Database" => "ordremekka", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
// $serverName = "ordremekka.database.windows.net,1433";
// $conn = sqlsrv_connect($serverName, $connectionInfo);

// include('../conn.php');

// $sql = "SELECT * FROM 'avdeling'";
// $query_run = mysqli_query($conn, $sql);

?>

        
            
            <html>


            <div class="container-fluid">
           
                    <table id="datatableid" class="table table-bordered table-striped" >
                    <div class="container-fluid">
                        <thead >
                            <tr class="bg-dark text-white">
                            <th>Avdelingsnr&nbsp;Nr</th>
                            <th>Avdelingsnavn&nbsp;Nr</th>
                            <th>Avdelingsepost&nbsp;Navn</th>
                            
                            </tr>
                        </thead>
                        <?php
                if($query_run)
                {
                    foreach($query_run as $row)
                    {
            ?>
            
         


                        <tbody>
                            <tr><center>
                                <td> <center><?php echo $row['avdelingsnr']; ?> </center></td>
                                <td><center> <?php echo $row['avdelingsnavn']; ?></center> </td>
                                <td><center> <?php echo $row['avdelingsepost']; ?> </center></td>
                               
                                
                                
                            </tr>
                        </tbody>
                        <?php           
                    }
                }
                else 
                {
                    echo "Ingen ordre ble funnet";
                }
            ?>
                    </table>
                </div>
            </div>


        </div>
    </div>

</html>
