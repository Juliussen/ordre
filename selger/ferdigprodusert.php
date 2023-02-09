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

$firstname 	= $row['username'];
$lastname 	= $row['lname'];
$email 		= $row['email'];
$usertype 		= $row['usertype'];

include_once('../conn.php'); 
$query = "SELECT * FROM ordre where selger = '".$firstname."' and (status = 'Ubehandlet') or (status ='Faktura Betalt'";

$sql3 = "SELECT * FROM leveringskode";
    $all_categories3 = mysqli_query($mysqli,$sql3);
    $leveringskode = $_GET['leveringskode'];
   
$date = date('Y/m/d');

$datosendtprod = $row['datosendtprod'];

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
                            <input type="text" name="fname" class="form-control" placeholder="Enter First Name">
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

    <!-- SENDE TIL PROD POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="viewmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">MERK MOTTATT AVDELING</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="update_mottattavdeling.php" method="POST">

                    <div class="modal-body">
                    <div class="form-group">
                        <label> Ordre Nr </label><br>
                        <input type="num" name="ordrenr1" id="ordrenr1" placeholder="Ordre Nr" readonly><br>
                        <label> Kunde Nr</label><br>
                        <input type="num" name="kundenr" id="kundenr" placeholder="Kunde Nr" readonly>    <br>
                        <label> Leveringskode</label><br>
                        <input type="text" name="leveringskode" id="leveringskode" placeholder="Leveringskode" readonly>  
                    </div><br>
                            <label> Status blir endret til:</label><br>
                            <input type="text" name="status" value="Mottatt avdeling" 	readonly>
                            <input type='text' value="<?php echo $date; ?>" id='datomottattavd' name='datomottattavd' readonly><br>
                    
                              

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> LUKK </button>
                        <button type="submit" name="updatedata2" class="btn btn-primary">MOTTATT</button>
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
                    <h5 class="modal-title" id="exampleModalLabel"> ENDRE ORDRE </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="updatecode.php" method="POST">

                    <div class="modal-body">
                    <div class="form-group">
                        <label> Ordre Nr </label>
                        <input type="num" name="ordrenr" id="ordrenr" placeholder="Ordre Nr" >
                            </div>     
                            <div class="form-group">
                            <label> Kunde Nr </label>
                            <input type="num" name="kundenr" id="kundenr" placeholder="Kunde nr" >
                            </div>  

                            <div class="form-group">
                            <label> Kunde Navn </label>
                            <input type="text" name="kundenavn" id="kundenavn" placeholder="Kunde Navn" >
                            </div>

                        <div class="form-group">
                            <label> Kunde Telefon </label>
                            <input type="num" name="kundetelefon" id="kundetelefon"
                                placeholder="Kunde Telefon">
                        </div>

                        <div class="form-group">

<!-- LEVERINGSKODE VELGER START -------------------------------------------------------->
                             <label for="leveringskode">leveringskode</label>
            <select name="leveringskode"  class="form-control" required>
                
                    <?php
                    while ($leveringskode = mysqli_fetch_array(
                    $all_categories3, MYSQLI_ASSOC)):;
                    ?>
                        <option value="<?php echo $leveringskode["leveringskode"];
                        ?>">
                            <?php echo $leveringskode["leveringskode"];
                            ?>
                        </option>
                    <?php
                        endwhile;
                    ?>

                    </select>    
                        </div>
                   
<!-- LEVERINGSKODE VELGER SLUTT -------------------------------------------------------->
                        <div class="form-group">
                            <label for="forskuddbetalt">Forskudd Betalt?:</label><br>
                            <input type="checkbox" name="forskuddbetalt" id="forskuddbetalt" placeholder="Forskudd faktura?" value="JA" >
                        </div>
                        <div class="form-group">
                             <label for="forskuddfaktura">Sende Forskudd Faktura?:</label><br>
                            <input type='hidden' value="NEI" name="forskuddfaktura"> 
                            <input type="checkbox" name="forskuddfaktura"  id="forskuddfaktura"  placeholder="Forskudd faktura?" value="JA">
                        </div>
                        <div class="form-group">
                            <label for="trondheim">Plater ifra Trondheim:</label><br>
                            <input type='hidden' value="NEI" name="trondheim">
                            <input type="checkbox" name="trondheim" id="trondheim" placeholder="Forskudd faktura?" value="JA">
                        </div>
                        <div class="form-group">
                            <label for="spesial">Spesial ordre ?</label><br>
                            <input type='hidden' value="NEI" name="spesial">
                            <input type="checkbox" name="spesial" id="spesial" placeholder="Spesial ordre?" value="JA">
                        </div>
                        <div class="form-group">
                            <label for="ekspress">Ekspress ordre ?</label><br>
                            <input type='hidden' value="NEI" name="ekspress">
                            <input type="checkbox" name="ekspress" id="ekspress" placeholder="Ekspress" value="JA">
                        </div>

                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Lukk</button>
                        <button type="submit" name="updatedata" class="btn btn-primary">Oppdater ordre</button>
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



    
    <div class="container-fluid" align="right"></div>
           
    <h2>FERDIG PRODUSERT<br><font size="3px">(Ordrer som er ferdig produsert)</font></h2>
            
         
    
    </div>
         

            

                    <?php
               include_once('../conn.php');

                $query = "SELECT * FROM ordre where selger = '".$firstname."' and (status = 'Ferdig Produsert')  ORDER BY `datosendtprod` ASC";
                $query_run = mysqli_query($connection, $query);
                $ordrenr = $row["ordrenr"];
                $ordrenr1 = $row["ordrenr1"];
            ?> 
            <div class="container-fluid">
            
            
           
                    <table id="datatableid" class="table table-bordered table-striped" >
                    <div class="container-fluid">
                        <thead >
                            <tr class="bg-dark text-white">
                            <th>Ordre&nbsp;Nr</th>
                            <th>Kunde&nbsp;Nr</th>
                            <th>Kunde&nbsp;Navn</th>
                            <th>Kunde&nbsp;Tlf</th>
                            <th>Kunde&nbsp;Epost</th>
                            <th>Selger</th>
                            <th>Leveringskode</th>
                           
                            <th>Forskudd</th>
                           
                            <th>Spesial</th>
                            <th>Ekspress</th>
                            <th>Trondheim</th>
                            <th>Kommentar&nbsp;til&nbsp;ordre</th>
                            <th>Kommentar&nbsp;til&nbsp;prod</th>
                            
                            <th>Ordre&nbsp;Status</th>
                            <th>Dato&nbsp;Sendt</th>
                            <th>Ordre&nbsp;Vedlegg</th>
                            
                            <th>Videresend</th>
                            <th>Endre</th>
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
                            <td> <center><font size=3><a href="<?php echo $baseurl; ?>/ordreinfo.php?ordreinfo=<?php echo $row['ordrenr'] ?>"><?php echo $row['ordrenr']; ?> </a></center></td></div></font>
                                <td><center> <?php echo $row['kundenr']; ?></center> </td>
                                <td><center> <?php echo $row['kundenavn']; ?> </center></td>
                                <td> <center><?php echo $row['kundetelefon']; ?></center> </td>
                                <td> <center><?php echo $row['kundeepost']; ?></center> </td>
                                <td><center> <?php echo $row['selger']; ?> </center></td>
                                <td> <center><?php echo $row['leveringskode']; ?> </center></td>
                                <td> <center><?php echo $row['forskudd']; ?> </center></td>
                               
                                <td><center> <?php echo $row['spesial']; ?> </center></td>
                                <td><center> <?php echo $row['ekspress']; ?> </center></td>
                                <td> <center><?php echo $row['trondheim']; ?> </center></td>
                                <td> <center><?php echo $row['kommentartilordre']; ?></center> </td>
                                <td> <center><?php echo $row['kommentartilprod']; ?> </center></td>
                              
                                <td><center> <?php echo $row['status']; ?> </td>
                                <td> <center><?php echo $row['datosendtprod']; ?> </center></td>
                                <?php if($row['ordrevedlegg'] == 0){ 
                                    echo '<td>Mangler Vedlegg</td>';
                                    }else{
                                    echo '<td> <a href="'.$baseurl.'ordremappe/'.$row['ordrenr'].'.pdf" target="new">Se vedlegg</a></td>';
                                } ?>
                                <td><center><button type="button" class="btn btn-info btn-sm edit2btn">Mottak</button></td></center>
                                <td><center><button type="button" class="btn btn-info btn-sm editbtn"> Endre</button></td></center>
                                
                                
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
<script src="js/jquery.dataTables.min.js"></script>
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
            $('#kundenr').val(data[1]);
            $('#leveringskode1').val(data[6]);
            
           
         
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

            $('#ordrenr').val(data[0]);
            $('#kundenr').val(data[1]);
            $('#kundenavn').val(data[2]);
            $('#kundetelefon').val(data[3]);
            $('#kundeepost').val(data[4]);
            $('#leveringskode').val(data[7]);
            $('#forskuddbetalt').val(data[8]);
            $('#forskuddfaktura').val(data[9]);
            $('#trondheim').val(data[10]);
            $('#spesial').val(data[11]);
            $('#ekspress').val(data[12]);
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

            $('#ordrenr2').val(data[0]);

        });
    });
</script>



<!---
<script>
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