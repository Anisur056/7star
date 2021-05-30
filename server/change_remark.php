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
    $data_entry_date = $put_data_to_form['data_entry_date'];
    $remark = $put_data_to_form['remark'];
    $last_edited_by = $put_data_to_form['last_edited_by'];
    $d_status = $put_data_to_form['d_status'];

  }

}



if(isset($_GET['update'])){

    $id = $_GET['id'];
    $remark = $_GET['remark'];

    $add_data = mysqli_query($connect_db,"UPDATE parcel_list SET remark='$remark',last_edited_by='$last_edited_by' WHERE id= $id");

}

?>


<!--------------MAIN PAGE INCLUD START----------------->
<div id="layoutSidenav_content">
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Change Parcel Remark </h1>
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

        <form action="change_remark.php" method="GET">


        <!--ROW START -->  
        <div class="form-group">
        <label for="exampleFormControlTextarea1">Example textarea</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="remark"><?php echo $remark;?></textarea>
        </div>
        <!--ROW END -->  

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