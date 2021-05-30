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

if(isset($_GET['search'])){

    $search = $_GET['search'];
    $show_data = mysqli_query($connect_db,"SELECT * FROM parcel_list WHERE d_status = '$search' ORDER BY id DESC");
    $search_count =  mysqli_num_rows($show_data);

}

if(isset($_GET['track'])){

    if (!empty($_GET['search_text'])) {

        $search_text = $_GET['search_text'];
        $search_by = $_GET['search_by'];
        $search = $search_text;
        $show_data = mysqli_query($connect_db, "SELECT * FROM parcel_list WHERE $search_by LIKE '%$search_text%' ORDER BY id DESC");
        $search_count =  mysqli_num_rows($show_data);
    }else{
        $search = "Last 10 Result";
        $show_data = mysqli_query($connect_db, "SELECT * FROM parcel_list ORDER BY id DESC LIMIT 10");
        $search_count =  mysqli_num_rows($show_data);
    }

}

if(isset($_GET['party_name'])){
    $search = $_GET['party_name'];
    $party_name = $_GET['party_name'];
    $show_data = mysqli_query($connect_db,"SELECT * FROM parcel_list WHERE party_name = '$party_name' ORDER BY shipment DESC");
    $search_count =  mysqli_num_rows($show_data);
}


if(isset($_GET['b_status'])){
    $search = $_GET['b_status'];
    $b_status = $_GET['b_status'];
    $show_data = mysqli_query($connect_db,"SELECT * FROM parcel_list WHERE b_status = '$b_status' ORDER BY id DESC");
    $search_count =  mysqli_num_rows($show_data);
}

?>


<!--------------MAIN PAGE INCLUD START----------------->
<div id="layoutSidenav_content">
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Delivery Status Report</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">All Parcel Report : <?php echo $search; ?> & Result Return : <?php echo $search_count; ?></li>
        </ol>

                <div class="table-responsive">
                    <table class="table table-bordered table-sm" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>CN Number</th>
                                <th>Delivery Status</th>
                                <th>Booking Status</th>
                                <th>Referance No.</th>
                                <th>Parcel Quantity</th>
                                <th>Parcel Weight(Kg)</th>
                                <th>Party Name</th>
                                <th>Shipment</th>
                                <th>AIR BILL Number</th>
                                <th>REMARK</th>
                                <th>Details</th>
                                <th>Update</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                        while($all_data = mysqli_fetch_array($show_data)){

                                        $id = $all_data['id'];
                                        $d_status = $all_data['d_status'];
                                        $b_status = $all_data['b_status'];
                                        $sl_no = $all_data['sl_no'];
                                        $pis = $all_data['pis'];
                                        $kg = $all_data['kg'];
                                        $party_name = $all_data['party_name'];
                                        $shipment = $all_data['shipment'];
                                        $air_bl_no = $all_data['air_bl_no'];
                                        $remark = $all_data['remark'];


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

                                        echo "<td>".$id."</td>".
                                        "<td>".$d_status."</td>".
                                        "<td>".$b_status."</td>".
                                        "<td>".$sl_no."</td>".
                                        "<td>".$pis."</td>".
                                        "<td>".$kg."</td>".
                                        "<td>".$party_name."</td>".
                                        "<td>".$shipment."</td>".
                                        "<td>".$air_bl_no."</td>".
                                        "<td>".$remark."</td>".
                                        "<td><a class=\"btn btn-dark\"href=\"view_details.php?id=$id\">Details</a></td>".
                                        "<td><a class=\"btn btn-dark\"href=\"update_info.php?id=$id\">Update</a></td></tr>";
                                        }

                                ?>
                        </tbody>
                    </table>
                </div>
    </div>
</main>
<!--------------MAIN PAGE INCLUD ENDS----------------->




<!--------------FOOTER PAGE INCLUD START----------------->

<?php include "include/footer.php"; ?>

<!--------------FOOTER PAGE INCLUD ENDS----------------->

<?php }else{ header('location: login.php'); } ?>
