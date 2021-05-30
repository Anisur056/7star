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


<!--------------INCLUDE CONFIG FILE----------------->
<?php include("config.php"); ?>
<!--------------INCLUDE CONFIG FILE ENDS----------------->


<?php

if(isset($_POST['add_data']))
{

$party_name = $_POST['party_name'];
$shipment = $_POST['shipment'];
$air_bl_no = $_POST['air_bl_no'];
$lot_no = $_POST['lot_no'];
$b_status = $_POST['b_status'];
$d_status = $_POST['d_status'];
$sl_no = $_POST['sl_no'];
$pis = $_POST['pis'];
$name = $_POST['name'];
$address = $_POST['address'];
$number = $_POST['number'];
$kg = $_POST['kg'];
$remark = $_POST['remark'];
$data_entry_date = date("Y-m-d");

/*$sql = "INSERT INTO parcel_list (`party_name`,`shipment`,`air_bl_no`,`lot_no`,`b_status`,`d_status`,`sl_no`,`pis`,`name`,`address`,`number`,`kg`,`remark`) 
VALUES ('$party_name','$shipment','$air_bl_no','$lot_no','$b_status','$d_status','$sl_no','$pis','$name','$address','$number','$kg',$data_entry_date','$remark')";*/

$sql = "INSERT INTO parcel_list (party_name,shipment,air_bl_no,lot_no,b_status,d_status,sl_no,pis,name,address,number,kg,data_entry_date,remark)
VALUES ('$party_name','$shipment','$air_bl_no','$lot_no','$b_status','$d_status','$sl_no','$pis','$name','$address','$number','$kg','$data_entry_date','$remark')";


$add_data = mysqli_query($connect_db,$sql);

if($add_data)
{
echo "<div id=\"layoutSidenav_content\">";
echo "<main>";
echo "<div class=\"container-fluid\">";
echo "<h1 class=\"mt-4\">";
echo "<div class=\"alert alert-success\" role=\"alert\"> Parcel Data Import Successfully. Go to Home Page <a href=\"index.php\">HOME</a></div>";
echo "</h1>";
echo "</main>";
}
else
{
echo "<div id=\"layoutSidenav_content\">";
echo "<main>";
echo "<div class=\"container-fluid\">";
echo "<h1 class=\"mt-4\">";
echo "<div class=\"alert alert-danger\" role=\"alert\"> Failed to Add Parcel. Go to Home Page <a href=\"index.php\">HOME</a> </div>";
echo "</h1>";
echo "</main>";
}



}else{ ?>

<!--------------MAIN PAGE INCLUD START----------------->
<div id="layoutSidenav_content">

<main>

<div class="container-fluid">

<form method="POST" action="add_data.php">

<h1 class="mt-4">Add Parcel Information</h1>

<?php /*INCLUDE PARTY LIST SELECTION*/
include("party_list_selection.php");
?>

<div class="form-group">
<label for="formGroupExampleInput2">Select Shipment Number</label>
<input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Shipment" name="shipment">
</div>

<div class="form-group">
<label for="formGroupExampleInput3">Select Lot Number</label>
<input type="text" class="form-control" placeholder="Lot" name="lot_no">
</div>

<!--ROW START -->  
<div class="form-group">
<label for="formGroupExampleInput3">AIR BILL NO</label>
<input type="text" class="form-control" name="air_bl_no" placeholder="BILL NO">
</div>
<!--ROW END -->  

<!--ROW START -->
<div class="form-group">

  <label for="fname">BOOKING STATUS</label>

  <select class="custom-select my-1 mr-sm-2" name="b_status">
    <option>----- PLEASE SELECT BOOKING STATUS----</option>
    <option value="ARJ">ARJ</option>
    <option value="CTG">CTG</option>
    <option value="CUMILLA">CUMILLA</option>
    <option value="FENI">FENI</option>
    <option value="N.K">N.K</option>
    <option value="S.B">S.B</option>
    <option value="SANDWIP">SANDWIP</option>
  </select>

</div>
<!--ROW END --> 

<!--ROW START -->
<div class="form-group">
<label for="country">DELIVERY STATUS</label>
<select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="d_status">
<option>---- PLEASE SELECT DELIVERY STATUS ----</option>
<option value="NOT_IN">RUNNING SHIPMENT/ NOT_IN</option>
<option value="OFFICE_IN">OFFICE_IN</option>
<option value="RUNNING_DELI">RUNNING_DELI</option>
<option value="DELIVERED">DELIVERED</option>
<option value="FAILED">FAILED</option>
<option value="HOLD">HOLD</option>
</select>
</div>
<!--ROW END -->  

<!--ROW START -->  
<div class="form-group">
<label for="fname">SL NO</label>
<input type="text" class="form-control" id="fname" name="sl_no" placeholder="SL">
</div>
<!--ROW END -->  

<!--ROW START -->  
<div class="form-group">
<label for="fname">QUANTITY</label>
<input type="text" class="form-control" id="fname" name="pis" placeholder="pis">
</div>
<!--ROW END -->  

<!--ROW START -->  
<div class="form-group">
<label for="fname">RECEIVER NAME</label>
<input type="text" class="form-control" id="fname" name="name" placeholder="Name">
</div>
<!--ROW END -->  

<!--ROW START -->  
<div class="form-group">
<label for="fname">RECEIVER ADDRESS</label>
<input type="text" class="form-control" id="fname" name="address" placeholder="Address">
</div>
<!--ROW END -->  

<!--ROW START -->  
<div class="form-group">
<label for="fname">RECEIVER NUMBER</label>
<input type="text" class="form-control" id="fname" name="number" placeholder="Number">
</div>
<!--ROW END -->  

<!--ROW START -->  
<div class="form-group">
<label for="fname">PARCEL WEIGHT</label>
<input type="text" class="form-control" id="fname" name="kg" placeholder="Weight">
</div>
<!--ROW END -->  

<!--ROW START -->  
<div class="form-group">
<label for="exampleFormControlTextarea1">Example textarea</label>
<textarea class="form-control" id="exampleFormControlTextarea1" name="remark"></textarea>
</div>
<!--ROW END -->  


<div class="form-group">
<input type="submit" name="add_data" class="btn btn-primary" value="Add Parcel">
</div>

</form>

</main>

<!--------------MAIN PAGE INCLUD ENDS----------------->

<?php } ?>

<!--------------FOOTER PAGE INCLUD START----------------->

<?php include "include/footer.php"; ?>

<!--------------FOOTER PAGE INCLUD ENDS----------------->

<?php }else{ header('location: login.php'); } ?>