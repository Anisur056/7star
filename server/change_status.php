<?php session_start(); ?>
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

if(isset($_GET['id'])){

$id = $_GET['id'];

$take_data = mysqli_query($connect_db,"SELECT * FROM parcel_list WHERE id=$id");

  while($put_data_to_form = mysqli_fetch_array($take_data)){

    $id = $put_data_to_form['id'];
    $sl_no = $put_data_to_form['sl_no'];
    $party_name = $put_data_to_form['party_name'];
    $air_bl_no = $put_data_to_form['air_bl_no'];
    $data_entry_date = $put_data_to_form['data_entry_date'];
    $office_entry_date = $put_data_to_form['office_entry_date'];
    $booking_date = $put_data_to_form['booking_date'];
    $delivered_date = $put_data_to_form['delivered_date'];
    $last_edited_by = $put_data_to_form['last_edited_by'];
    $remark = $put_data_to_form['remark'];
    $d_status = $put_data_to_form['d_status'];

  }

}



if(isset($_GET['update'])){

    $id = $_GET['id'];
    $d_status = $_GET['d_status'];


    if ($d_status === "OFFICE_IN") {
        $last_edited_by =  $_SESSION['full_name'];
        $office_entry_date = date("Y-m-d");
        $add_data = mysqli_query($connect_db,"UPDATE parcel_list SET d_status='$d_status',office_entry_date='$office_entry_date',last_edited_by='$last_edited_by' WHERE id= $id");
    }


    if ($d_status === "RUNNING_DELI") {
        $last_edited_by =  $_SESSION['full_name'];
        $booking_date = date("Y-m-d");
        $add_data = mysqli_query($connect_db,"UPDATE parcel_list SET d_status='$d_status',booking_date='$booking_date',last_edited_by='$last_edited_by' WHERE id= $id");
    }


    if ($d_status === "DELIVERED") {
        $last_edited_by =  $_SESSION['full_name'];
        $delivered_date = date("Y-m-d");
        $add_data = mysqli_query($connect_db,"UPDATE parcel_list SET d_status='$d_status',delivered_date='$delivered_date',last_edited_by='$last_edited_by' WHERE id= $id");
    }else{

        $last_edited_by =  $_SESSION['full_name'];
        $add_data = mysqli_query($connect_db,"UPDATE parcel_list SET d_status='$d_status',last_edited_by='$last_edited_by' WHERE id= $id");
    }



}

?>


<!--------------MAIN PAGE INCLUD START----------------->
<div id="layoutSidenav_content">
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Change Parcel Status</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Change Your Parcel Status Quickly.</li>
        </ol>

        <p class="text-right" style="font-weight: bold;">Added In : <?php echo $data_entry_date;?></p>

        <table class="table" width="100%">
        <tr class="d-flex">
        <th class="col-6">Parcel CN Number : </th>
        <td class="col-6"><?php echo $id;?></td>
        </tr>

        <tr class="d-flex">
        <th class="col-6">Parcel Referance Number :</th>
        <td class="col-6"><?php echo $sl_no;?></td>
        </tr>

        <tr class="d-flex">
        <th class="col-6">Party Name :</th>
        <td class="col-6"><?php echo $party_name;?></td>
        </tr>

        <tr class="d-flex">
        <th class="col-6">Air BL Number :</th>
        <td class="col-6"><?php echo $air_bl_no;?></td>
        </tr>

        <tr class="d-flex">
        <th class="col-6">Office Enter Date :</th>
        <td class="col-6"><?php echo $office_entry_date;?></td>
        </tr>


        <tr class="d-flex">
        <th class="col-6">Booking Date :</th>
        <td class="col-6"><?php echo $booking_date;?></td>
        </tr>


        <tr class="d-flex">
        <th class="col-6">Delivered Date :</th>
        <td class="col-6"><?php echo $delivered_date;?></td>
        </tr>        

        <tr class="d-flex">
        <th class="col-6">Last Edited By :</th>
        <td class="col-6"><?php echo $last_edited_by;?></td>
        </tr>        

        <tr class="d-flex">
        <th class="col-6">Delivery Status : </th>
        <td class="col-6"><?php echo $d_status;?></td>
        </tr>        


        <tr class="d-flex">
        <th class="col-6">Remark : </th>
        <td class="col-6"><?php echo $remark;?><?php echo '<a class="btn btn-link" href="change_remark.php?id='.$id.'">Edit</a>'?></td>
        </tr> 


        </table>

        <form action="change_status.php" method="GET">

        <div class="form-group col-md-4">
        <select class="form-control" name="d_status">
        <option value="NOT_IN"<?php if($d_status=="NOT_IN") echo 'selected="selected"'; ?>>RUNNING_SHIPMENT/NOT_IN</option>
        <option value="OFFICE_IN"<?php if($d_status=="OFFICE_IN") echo 'selected="selected"'; ?>>OFFICE_IN</option>
        <option value="HOLD"<?php if($d_status=="HOLD") echo 'selected="selected"'; ?>>HOLD</option>
        <option value="RUNNING_DELI"<?php if($d_status=="RUNNING_DELI") echo 'selected="selected"'; ?>>RUNNING_DELI/ BOOKING DATE</option>
        <option value="DELIVERED"<?php if($d_status=="DELIVERED") echo 'selected="selected"'; ?>>DELIVERED</option>
        <option value="FAILED"<?php if($d_status=="FAILED") echo 'selected="selected"'; ?>>FAILED</option>
        <option value="EXTRA"<?php if($d_status=="EXTRA") echo 'selected="selected"'; ?>>EXTRA</option>
        <option value="LOT"<?php if($d_status=="LOT") echo 'selected="selected"'; ?>>LOT</option>

        
        </select>
        </div>

        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">


        <div class="form-group col-md-4">
        <input type="submit" name="update" class="form-control" value="Update">
        </div>






        </form>

    </div>
</main>
<!--------------MAIN PAGE INCLUD ENDS----------------->




<!--------------FOOTER PAGE INCLUD START----------------->

<?php include "include/footer.php"; ?>

<!--------------FOOTER PAGE INCLUD ENDS----------------->