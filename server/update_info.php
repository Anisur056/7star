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



// GET DATAT FROM POST METHOD AND UPDATE DATA TO MYSQL .......................
if(isset($_POST['update'])){
$id = $_POST['id'];
$b_status = $_POST['b_status'];
$d_status = $_POST['d_status'];
$sl_no = $_POST['sl_no'];
$pis = $_POST['pis'];
$name = $_POST['name'];
$address = $_POST['address'];
$number = $_POST['number'];
$kg = $_POST['kg'];
$air_bl_no = $_POST['air_bl_no'];
$lot_no = $_POST['lot_no'];
$shipment = $_POST['shipment'];
$party_name = $_POST['party_name'];
$sb_cn_no = $_POST['sb_cn_no'];
$office_entry_date = $_POST['office_entry_date'];
$booking_date = $_POST['booking_date'];
$delivered_date = $_POST['delivered_date'];
$phone_called = $_POST['phone_called'];
$last_edited_by = $_POST['last_edited_by'];
$remark = $_POST['remark'];

$update_data = mysqli_query($connect_db,"UPDATE parcel_list SET 
`b_status`='$b_status', 
`d_status`='$d_status', 
`sl_no`='$sl_no', 
`pis`='$pis', 
`name`='$name', 
`address`='$address', 
`number`='$number', 
`kg`='$kg', 
`air_bl_no`='$air_bl_no', 
`lot_no`='$lot_no', 
`shipment`='$shipment', 
`party_name`='$party_name', 
`sb_cn_no`='$sb_cn_no', 
`office_entry_date`='$office_entry_date', 
`booking_date`='$booking_date', 
`delivered_date`='$delivered_date', 
`phone_called`='$phone_called', 
`last_edited_by`='$last_edited_by', 
`remark`='$remark'
WHERE `id`=$id");

if($update_data)
{
echo "PARCEL BOX ENTRY SUCCESSFULL";
header("location:update_info.php?id=$id");
}
else
{
echo "PARCEL BOX ENTRY FAILED";
}
}
// GET DATAT FROM POST METHOD AND UPDATE DATA TO MYSQL .......................

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

    <h1 class="mt-4">Update Parcel Info</h1>

    <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Edit Your Parcel Information. This Parce Information Added In :<b> <?php echo $data_entry_date; ?></b></li>
    </ol>

    <form class="form-horizontal" action="update_info.php" method="POST">
        <div class="table-responsive">
            <div style="padding-bottom: 15px;" class="float-right"><input type="submit" class="btn bg-primary text-white" value="Update" name="update" /></div>

            <table class="table table-bordered table-striped table-highlight">
            <tr>
            <th>CN Number</th>
            <td><?php echo $id; ?></td>
            <input type="hidden" name="id" value="<?php echo $id; ?>"/>
            </tr>
            <tr>
            <th>Booking Status</th>
            <td>
            <select class="form-control" name="b_status">
            <?php include'include/b_status_option_if.php'; ?>
            </select>
            </td>
            </tr>
            <tr>
            <th>Delivery Status</th>
            <td>
            <select class="form-control" name="d_status">
            <?php include'include/d_status_option_if.php'; ?>
            </select>
            </td>
            </tr>
            <tr>
            <th>Party Refer Number</th>
            <td><input type="text" class="form-control" name="sl_no" value="<?php echo $sl_no; ?>"/></td>
            </tr>
            <tr>
            <th>Parce Quantity</th>
            <td><input type="text" class="form-control" name="pis" value="<?php echo $pis; ?>"/></td>
            </tr>
            <tr>
            <th>Receiver Name</th>
            <td><input type="text" class="form-control" name="name" value="<?php echo $name; ?>"/></td>
            </tr>
            <tr>
            <th>Receiver Address</th>
            <td><input type="text" class="form-control" name="address" value="<?php echo $address; ?>"/></td>
            </tr>
            <tr>
            <th>Receiver Number</th>
            <td><input type="text" class="form-control" name="number" value="<?php echo $number; ?>"/></td>
            </tr>
            <tr>
            <th>Parcel Weight</th>
            <td><input type="text" class="form-control" name="kg" value="<?php echo $kg; ?>"/></td>
            </tr>
            <tr>
            <th>Airways Bill Number</th>
            <td><input type="text" class="form-control" name="air_bl_no" value="<?php echo $air_bl_no; ?>"/></td>
            </tr>
            <tr>
            <th>Lot Number</th>
            <td><input type="text" class="form-control" name="lot_no" value="<?php echo $lot_no; ?>"/></td>
            </tr>
            <tr>
            <th>Shipment Number</th>
            <td><input type="text" class="form-control" name="shipment" value="<?php echo $shipment; ?>"/></td>
            </tr>
            <tr>
            <th>Party Name</th>
            <td>
            <select class="form-control" name="party_name">
            <?php include'include/party_name_option_if.php'; ?>
            </select>
            </td>
            </tr>
            <tr>
            <th>Sundorban CN Number</th>
            <td><input type="text" class="form-control" name="sb_cn_no" value="<?php echo $sb_cn_no; ?>"/></td>
            </tr>
            <tr>
            <th>Office Entry Date</th>
            <td><input type="date" class="form-control" name="office_entry_date" value="<?php echo $office_entry_date; ?>"/></td>
            </tr>
            <tr>
            <th>Booking Date</th>
            <td><input type="date" class="form-control" name="booking_date" value="<?php echo $booking_date; ?>"/></td>
            </tr>
            <tr>
            <th>Delivery Date</th>
            <td><input type="date" class="form-control" name="delivered_date" value="<?php echo $delivered_date; ?>"/></td>
            </tr>
            <tr>
            <th>Phone Called</th>
            <td>
            <select class="form-control" name="phone_called">
            <option>-NO INFO-</option>
            <option value="YES" <?php if($phone_called=="YES") echo 'selected="selected"'; ?>>YES</option>
            <option value="NO" <?php if($phone_called=="NO") echo 'selected="selected"'; ?>>NO</option>
            </select>
            </td>
            </tr>
            <tr>
            <th>Remark</th>
            <td><textarea name="remark" class="form-control"><?php echo $remark; ?></textarea></td>
            </tr>
            <tr>
            <th>Last Edited By</th>
            <td><?php echo $last_edited_by; ?></td>
            <input type="hidden" name="last_edited_by" value="<?php echo $_SESSION['full_name']?>"/>
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