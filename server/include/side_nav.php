
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">


                        <div class="nav">


                            <div class="sb-sidenav-menu-heading">Main Page</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                Home
                            </a>



                            <div class="sb-sidenav-menu-heading">ADD PARCEL INFO</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-folder-plus"></i></div>
                                ADD PARCEL
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="upload_data.php">Upload CSV</a>
                                    <a class="nav-link" href="add_data.php">Add Data</a>
                                </nav>
                            </div>



                            <div class="sb-sidenav-menu-heading">All Party Info</div>
                            <a class="nav-link" href="party_parcel_list.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Party Parcel List 
                            </a>

                            







                        </div>




                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $_SESSION['full_name']; ?>
                    </div>
                </nav>
            </div>
            