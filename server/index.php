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


<!--------------MAIN PAGE INCLUD START----------------->
<div id="layoutSidenav_content">
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Delivery Report</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Search All Information</li>
        </ol>

    <form action="search.php" method="GET">

    <div class="form-row">

    <div class="form-group col-md-6">
    <input type="text" class="form-control form-control-lg" name="search_text" placeholder="Search......">
    </div>

    <div class="form-group col-md-4">
    <select class="form-control form-control-lg" name="search_by">
    <option value="sl_no">By Refer Number</option>
    <option value="id">By CN Number</option>
    <option value="b_status">By Booking Status</option>
    <option value="air_bl_no">By Air BL Number</option>
    <option value="sb_cn_no">By S.B CN NUMBER</option>
    <option value="number">By Mobile Number</option>
    </select>
    </div>

    <div class="form-group col-md-2">
    <input type="submit" name="track" class="form-control form-control-lg" value="Track">
    </div>


    </div>

    </form>

        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Delivey Status Catagory</li>
        </ol>

        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-light text-dark mb-4">

                    <!----------------PHP CODE STARTS---------------->
                        <?php
                        
                        $sql="SELECT d_status FROM parcel_list WHERE d_status = 'NOT_IN'";

                        if ($result=mysqli_query($connect_db,$sql))
                        {
                        $not_in_result =  mysqli_num_rows($result);
                        }

                        ?>           
                    <!----------------PHP CODE ENDS---------------->

                    <div class="card-body">
                        <?php echo "<h3>".$not_in_result."</h3>"; ?>
                        
                        <h4>Running Shipment/ Not In</h4>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-dark stretched-link" href="<?php echo "search.php?search=NOT_IN"; ?>">View Details</a>
                        <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">

                    <!----------------PHP CODE STARTS---------------->
                        <?php
                        
                        $sql="SELECT d_status FROM parcel_list WHERE d_status = 'OFFICE_IN'";

                        if ($result=mysqli_query($connect_db,$sql))
                        {
                        $office_in_result =  mysqli_num_rows($result);
                        }

                        ?>           
                    <!----------------PHP CODE ENDS---------------->

                    <div class="card-body">
                        <?php echo "<h3>".$office_in_result."</h3>"; ?>
                        
                        <h4>Office IN</h4>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="<?php echo "search.php?search=OFFICE_IN"; ?>">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">

                    <!----------------PHP CODE STARTS---------------->
                        <?php
                        
                        $sql="SELECT d_status FROM parcel_list WHERE d_status = 'HOLD'";

                        if ($result=mysqli_query($connect_db,$sql))
                        {
                        $hold_result =  mysqli_num_rows($result);
                        }

                        ?>           
                    <!----------------PHP CODE ENDS---------------->

                    <div class="card-body">
                        <?php echo "<h3>".$hold_result."</h3>"; ?>

                        <h4>Hold Parcel</h4>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="<?php echo "search.php?search=HOLD"; ?>">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-info text-white mb-4">

                    <!----------------PHP CODE STARTS---------------->
                        <?php
                        
                        $sql="SELECT d_status FROM parcel_list WHERE d_status = 'RUNNING_DELI'";

                        if ($result=mysqli_query($connect_db,$sql))
                        {
                        $running_deli_result =  mysqli_num_rows($result);
                        }

                        ?>           
                    <!----------------PHP CODE ENDS---------------->

                    <div class="card-body">
                        <?php echo "<h3>".$running_deli_result."</h3>"; ?>

                        <h4>Running Delivery</h4>

                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="<?php echo "search.php?search=RUNNING_DELI"; ?>">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">

                    <!----------------PHP CODE STARTS---------------->
                        <?php
                        
                        $sql="SELECT d_status FROM parcel_list WHERE d_status = 'DELIVERED'";

                        if ($result=mysqli_query($connect_db,$sql))
                        {
                        $delivered_result =  mysqli_num_rows($result);
                        }

                        ?>           
                    <!----------------PHP CODE ENDS---------------->

                    <div class="card-body">
                        <?php echo "<h3>".$delivered_result."</h3>"; ?>

                        <h4>Delivered</h4>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="<?php echo "search.php?search=DELIVERED"; ?>">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">

                    <!----------------PHP CODE STARTS---------------->
                        <?php
                        
                        $sql="SELECT d_status FROM parcel_list WHERE d_status = 'FAILED'";

                        if ($result=mysqli_query($connect_db,$sql))
                        {
                        $failed_result =  mysqli_num_rows($result);
                        }

                        ?>           
                    <!----------------PHP CODE ENDS---------------->

                    <div class="card-body">
                        <?php echo "<h3>".$failed_result."</h3>"; ?>

                        <h4>Delivery Failed</h4>

                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="<?php echo "search.php?search=FAILED"; ?>">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card text-white bg-dark mb-4">

                    <!----------------PHP CODE STARTS---------------->
                        <?php
                        
                        $sql="SELECT d_status FROM parcel_list WHERE d_status = 'EXTRA'";

                        if ($result=mysqli_query($connect_db,$sql))
                        {
                        $extra_result =  mysqli_num_rows($result);
                        }

                        ?>           
                    <!----------------PHP CODE ENDS---------------->

                    <div class="card-body">
                        <?php echo "<h3>".$extra_result."</h3>"; ?>

                        <h4>Extra Parcel</h4>

                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="<?php echo "search.php?search=EXTRA"; ?>">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>

        </div>
<!----------------------------------------------------------------------------------------------------------------------------  -->



        <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">BOOKING STATUS CATAGORY LIST</li>
        </ol>
        
        <div class="row">
            <!-- Pary Parcel list Star -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-info text-white mb-4">

                    <!----------------PHP CODE STARTS---------------->
                        <?php
                        
                        $sql="SELECT b_status FROM parcel_list WHERE b_status = 'DHAKA_LOT'";

                        if ($result=mysqli_query($connect_db,$sql))
                        {
                        $b_status_result =  mysqli_num_rows($result);
                        }

                        ?>           
                    <!----------------PHP CODE ENDS---------------->

                    <div class="card-body">
                        <?php echo "<h3>".$b_status_result."</h3>"; ?>
                        
                        <h4>DHAKA_LOT</h4>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="<?php echo "search.php?b_status=DHAKA_LOT"; ?>">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <!-- Pary Parcel list Star -->

            <!-- Pary Parcel list Star -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-info text-white mb-4">

                    <!----------------PHP CODE STARTS---------------->
                        <?php
                        
                        $sql="SELECT b_status FROM parcel_list WHERE b_status = 'CTG'";

                        if ($result=mysqli_query($connect_db,$sql))
                        {
                        $b_status_result =  mysqli_num_rows($result);
                        }

                        ?>           
                    <!----------------PHP CODE ENDS---------------->

                    <div class="card-body">
                        <?php echo "<h3>".$b_status_result."</h3>"; ?>
                        
                        <h4>CTG</h4>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="<?php echo "search.php?b_status=CTG"; ?>">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <!-- Pary Parcel list Star -->

            <!-- Pary Parcel list Star -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-info text-white mb-4">

                    <!----------------PHP CODE STARTS---------------->
                        <?php
                        
                        $sql="SELECT b_status FROM parcel_list WHERE b_status = 'CUMILLA'";

                        if ($result=mysqli_query($connect_db,$sql))
                        {
                        $b_status_result =  mysqli_num_rows($result);
                        }

                        ?>           
                    <!----------------PHP CODE ENDS---------------->

                    <div class="card-body">
                        <?php echo "<h3>".$b_status_result."</h3>"; ?>
                        
                        <h4>CUMILLA</h4>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="<?php echo "search.php?b_status=CUMILLA"; ?>">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <!-- Pary Parcel list Star -->

            <!-- Pary Parcel list Star -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-info text-white mb-4">

                    <!----------------PHP CODE STARTS---------------->
                        <?php
                        
                        $sql="SELECT b_status FROM parcel_list WHERE b_status = 'FENI'";

                        if ($result=mysqli_query($connect_db,$sql))
                        {
                        $b_status_result =  mysqli_num_rows($result);
                        }

                        ?>           
                    <!----------------PHP CODE ENDS---------------->

                    <div class="card-body">
                        <?php echo "<h3>".$b_status_result."</h3>"; ?>
                        
                        <h4>FENI</h4>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="<?php echo "search.php?b_status=FENI"; ?>">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <!-- Pary Parcel list Star -->

            <!-- Pary Parcel list Star -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-info text-white mb-4">

                    <!----------------PHP CODE STARTS---------------->
                        <?php
                        
                        $sql="SELECT b_status FROM parcel_list WHERE b_status = 'N.K'";

                        if ($result=mysqli_query($connect_db,$sql))
                        {
                        $b_status_result =  mysqli_num_rows($result);
                        }

                        ?>           
                    <!----------------PHP CODE ENDS---------------->

                    <div class="card-body">
                        <?php echo "<h3>".$b_status_result."</h3>"; ?>
                        
                        <h4>N.K</h4>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="<?php echo "search.php?b_status=N.K"; ?>">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <!-- Pary Parcel list Star -->

            <!-- Pary Parcel list Star -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-info text-white mb-4">

                    <!----------------PHP CODE STARTS---------------->
                        <?php
                        
                        $sql="SELECT b_status FROM parcel_list WHERE b_status = 'S.B'";

                        if ($result=mysqli_query($connect_db,$sql))
                        {
                        $b_status_result =  mysqli_num_rows($result);
                        }

                        ?>           
                    <!----------------PHP CODE ENDS---------------->

                    <div class="card-body">
                        <?php echo "<h3>".$b_status_result."</h3>"; ?>
                        
                        <h4>S.B</h4>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="<?php echo "search.php?b_status=S.B"; ?>">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <!-- Pary Parcel list Star -->

            <!-- Pary Parcel list Star -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-info text-white mb-4">

                    <!----------------PHP CODE STARTS---------------->
                        <?php
                        
                        $sql="SELECT b_status FROM parcel_list WHERE b_status = 'SANDWIP'";

                        if ($result=mysqli_query($connect_db,$sql))
                        {
                        $b_status_result =  mysqli_num_rows($result);
                        }

                        ?>           
                    <!----------------PHP CODE ENDS---------------->

                    <div class="card-body">
                        <?php echo "<h3>".$b_status_result."</h3>"; ?>
                        
                        <h4>SANDWIP</h4>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="<?php echo "search.php?b_status=SANDWIP"; ?>">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <!-- Pary Parcel list Star -->

        </div>


<!----------------------------------------------------------------------------------------------------------------------------  -->

        <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Party Parcel Catagory List</li>
        </ol>

        <div class="row">
            <!-- Pary Parcel list Star -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-light text-dark mb-4">

                    <!----------------PHP CODE STARTS---------------->
                        <?php
                        
                        $sql="SELECT party_name FROM parcel_list WHERE party_name = 'ALOM_VAI'";

                        if ($result=mysqli_query($connect_db,$sql))
                        {
                        $party_result =  mysqli_num_rows($result);
                        }

                        ?>           
                    <!----------------PHP CODE ENDS---------------->

                    <div class="card-body">
                        <?php echo "<h3>".$party_result."</h3>"; ?>
                        
                        <h4>ALOM_VAI</h4>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-dark stretched-link" href="<?php echo "search.php?party_name=ALOM_VAI"; ?>">View Details</a>
                        <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <!-- Pary Parcel list Star -->

            <!-- Pary Parcel list Star -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-light text-dark mb-4">

                    <!----------------PHP CODE STARTS---------------->
                        <?php
                        
                        $sql="SELECT party_name FROM parcel_list WHERE party_name = 'ARIF_VAI'";

                        if ($result=mysqli_query($connect_db,$sql))
                        {
                        $party_result =  mysqli_num_rows($result);
                        }

                        ?>           
                    <!----------------PHP CODE ENDS---------------->

                    <div class="card-body">
                        <?php echo "<h3>".$party_result."</h3>"; ?>
                        
                        <h4>ARIF_VAI</h4>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-dark stretched-link" href="<?php echo "search.php?party_name=ARIF_VAI"; ?>">View Details</a>
                        <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <!-- Pary Parcel list Star -->

            <!-- Pary Parcel list Star -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-light text-dark mb-4">

                    <!----------------PHP CODE STARTS---------------->
                        <?php
                        
                        $sql="SELECT party_name FROM parcel_list WHERE party_name = 'BABLU_VAI'";

                        if ($result=mysqli_query($connect_db,$sql))
                        {
                        $party_result =  mysqli_num_rows($result);
                        }

                        ?>           
                    <!----------------PHP CODE ENDS---------------->

                    <div class="card-body">
                        <?php echo "<h3>".$party_result."</h3>"; ?>
                        
                        <h4>BABLU_VAI</h4>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-dark stretched-link" href="<?php echo "search.php?party_name=BABLU_VAI"; ?>">View Details</a>
                        <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <!-- Pary Parcel list Star -->

            <!-- Pary Parcel list Star -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-light text-dark mb-4">

                    <!----------------PHP CODE STARTS---------------->
                        <?php
                        
                        $sql="SELECT party_name FROM parcel_list WHERE party_name = 'GRAM_BANGLA'";

                        if ($result=mysqli_query($connect_db,$sql))
                        {
                        $party_result =  mysqli_num_rows($result);
                        }

                        ?>           
                    <!----------------PHP CODE ENDS---------------->

                    <div class="card-body">
                        <?php echo "<h3>".$party_result."</h3>"; ?>
                        
                        <h4>GRAM_BANGLA</h4>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-dark stretched-link" href="<?php echo "search.php?party_name=GRAM_BANGLA"; ?>">View Details</a>
                        <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <!-- Pary Parcel list Star -->

            <!-- Pary Parcel list Star -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-light text-dark mb-4">

                    <!----------------PHP CODE STARTS---------------->
                        <?php
                        
                        $sql="SELECT party_name FROM parcel_list WHERE party_name = 'IMAM_VAI'";

                        if ($result=mysqli_query($connect_db,$sql))
                        {
                        $party_result =  mysqli_num_rows($result);
                        }

                        ?>           
                    <!----------------PHP CODE ENDS---------------->

                    <div class="card-body">
                        <?php echo "<h3>".$party_result."</h3>"; ?>
                        
                        <h4>IMAM_VAI</h4>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-dark stretched-link" href="<?php echo "search.php?party_name=IMAM_VAI"; ?>">View Details</a>
                        <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <!-- Pary Parcel list Star -->

            <!-- Pary Parcel list Star -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-light text-dark mb-4">

                    <!----------------PHP CODE STARTS---------------->
                        <?php
                        
                        $sql="SELECT party_name FROM parcel_list WHERE party_name = 'IMAM_VAI_B_R_B_CARGO'";

                        if ($result=mysqli_query($connect_db,$sql))
                        {
                        $party_result =  mysqli_num_rows($result);
                        }

                        ?>           
                    <!----------------PHP CODE ENDS---------------->

                    <div class="card-body">
                        <?php echo "<h3>".$party_result."</h3>"; ?>
                        
                        <h4>IMAM_VAI_B_R_B_CARGO</h4>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-dark stretched-link" href="<?php echo "search.php?party_name=IMAM_VAI_B_R_B_CARGO"; ?>">View Details</a>
                        <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <!-- Pary Parcel list Star -->

            <!-- Pary Parcel list Star -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-light text-dark mb-4">

                    <!----------------PHP CODE STARTS---------------->
                        <?php
                        
                        $sql="SELECT party_name FROM parcel_list WHERE party_name = 'IMAM_VAI_BANGLADESH_CARGO'";

                        if ($result=mysqli_query($connect_db,$sql))
                        {
                        $party_result =  mysqli_num_rows($result);
                        }

                        ?>           
                    <!----------------PHP CODE ENDS---------------->

                    <div class="card-body">
                        <?php echo "<h3>".$party_result."</h3>"; ?>
                        
                        <h4>IMAM_VAI_BANGLADESH_CARGO</h4>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-dark stretched-link" href="<?php echo "search.php?party_name=IMAM_VAI_BANGLADESH_CARGO"; ?>">View Details</a>
                        <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <!-- Pary Parcel list Star -->

            <!-- Pary Parcel list Star -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-light text-dark mb-4">

                    <!----------------PHP CODE STARTS---------------->
                        <?php
                        
                        $sql="SELECT party_name FROM parcel_list WHERE party_name = 'IMAM_VAI_JOHIR'";

                        if ($result=mysqli_query($connect_db,$sql))
                        {
                        $party_result =  mysqli_num_rows($result);
                        }

                        ?>           
                    <!----------------PHP CODE ENDS---------------->

                    <div class="card-body">
                        <?php echo "<h3>".$party_result."</h3>"; ?>
                        
                        <h4>IMAM_VAI_JOHIR</h4>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-dark stretched-link" href="<?php echo "search.php?party_name=IMAM_VAI_JOHIR"; ?>">View Details</a>
                        <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <!-- Pary Parcel list Star -->

            <!-- Pary Parcel list Star -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-light text-dark mb-4">

                    <!----------------PHP CODE STARTS---------------->
                        <?php
                        
                        $sql="SELECT party_name FROM parcel_list WHERE party_name = 'IMAM_VAI_JOSHIM'";

                        if ($result=mysqli_query($connect_db,$sql))
                        {
                        $party_result =  mysqli_num_rows($result);
                        }

                        ?>           
                    <!----------------PHP CODE ENDS---------------->

                    <div class="card-body">
                        <?php echo "<h3>".$party_result."</h3>"; ?>
                        
                        <h4>IMAM_VAI_JOSHIM</h4>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-dark stretched-link" href="<?php echo "search.php?party_name=IMAM_VAI_JOSHIM"; ?>">View Details</a>
                        <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <!-- Pary Parcel list Star -->

            <!-- Pary Parcel list Star -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-light text-dark mb-4">

                    <!----------------PHP CODE STARTS---------------->
                        <?php
                        
                        $sql="SELECT party_name FROM parcel_list WHERE party_name = 'IMAM_VAI_MAINUDDIN'";

                        if ($result=mysqli_query($connect_db,$sql))
                        {
                        $party_result =  mysqli_num_rows($result);
                        }

                        ?>           
                    <!----------------PHP CODE ENDS---------------->

                    <div class="card-body">
                        <?php echo "<h3>".$party_result."</h3>"; ?>
                        
                        <h4>IMAM_VAI_MAINUDDIN</h4>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-dark stretched-link" href="<?php echo "search.php?party_name=IMAM_VAI_MAINUDDIN"; ?>">View Details</a>
                        <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <!-- Pary Parcel list Star -->

            <!-- Pary Parcel list Star -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-light text-dark mb-4">

                    <!----------------PHP CODE STARTS---------------->
                        <?php
                        
                        $sql="SELECT party_name FROM parcel_list WHERE party_name = 'IMAM_VAI_NATIONAL_CARGO'";

                        if ($result=mysqli_query($connect_db,$sql))
                        {
                        $party_result =  mysqli_num_rows($result);
                        }

                        ?>           
                    <!----------------PHP CODE ENDS---------------->

                    <div class="card-body">
                        <?php echo "<h3>".$party_result."</h3>"; ?>
                        
                        <h4>IMAM_VAI_NATIONAL_CARGO</h4>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-dark stretched-link" href="<?php echo "search.php?party_name=IMAM_VAI_NATIONAL_CARGO"; ?>">View Details</a>
                        <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <!-- Pary Parcel list Star -->

            <!-- Pary Parcel list Star -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-light text-dark mb-4">

                    <!----------------PHP CODE STARTS---------------->
                        <?php
                        
                        $sql="SELECT party_name FROM parcel_list WHERE party_name = 'IMAM_VAI_ROHUL_CARGO'";

                        if ($result=mysqli_query($connect_db,$sql))
                        {
                        $party_result =  mysqli_num_rows($result);
                        }

                        ?>           
                    <!----------------PHP CODE ENDS---------------->

                    <div class="card-body">
                        <?php echo "<h3>".$party_result."</h3>"; ?>
                        
                        <h4>IMAM_VAI_ROHUL_CARGO</h4>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-dark stretched-link" href="<?php echo "search.php?party_name=IMAM_VAI_ROHUL_CARGO"; ?>">View Details</a>
                        <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <!-- Pary Parcel list Star -->

            <!-- Pary Parcel list Star -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-light text-dark mb-4">

                    <!----------------PHP CODE STARTS---------------->
                        <?php
                        
                        $sql="SELECT party_name FROM parcel_list WHERE party_name = 'IMAM_VAI_SUNMOON'";

                        if ($result=mysqli_query($connect_db,$sql))
                        {
                        $party_result =  mysqli_num_rows($result);
                        }

                        ?>           
                    <!----------------PHP CODE ENDS---------------->

                    <div class="card-body">
                        <?php echo "<h3>".$party_result."</h3>"; ?>
                        
                        <h4>IMAM_VAI_SUNMOON</h4>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-dark stretched-link" href="<?php echo "search.php?party_name=IMAM_VAI_SUNMOON"; ?>">View Details</a>
                        <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <!-- Pary Parcel list Star -->

            <!-- Pary Parcel list Star -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-light text-dark mb-4">

                    <!----------------PHP CODE STARTS---------------->
                        <?php
                        
                        $sql="SELECT party_name FROM parcel_list WHERE party_name = 'JOHIR_MAMA'";

                        if ($result=mysqli_query($connect_db,$sql))
                        {
                        $party_result =  mysqli_num_rows($result);
                        }

                        ?>           
                    <!----------------PHP CODE ENDS---------------->

                    <div class="card-body">
                        <?php echo "<h3>".$party_result."</h3>"; ?>
                        
                        <h4>JOHIR_MAMA</h4>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-dark stretched-link" href="<?php echo "search.php?party_name=JOHIR_MAMA"; ?>">View Details</a>
                        <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <!-- Pary Parcel list Star -->

            <!-- Pary Parcel list Star -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-light text-dark mb-4">

                    <!----------------PHP CODE STARTS---------------->
                        <?php
                        
                        $sql="SELECT party_name FROM parcel_list WHERE party_name = 'MODEL_CARGO'";

                        if ($result=mysqli_query($connect_db,$sql))
                        {
                        $party_result =  mysqli_num_rows($result);
                        }

                        ?>           
                    <!----------------PHP CODE ENDS---------------->

                    <div class="card-body">
                        <?php echo "<h3>".$party_result."</h3>"; ?>
                        
                        <h4>MODEL_CARGO</h4>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-dark stretched-link" href="<?php echo "search.php?party_name=MODEL_CARGO"; ?>">View Details</a>
                        <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <!-- Pary Parcel list Star -->

            <!-- Pary Parcel list Star -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-light text-dark mb-4">

                    <!----------------PHP CODE STARTS---------------->
                        <?php
                        
                        $sql="SELECT party_name FROM parcel_list WHERE party_name = 'PINTU_VAI'";

                        if ($result=mysqli_query($connect_db,$sql))
                        {
                        $party_result =  mysqli_num_rows($result);
                        }

                        ?>           
                    <!----------------PHP CODE ENDS---------------->

                    <div class="card-body">
                        <?php echo "<h3>".$party_result."</h3>"; ?>
                        
                        <h4>PINTU_VAI</h4>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-dark stretched-link" href="<?php echo "search.php?party_name=PINTU_VAI"; ?>">View Details</a>
                        <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <!-- Pary Parcel list Star -->

            <!-- Pary Parcel list Star -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-light text-dark mb-4">

                    <!----------------PHP CODE STARTS---------------->
                        <?php
                        
                        $sql="SELECT party_name FROM parcel_list WHERE party_name = 'PINTU_VAI_AL_TALA'";

                        if ($result=mysqli_query($connect_db,$sql))
                        {
                        $party_result =  mysqli_num_rows($result);
                        }

                        ?>           
                    <!----------------PHP CODE ENDS---------------->

                    <div class="card-body">
                        <?php echo "<h3>".$party_result."</h3>"; ?>
                        
                        <h4>PINTU_VAI_AL_TALA</h4>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-dark stretched-link" href="<?php echo "search.php?party_name=PINTU_VAI_AL_TALA"; ?>">View Details</a>
                        <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <!-- Pary Parcel list Star -->

            <!-- Pary Parcel list Star -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-light text-dark mb-4">

                    <!----------------PHP CODE STARTS---------------->
                        <?php
                        
                        $sql="SELECT party_name FROM parcel_list WHERE party_name = 'PINTU_VAI_KUWAIT'";

                        if ($result=mysqli_query($connect_db,$sql))
                        {
                        $party_result =  mysqli_num_rows($result);
                        }

                        ?>           
                    <!----------------PHP CODE ENDS---------------->

                    <div class="card-body">
                        <?php echo "<h3>".$party_result."</h3>"; ?>
                        
                        <h4>PINTU_VAI_KUWAIT</h4>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-dark stretched-link" href="<?php echo "search.php?party_name=PINTU_VAI_KUWAIT"; ?>">View Details</a>
                        <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <!-- Pary Parcel list Star -->

            <!-- Pary Parcel list Star -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-light text-dark mb-4">

                    <!----------------PHP CODE STARTS---------------->
                        <?php
                        
                        $sql="SELECT party_name FROM parcel_list WHERE party_name = 'SAIF_VAI'";

                        if ($result=mysqli_query($connect_db,$sql))
                        {
                        $party_result =  mysqli_num_rows($result);
                        }

                        ?>           
                    <!----------------PHP CODE ENDS---------------->

                    <div class="card-body">
                        <?php echo "<h3>".$party_result."</h3>"; ?>
                        
                        <h4>SAIF_VAI</h4>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-dark stretched-link" href="<?php echo "search.php?party_name=SAIF_VAI"; ?>">View Details</a>
                        <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <!-- Pary Parcel list Star -->

            <!-- Pary Parcel list Star -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-light text-dark mb-4">

                    <!----------------PHP CODE STARTS---------------->
                        <?php
                        
                        $sql="SELECT party_name FROM parcel_list WHERE party_name = 'SHIBLU_VAI'";

                        if ($result=mysqli_query($connect_db,$sql))
                        {
                        $party_result =  mysqli_num_rows($result);
                        }

                        ?>           
                    <!----------------PHP CODE ENDS---------------->

                    <div class="card-body">
                        <?php echo "<h3>".$party_result."</h3>"; ?>
                        
                        <h4>SHIBLU_VAI</h4>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-dark stretched-link" href="<?php echo "search.php?party_name=SHIBLU_VAI"; ?>">View Details</a>
                        <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <!-- Pary Parcel list Star -->

            <!-- Pary Parcel list Star -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-light text-dark mb-4">

                    <!----------------PHP CODE STARTS---------------->
                        <?php
                        
                        $sql="SELECT party_name FROM parcel_list WHERE party_name = 'SHOHID_VAI'";

                        if ($result=mysqli_query($connect_db,$sql))
                        {
                        $party_result =  mysqli_num_rows($result);
                        }

                        ?>           
                    <!----------------PHP CODE ENDS---------------->

                    <div class="card-body">
                        <?php echo "<h3>".$party_result."</h3>"; ?>
                        
                        <h4>SHOHID_VAI</h4>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-dark stretched-link" href="<?php echo "search.php?party_name=SHOHID_VAI"; ?>">View Details</a>
                        <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <!-- Pary Parcel list Star -->

            <!-- Pary Parcel list Star -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-light text-dark mb-4">

                    <!----------------PHP CODE STARTS---------------->
                        <?php
                        
                        $sql="SELECT party_name FROM parcel_list WHERE party_name = 'STAR_PERFECT_CARGO'";

                        if ($result=mysqli_query($connect_db,$sql))
                        {
                        $party_result =  mysqli_num_rows($result);
                        }

                        ?>           
                    <!----------------PHP CODE ENDS---------------->

                    <div class="card-body">
                        <?php echo "<h3>".$party_result."</h3>"; ?>
                        
                        <h4>STAR_PERFECT_CARGO</h4>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-dark stretched-link" href="<?php echo "search.php?party_name=STAR_PERFECT_CARGO"; ?>">View Details</a>
                        <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <!-- Pary Parcel list Star -->

            <!-- Pary Parcel list Star -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-light text-dark mb-4">

                    <!----------------PHP CODE STARTS---------------->
                        <?php
                        
                        $sql="SELECT party_name FROM parcel_list WHERE party_name = 'WASHIM_VAI'";

                        if ($result=mysqli_query($connect_db,$sql))
                        {
                        $party_result =  mysqli_num_rows($result);
                        }

                        ?>           
                    <!----------------PHP CODE ENDS---------------->

                    <div class="card-body">
                        <?php echo "<h3>".$party_result."</h3>"; ?>
                        
                        <h4>WASHIM_VAI</h4>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-dark stretched-link" href="<?php echo "search.php?party_name=WASHIM_VAI"; ?>">View Details</a>
                        <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <!-- Pary Parcel list Star -->

            <!-- Pary Parcel list Star -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-light text-dark mb-4">

                    <!----------------PHP CODE STARTS---------------->
                        <?php
                        
                        $sql="SELECT party_name FROM parcel_list WHERE party_name = 'YASIN_VAI'";

                        if ($result=mysqli_query($connect_db,$sql))
                        {
                        $party_result =  mysqli_num_rows($result);
                        }

                        ?>           
                    <!----------------PHP CODE ENDS---------------->

                    <div class="card-body">
                        <?php echo "<h3>".$party_result."</h3>"; ?>
                        
                        <h4>YASIN_VAI</h4>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-dark stretched-link" href="<?php echo "search.php?party_name=YASIN_VAI"; ?>">View Details</a>
                        <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <!-- Pary Parcel list Star -->

        </div>
    </div>
</main>
<!--------------MAIN PAGE INCLUD ENDS----------------->




<!--------------FOOTER PAGE INCLUD START----------------->

<?php include "include/footer.php"; ?>

<!--------------FOOTER PAGE INCLUD ENDS----------------->

<?php }else{ header('location: login.php'); } ?>