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


<?php

// GET ID AND SHOW DATA TO TABDE INPUT ......................................
if (isset($_GET['id'])) {

$id = $_GET['id'];
$show_data = mysqli_query($connect_db,"SELECT * FROM parcel_list WHERE id = '$id'");
while($all_data = mysqli_fetch_array($show_data)){
$id = $all_data['id'];
$b_status = $all_data['b_status'];
$d_status = $all_data['d_status'];
$sl_no = $all_data['sl_no'];
$pis = $all_data['pis'];
$name = $all_data['name'];
$address = $all_data['address'];
$number = $all_data['number'];
$kg = $all_data['kg'];
$air_bl_no = $all_data['air_bl_no'];
$lot_no = $all_data['lot_no'];
$shipment = $all_data['shipment'];
$party_name = $all_data['party_name'];
$sb_cn_no = $all_data['sb_cn_no'];
$data_entry_date = $all_data['data_entry_date'];
$office_entry_date = $all_data['office_entry_date'];
$booking_date = $all_data['booking_date'];
$delivered_date = $all_data['delivered_date'];
$phone_called = $all_data['phone_called'];
$last_edited_by = $all_data['last_edited_by'];
$remark = $all_data['remark'];
}
}
// GET ID AND SHOW DATA TO TABDE INPUT ......................................


?>


<!--------------HEADER PAGE INCLUD START----------------->
<?php include "include/header.php"; ?>
<!--------------HEADER PAGE INCLUD ENDS----------------->



<!--------------TOP_NAVIGATION PAGE INCLUD START----------------->
<?php include "include/top_nav.php"; ?>
<!--------------TOP_NAVIGATION PAGE INCLUD ENDS----------------->



<!--------------SIDE_NAVIGATION PAGE INCLUD START----------------->
<?php include "include/side_nav.php"; ?>
<!--------------SIDE_NAVIGATION PAGE INCLUD ENDS----------------->


<!--------------MAIN PAGE INCLUD START----------------->
<div id="layoutSidenav_content">

<main>
<div class="container-fluid">

    <h1 class="mt-4">Parcel Information Details</h1>

    <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Parcel Information Details. This Parce Information Added In :<b> <?php echo $data_entry_date; ?></b></li>
    </ol>

        <div class="table-responsive">
            <div style="padding-bottom: 15px;" class="float-right"><a class="btn bg-primary text-white" href="update_info.php?id=<?php echo $id; ?>">Edit_Info</a></div>

            <table class="table table-bordered table-striped table-highlight">
            <tr>
            <th>CN Number</th>
            <td><?php echo $id; ?></td>
            </tr>
            <tr>
            <th>Booking Status</th>
            <td><?php echo $b_status; ?></td>
            </tr>
            <tr>
            <th>Delivery Status</th>
            <td><?php echo $d_status; ?></td>
            </tr>
            <tr>
            <th>Party Refer Number</th>
            <td><?php echo $sl_no; ?></td>
            </tr>
            <tr>
            <th>Parce Quantity</th>
            <td><?php echo $pis; ?></td>
            </tr>
            <tr>
            <th>Receiver Name</th>
            <td><?php echo $name; ?></td>
            </tr>
            <tr>
            <th>Receiver Address</th>
            <td><?php echo $address; ?></td>
            </tr>
            <tr>
            <th>Receiver Number</th>
            <td><?php echo $number; ?></td>
            </tr>
            <tr>
            <th>Parcel Weight</th>
            <td><?php echo $kg; ?></td>
            </tr>
            <tr>
            <th>Airways Bill Number</th>
            <td><?php echo $air_bl_no; ?></td>
            </tr>
            <tr>
            <th>Lot Number</th>
            <td><?php echo $lot_no; ?></td>
            </tr>
            <tr>
            <th>Shipment Number</th>
            <td><?php echo $shipment; ?></td>
            </tr>
            <tr>
            <th>Party Name</th>
            <td><?php echo $party_name; ?></td>
            </tr>
            <tr>
            <th>Sundorban CN Number</th>
            <td><?php echo $sb_cn_no; ?></td>
            </tr>
            <tr>
            <th>Office Entry Date</th>
            <td><?php echo $office_entry_date; ?></td>
            </tr>
            <tr>
            <th>Booking Date</th>
            <td><?php echo $booking_date; ?></td>
            </tr>
            <tr>
            <th>Delivery Date</th>
            <td><?php echo $delivered_date; ?></td>
            </tr>
            <tr>
            <th>Phone Called</th>
            <td><?php echo $phone_called; ?></td>
            </tr>
            <tr>
            <th>Remark</th>
            <td><?php echo $remark; ?></td>
            </tr>
            <tr>
            <th>Last Edited By</th>
            <td><?php echo $last_edited_by; ?></td>
            </tr>
            </table>
        </div>
    </form>

</div>
</main>
<!--------------MAIN PAGE INCLUD ENDS----------------->




<!--------------FOOTER PAGE INCLUD START----------------->

<?php include "include/footer.php"; ?>

<!--------------FOOTER PAGE INCLUD ENDS----------------->

<?php }else{ header('location: login.php'); } ?>