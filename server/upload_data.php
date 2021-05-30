<?php session_start(); ?>
<?php if (isset($_SESSION['id']) && isset($_SESSION['full_name'])) { ?>

<!--------------HEADER PAGE INCLUD START----------------->
<?php include "include/header.php"; ?>
<!--------------HEADER PAGE INCLUD ENDS----------------->



<!--------------TOP_NAVIGATION PAGE INCLUD START----------------->
<?php include "include/top_nav.php"; ?>
<!--------------TOP_NAVIGATION PAGE INCLUD ENDS----------------->



<!--------------SIDE_NAVIGATION PAGE INCLUD START----------------->
<?php include "include/side_nav.php"; ?>
<!--------------SIDE_NAVIGATION PAGE INCLUD ENDS----------------->

<?php
        include("config.php");
?>


<?php

if(isset($_POST["upload_btn"]))
{

          $file = $_FILES['file']['tmp_name'];
          $handle = fopen($file, "r");

          
          $party_name = $_POST['party_name'];
          $shipment = $_POST['shipment'];
          $lot_no = $_POST['lot_no'];
          $data_entry_date = date("Y-m-d");


          $c = 0;
          while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
                    {
          $b_status = $filesop[0];
          $d_status = $filesop[1];
          $sl_no = $filesop[2];
          $pis = $filesop[3];
          $name = $filesop[4];
          $address = $filesop[5];
          $number = $filesop[6];
          $kg = $filesop[7];
          $air_bl_no = $filesop[8];



          $sql = "insert into parcel_list(b_status,d_status,sl_no,pis,name,address,number,kg,air_bl_no,lot_no,shipment,party_name,data_entry_date) values ('$b_status','$d_status','$sl_no','$pis','$name','$address','$number','$kg','$air_bl_no','$lot_no','$shipment','$party_name','$data_entry_date')";

          $stmt = mysqli_prepare($connect_db,$sql);
          mysqli_stmt_execute($stmt);

            $c = $c + 1;

            }

            if($sql)
            {



            echo "<div id=\"layoutSidenav_content\">";
            echo "<main>";
            echo "<div class=\"container-fluid\">";
            echo "<h1 class=\"mt-4\">";
            echo "<div class=\"alert alert-success\" role=\"alert\"> Parcel Data Import Successfully. Go to Home Page <a href=\"index.php\">HOME</a> </div>";
            echo "</h1>";
            echo "</main>";




            } 
            else
            {
            echo "Sorry! Unable to impo.";
            }

}else{

?>



<!--------------MAIN PAGE INCLUD START----------------->
<div id="layoutSidenav_content">
          <main>

          <div class="container-fluid">

                <form enctype="multipart/form-data" method="POST" action="upload_data.php">

                <h1 class="mt-4">Upload Parcel Information</h1>

                    <?php
                    /*INCLUDE PARTY LIST SELECTION*/
                            include("party_list_selection.php");
                    ?>

                    <div class="form-group">
                      <label for="formGroupExampleInput2">Select Shipment Number</label>
                      <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Shipment" name="shipment">
                    </div>

                    <div class="form-group">
                      <label for="formGroupExampleInput3">Select Lot Number</label>
                      <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Lot" name="lot_no">
                    </div>

                    <div class="form-group">
                      <label for="formGroupExampleInput4">Choose CSV File Only</label>

                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="file">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                      </div>
                    </div>

                    <div class="form-group">
                    <input type="submit" name="upload_btn" class="btn btn-primary" value="Upload CSV Data">
                    </div>

                </form>




          </main>
<!--------------MAIN PAGE INCLUD ENDS----------------->

<?php } ?>


<!--------------FOOTER PAGE INCLUD START----------------->

<?php include "include/footer.php"; ?>

<!--------------FOOTER PAGE INCLUD ENDS----------------->

<?php }else{ header('location: login.php'); } ?>