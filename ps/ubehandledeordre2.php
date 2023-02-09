<?php
include('../connection.php');

if (!isset($_SESSION['googleCode'])):
    header("location:../register.php");
	exit();
endif;
include('../topbar.php');
$googlecode = $_SESSION['secret'];
$sql = db_query("select * from google_auth where googlecode = '".$googlecode."'");
$row = mysqli_fetch_array($sql);

$firstname 	= $row['fname'];
$lastname 	= $row['lname'];
$email 		= $row['email'];
$usertype 		= $row['usertype'];

include_once('../conn.php'); 
$query = "SELECT * FROM ordre where avdeling = '".$avdeling."' and status = 'Sendt Produksjon'";

$sql3 = "SELECT * FROM leveringskode";
    $all_categories3 = mysqli_query($mysqli,$sql3);
    $leveringskode = $_GET['leveringskode'];
  
    $date = date('Y-m-d'); 

?>
<html>
 <head>
  <title>OrdreMekka 1.0</title>

 
  
 </head>
<body class="a2z-wrapper">
  <div class="container-fluid">
 <!-- Modal -->
 <div class="modal fade" id="studentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">LEGG TIL ORDRE </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="insertcode.php" method="POST">

                    <div class="modal-body">
                        <div class="form-group">
                            <label> First Name </label>
                            <B><input type="text" name="fname" class="form-control" placeholder="Enter First Name"></B>
                        </div>

                        <div class="form-group">
                            <label> Last Name </label>
                            <input type="text" name="lname" class="form-control" placeholder="Enter Last Name">
                        </div>

                        <div class="form-group">
                            <label> Course </label>
                            <input type="text" name="course" class="form-control" placeholder="Enter Course">
                        </div>

                        <div class="form-group">
                            <label> Phone Number </label>
                            <input type="number" name="contact" class="form-control" placeholder="Enter Phone Number">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="insertdata" class="btn btn-primary">Save Data</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- SPESIAL POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="spesialmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> MERK ORDRE BESTILT SPESIAL GLASS </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="update_spesialbestilling2.php" method="POST">

                    <div class="modal-body">
                    <div class="form-group"><div class="container box">
                        <label> Ordre Nr </label><br>
                        <input type="num" name="ordrenr" id="ordrenr" placeholder="Ordre Nr" readonly><br>
                        <label> Kunde Nr </label><br>
                        <input type="num" name="kundenr" id="kundenr" placeholder="Kunde Nr" readonly><br>
                        <label> Kunde Navn </label><br>
                        <input type="text" name="kundenavn" id="kundenavn" placeholder="Kunde Navn" readonly>
                            </div></div><div class="container box">
                            <label> Dato for bestilling:</label><br>
                            
                            <input type='date' value='<?php echo $date ?>' id='datosendtbestillingspesial' name='datosendtbestillingspesial' required><br>
                            
                        <h4 id="status"> <?php echo $status['status']; ?> </h4>
                    </div></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> LUKK </button>
                        <button type="submit" name="updatedata2" class="btn btn-info">SEND</button>

                        <!-- <button type="submit" name="deletedata" class="btn btn-primary"> Yes !! Delete it. </button> -->
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- SENDE PROD POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="viewmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> SENDE TIL PRODUKSJONS LINJA </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="update_sendprodlinja2.php" method="POST">

                    <div class="modal-body">
                    <div class="form-group"><div class="container box">
                        <label> Ordre Nr </label><br>
                        <input type="num" name="ordrenr1" id="ordrenr1" placeholder="Ordre Nr" readonly><br>
                        <label> Kunde Nr </label><br>
                        <input type="num" name="kundenr" id="kundenr1" placeholder="Kunde Nr" readonly><br>
                        <label> Kunde Navn </label><br>
                        <input type="text" name="kundenavn" id="kundenavn1" placeholder="Kunde Navn" readonly>
                            </div></div><div class="container box">
                            <label> Status blir endret til:</label><br>
                            <input type="text" name="status1" value="Sendt Prod Linje" 	readonly>
                            <input type='text' value='<?php echo $date ?>' id='datosendtprodlinja' name='datosendtprodlinja' readonly><br>
                    
                        <h4 id="status1"> <?php echo $status['status1']; ?> </h4>
                    </div></div>
                    <div class="modal-footer">
                    
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> LUKK </button>
                        <button type="submit" name="updatedata3" class="btn btn-info">SEND</button>
                        <!-- <button type="submit" name="deletedata" class="btn btn-primary"> Yes !! Delete it. </button> -->
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- EDIT POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> SETT PÅ VENT / RETURNER TIL SELGER</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="update_endrestatus2.php" method="POST">

                    <div class="modal-body"><div class="container box">
                    
                    <div class="row " >
                    
                            <div class="col-md-2" >
                                <label> Ordre Nr </label>
                                <input type="num" name="ordrenr2" id="ordrenr2" placeholder="Ordre Nr" readonly>
                            </div>     
                            <div class="col-md-2" >
                                <label> Kunde Nr </label>
                                <input type="num" name="kundenr" id="kundenr2" placeholder="Kunde nr" readonly>
                            </div>  

                            <div class="col-md-3" >
                                <label> Kunde Navn </label>
                                <input type="num" name="kundenavn" id="kundenavn2" placeholder="Kunde Navn" readonly>
                            </div>

                           
                    </div>
                        
                    <div class="row" >
                            <div class="col-md-2" >
                            <label> Selger </label>
                            <input type="text" name="selger" id="selger" placeholder="Selger" autocomplete="OFF" readonly>
                            </div>
                            <div class="col-md-10" >
                            <label> Kommentar til produksjon </label>
                            <input type="text" name="kommentartilproduksjon" id="kommentartilproduksjon" placeholder="Kommentar til produksjon" autocomplete="OFF">
                            </div>
                    
                       </div>
                       </div>

                        <div class="container box">
                        <div class="form-group">
                        <label>Endre Status / sette ordren på vent</label><br>
                        <select name="status2" id="status2" class="form-control">
                            <option value="Satt på vent">Sett ordre på vent - Mangler deler</option>
                            <option value="Sendt Produksjon">Deler mottatt - klar for å sendes til linje</option>
                            <option value="Ubehandlet">Ubehandlet - Sende tilbake til selger</option>
                            
                        </select>
                            </div>
                     <div class="form-group">
                            <label> Kommentar til endring </label>
                            <input type="text" name="kommentartilendring" id="kommentartilendring" placeholder="Kommentar til endring" autocomplete="OFF">
                            </div>
                            <div class="form-group">
                            <label> Dato for endring</label>
                            <input type="text" name="datoendringstatus" id="datoendringstatus" value="<?php echo $date; ?>" >
                            </div>
                    </div>

                      

                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Lukk</button>
                        <button type="submit" name="updatedataendring" class="btn btn-primary">Oppdater ordre</button>
                    </div></div>
                </form>

            </div>
        </div>
    </div>

    <!-- DELETE POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> SLETT ORDREN! </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="deletecode.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="delete_id" id="delete_id">

                        <h4> Ønsker du å slette denne ordren?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> NEI </button>
                        <button type="submit" name="deletedata" class="btn btn-primary"> JA !! SLETT ORDREN!. </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    </div>

    <div class="container-fluid">
                <h2>UBEHANDLEDE ORDRER - TRONDHEIM</h2>
            </div>
         
                    <?php
               include_once('../conn.php'); 

                $query = "SELECT * FROM ordre where (avdeling = 2) AND (status='Sendt Produksjon') or (avdeling = 2) AND (status ='Satt på vent') ORDER BY `ordre`.`ekspress` ASC, `ordre`.`spesial` ASC, `ordre`.`datosendtprod` ASC";
                $query_run = mysqli_query($connection, $query);
                $ordrenr = $row["ordrenr"];
               

            ?> 
            
            
            <div class="container-fluid">
           
                    <table id="datatableid" class="table table-bordered table-striped" >
                    <div class="container-fluid">
                        <thead >
                            <tr class="bg-dark text-white">
                            <th>Ordre&nbsp;Nr</th>
                            <th>Kunde&nbsp;Nr</th>
                            <th>Kunde&nbsp;Navn</th>
                         
                            <th>Selger</th>
                            <th>Leveringskode</th>
                            <th>Spesial</th>
                            <th>Bestilt&nbsp;Spesial&nbsp;Glass</th>
                            <th>Ekspress</th>
                            <th>Trondheim</th>
                            <th>Kommentar&nbsp;til&nbsp;ordre</th>
                            <th>Kommentar&nbsp;til&nbsp;prod</th>
                            <th>Kommentar&nbsp;til&nbsp;endring</th>
                            <th>Ordre&nbsp;Vedlegg</th>
                            <th>Ordre&nbsp;Status</th>
                            <th>Dato&nbsp;Sendt</th>
                            <th>Send</th>
                            <th>Rediger</th>
                            
                            </tr>
                        </thead>
                        <?php
                if($query_run)
                {
                    foreach($query_run as $row)
                    {
            ?>
            
         


                        <tbody class="tbody1">
                            <tr><center>
                                <td> <center><?php echo $row['ordrenr']; ?> </center></td>
                                <td><center> <?php echo $row['kundenr']; ?></center> </td>
                                <td><center> <?php echo $row['kundenavn']; ?> </center></td>
                            
                                <td><center> <?php echo $row['selger']; ?> </center></td>
                                <td> <center><?php echo $row['leveringskode']; ?> </center></td>
                               
                                
                                <?php 
                                // ENDRER FARGEN HVOR DET ER JA PÅ SPESIAL ORDRE
                                if($row['spesial'] == 'JA'){
                                    echo '<td bgcolor="#606060"><center><button class="btn-sm btn-info spesialbtn" >Bestill</button></center></td>';
                                }else{
                                    echo '<td><center>'.$row['spesial'].'</td></center>';
                                 
                                }
                                // ENDRER FARGEN HVOR DET ER JA PÅ EKSPRESS ORDRE
                                ?>

                                <td> <center><?php echo $row['datosendtbestillingspesial']; ?> </center></td>
                                 
                                 <?php 
                                if($row['ekspress'] == 'JA'){
                                    echo '<td bgcolor=#ff0000><center>'.$row['ekspress'].'</center></td>';
                                }else{
                                    echo '<td><center>'.$row['ekspress'].'</center></td>';
                                 
                                }
                              // ENDRER FARGEN HVOR DET ER JA PÅ TRONDHEIM ORDRE
                                 ?>
                                 <?php 
                                if($row['trondheim'] == 'JA'){
                                    echo '<td bgcolor=#00FF00><center>'.$row['trondheim'].'</center></td>';
                                }else{
                                    echo '<td><center>'.$row['trondheim'].'</center></td>';
                                 
                                }
                                ?>
                                <td> <center><?php echo $row['kommentartilordre']; ?></center> </td>
                                <td> <center><?php echo $row['kommentartilproduksjon']; ?> </center></td>
                                <td> <center><?php echo $row['kommentartilendring']; ?> </center></td>
                                <td><center><a href="ordremappe/<?php echo $row['ordrenr'] ?>.pdf" target="new">Last ned</a></center></td>
                                <?php if($row['status'] == 'Satt på vent'){
                                    echo '<td bgcolor=#606060><center><font size="1px" color="#ffffff">'  .$row['status']. '</td></font></center>';
                                } else{
                                    echo '<td><center><font size="1px">'  .$row['status']. '</td></font></center>';
                                }
?>
                                
                                <?php
                                $date = date('Y-m-d');
                                $dato1 = date_create($row['datosendtprod']);
                                $dato2 = date_create($date);
                                $diff = date_diff($dato2,$dato1);
                                $dager = 28;
                                $dager2 = 21;
                                if(($diff->format('%a')) >= $dager){
                                    echo '<td bgcolor="red"> <center>'.$row['datosendtprod'].' </center></td>';
                                }elseif(($diff->format('%a')) >= $dager2){
                                    echo '<td bgcolor="yellow"> <center>'.$row['datosendtprod'].' </center></td>';
                                }
                                else{
                                    echo '<td> <center>'.$row['datosendtprod'].' </center></td>';
                                }
                               
                                ?>
                           
                            
                                <td><center><button type="button" class="btn-info btn-sm edit2btn"> Send </button></td></center>
                                <td><center><button type="button" class=" btn-info btn-sm editbtn"> Endre </button></td></center>
                              
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



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function () {

            $('.edit2btn').on('click', function () {
                $('#viewmodal').modal('show');
                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#ordrenr1').val(data[0]);
                $('#kundenr1').val(data[1]);
                $('#kundenavn1').val(data[2]);
                $('#status1').val(data[13]);
         
            });

        });
    </script>
    <script>
        $(document).ready(function () {

            $('.spesialbtn').on('click', function () {
                $('#spesialmodal').modal('show');
                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#ordrenr').val(data[0]);
                $('#kundenr').val(data[1]);
                $('#kundenavn').val(data[2]);
                $('#status').val(data[13]);
         
            });

        });
    </script>
  <script>
        $(document).ready(function () {

            $('.editbtn').on('click', function () {

                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#ordrenr2').val(data[0]);
                $('#kundenr2').val(data[1]);
                $('#kundenavn2').val(data[2]);
                $('#kundetelefon2').val(data[3]);
                $('#kundeepost2').val(data[4]);
                $('#selger').val(data[3]);
                $('#leveringskode2').val(data[7]);
                $('#forskuddbetalt2').val(data[8]);
                $('#forskuddfaktura2').val(data[9]);
                $('#trondheim2').val(data[10]);
                $('#spesial2').val(data[11]);
                $('#ekspress2').val(data[12]);
                $('#kommentartilproduksjon').val(data[10]);
                $('#kommentartilendring').val(data[11]);
                
            });
        });
    </script>

    <script>
        $(document).ready(function () {

            $('.deletebtn').on('click', function () {

                $('#deletemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);

            });
        });
    </script>

  


    <!-- SØKE FUNKSJON <script>
        $(document).ready(function () {

            $('#datatableid').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Søk etter ordre",
                }
            });

        });
    </script> -->
</body>
</html>