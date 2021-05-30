<?php session_start(); ?>
<?php if (isset($_SESSION['id']) && isset($_SESSION['full_name'])) { 

                    if((time()-$_SESSION['login_time'])>600)
                    {
                        header("location: login.php?logout=true");
                    }
                    else
                    {
                        $_SESSION['login_time'] = time();
                    }

    ?>
<!--------------HEADER PAGE INCLUD START----------------->
<?php    
        if(file_exists("config.php")){
        include("config.php");
        }else{
        header("location:install.php");
        }
?>
<!--------------HEADER PAGE INCLUD ENDS----------------->



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

if(isset($_POST['submit'])){

    $party_name = $_POST['party_name'];

    $sql="SELECT * FROM parcel_list WHERE party_name = '$party_name' ORDER BY id DESC";

    $show_data=mysqli_query($connect_db,$sql);

    $count = mysqli_num_rows($show_data);
}

?>


<!--------------MAIN PAGE INCLUD START----------------->
<div id="layoutSidenav_content">
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Party Parcel List</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Search All Party Parcel List</li>
        </ol>
      




                        
                        <form action="party_parcel_list.php" method="POST">

                        <div class="form-row">

                        <div class="form-group col-md-4">
                        <select class="form-control form-control-lg" name="party_name">
                            <option value="0">----- PLEASE SELECT A PARTY NAME ------</option>
                            <option value="ALOM_VAI">ALOM VAI</option>
                            <option value="ARIF_VAI">ARIF VAI</option>
                            <option value="BABLU_VAI">BABLU_VAI</option>
                            <option value="GRAM_BANGLA">GRAM_BANGLA</option>
                            <option value="IMAM_VAI">IMAM_VAI</option>
                            <option value="IMAM_VAI_B_R_B_CARGO">IMAM_VAI_B_R_B_CARGO</option>
                            <option value="IMAM_VAI_BANGLADESH_CARGO">IMAM_VAI_BANGLADESH_CARGO</option>
                            <option value="IMAM_VAI_JOHIR">IMAM_VAI_JOHIR</option>
                            <option value="IMAM_VAI_JOSHIM">IMAM_VAI_JOSHIM</option>
                            <option value="IMAM_VAI_MAINUDDIN">IMAM_VAI_MAINUDDIN</option>
                            <option value="IMAM_VAI_NATIONAL_CARGO">IMAM_VAI_NATIONAL_CARGO</option>
                            <option value="IMAM_VAI_ROHUL_CARGO">IMAM_VAI_ROHUL_CARGO</option>
                            <option value="IMAM_VAI_SUNMOON">IMAM_VAI_SUNMOON</option>
                            <option value="JOHIR_MAMA">JOHIR_MAMA</option>
                            <option value="MODEL_CARGO">MODEL_CARGO</option>
                            <option value="PINTU_VAI">PINTU_VAI</option>
                            <option value="PINTU_VAI_AL_TALA">PINTU_VAI_AL_TALA</option>
                            <option value="PINTU_VAI_KUWAIT">PINTU_VAI_KUWAIT</option>
                            <option value="SAIF_VAI">SAIF_VAI</option>
                            <option value="SHIBLU_VAI">SHIBLU_VAI</option>
                            <option value="SHOHID_VAI">SHOHID_VAI</option>
                            <option value="STAR_PERFECT_CARGO">STAR_PERFECT_CARGO</option>
                            <option value="WASHIM_VAI">WASHIM_VAI</option>
                            <option value="YASIN_VAI">YASIN_VAI</option>
                        </select>
                        </div>


                        <div class="form-group col-md-2">
                        <input type="submit" name="submit" class="form-control form-control-lg" value="Show">
                        </div>


                        </div>

                        </form>
                       


<?php if(isset($_POST['submit'])){

        echo '
        <h1 class="mt-4">Search Result OF :  '.$party_name.' & About '.$count.' Result Found.</h1>
                       <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>CN Number</th>
                                <th>Party Name</th>
                                <th>Shipment</th>
                                <th>AIR BILL NUMBER</th>
                                <th>Booking Status</th>
                                <th>Delivery Status</th>
                                <th>Referance No.</th>
                                <th>Pis</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Number</th>
                                <th>KG</th>
                                <th>OFFICE ENTER DATE</th>
                                <th>BOOKING DATE</th>
                                <th>DELIVERY DATE</th>
                                <th>REMARK</th>
                                <th>Last Edited By</th>
                                <th>Change Status</th>
                                <th>Update Info</th>
                            </tr>
                        </thead>
                        <tbody>';
                               
                                        while($all_data = mysqli_fetch_array($show_data)){

                                        $id = $all_data['id'];
                                        $party_name = $all_data['party_name'];
                                        $shipment = $all_data['shipment'];
                                        $air_bl_no = $all_data['air_bl_no'];
                                        $b_status = $all_data['b_status'];
                                        $d_status = $all_data['d_status'];
                                        $sl_no = $all_data['sl_no'];
                                        $pis = $all_data['pis'];
                                        $name = $all_data['name'];
                                        $address = $all_data['address'];
                                        $number = $all_data['number'];
                                        $data_entry_date = $all_data['data_entry_date'];
                                        $office_entry_date = $all_data['office_entry_date'];
                                        $booking_date = $all_data['booking_date'];
                                        $delivered_date = $all_data['delivered_date'];
                                        $remark = $all_data['remark'];
                                        $last_edited_by = $all_data['last_edited_by'];
                                        $kg = $all_data['kg'];

                                        if ($d_status == 'NOT_IN') {
                                            echo '<tr class="bg-light text-dark">';
                                        }elseif ($d_status == 'OFFICE_IN') {
                                            echo '<tr class="bg-primary text-white">';
                                        }elseif ($d_status == 'HOLD') {
                                            echo '<tr class="bg-warning text-white">';
                                        }elseif ($d_status == 'RUNNING_DELI') {
                                            echo '<tr class="bg-info text-white">';
                                        }elseif ($d_status == 'DELIVERED') {
                                            echo '<tr class="bg-success text-white">';
                                        }elseif ($d_status == 'FAILED') {
                                            echo '<tr class="bg-danger text-white">';
                                        }elseif ($d_status == 'EXTRA') {
                                            echo '<tr class="text-white bg-dark">';
                                        }elseif ($d_status == 'LOT') {
                                            echo '<tr class="bg-secondary text-white">';
                                        }

                                        

                                        echo '<td>'.$id.'</td>'.
                                        '<td>'.$party_name.'</td>'.
                                        '<td>'.$shipment.'</td>'.
                                        '<td>'.$air_bl_no.'</td>'.
                                        '<td>'.$b_status.'</td>'.
                                        '<td>'.$d_status.'</td>'.
                                        '<td>'.$sl_no.'</td>'.
                                        '<td>'.$pis.'</td>'.
                                        '<td>'.$name.'</td>'.
                                        '<td>'.$address.'</td>'.
                                        '<td>'.$number.'</td>'.
                                        '<td>'.$kg.'</td>'.
                                        '<td>'.$office_entry_date.'</td>'.
                                        '<td>'.$booking_date.'</td>'.
                                        '<td>'.$delivered_date.'</td>'.
                                        '<td>'.$remark.'</td>'.
                                        '<td>'.$last_edited_by.'</td>'.
                                        '<td><a href="change_status.php?id='.$id.'">Change</a></td>'.
                                        '<td><a href="update_info.php?id=$id">Edit</a></td></tr>';
                                        }

                                
                        echo '</tbody>
                    </table>
                </div>
            </div>';

}?>


    </div>
</main>
<!--------------MAIN PAGE INCLUD ENDS----------------->




<!--------------FOOTER PAGE INCLUD START----------------->

<?php include "include/footer.php"; ?>

<!--------------FOOTER PAGE INCLUD ENDS----------------->

<?php }else{ header('location: login.php'); } ?>