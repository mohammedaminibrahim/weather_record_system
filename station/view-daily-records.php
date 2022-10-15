<?php 
session_start();
require_once("./includes/dashboard-head.php");?>

       <?php
       
        require_once("./includes/dashboard-side-bar.php");
       
       ;?>
        
        <main class="content">

            <?php require_once("./includes/dashboard-top-nav-bar.php");?>
           
            <div class="row">
    <div class="col-12 mb-4">
        <div class="card border-0 shadow components-section">
        <?php
            if(isset($_SESSION['message'])):?>
                <div class="<?= $_SESSION['alert'];?>"  role="alert">
                    <strong><?= $_SESSION['message'];?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>
        <?php endif;?>
            <div class="card-body">     
                <div class="row mb-4">
                    <div class="col-lg-12 col-sm-6">
                        <!-- Form -->

                        <div class="row">
                <div class="col-12 col-xl-12">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="card border-0 shadow">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h2 class="fs-5 fw-bold mb-0">View All Records</h2>
                                        </div>
                                        <!-- <div class="col text-end">
                                            <a href="#" class="btn btn-sm btn-primary">See all</a>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="table-responsive ">
                                    <table class="table text-center table-flush">
                                        <thead class="thead-light">
                                        <tr>
                                          
                                            <th class="border-bottom text-justify" scope="col" colspan="12">GHANA METEOROLOGICAL AGENCY</th>
                                            
                                        </tr>
                                        <tr>
                                          
                                          <th class="border-bottom text-justify" scope="col" colspan="12">CLIMATOLOGICAL DATA</th>
                                          
                                      </tr>
                                      <tr>
                                          
                                          <th class="border-bottom text-justify" scope="col" colspan="4">STATION</th>
                                          <th class="border-bottom text-justify" scope="col" colspan="4">MONTH</th>
                                          
                                      </tr>
                                      <tr>
                                          
                                          <th class="border-bottom text-justify text-primary" scope="col" colspan="1">Date</th>
                                          <th class="border-bottom text-justify" scope="col" colspan="1">Rain Fall</th>
                                          <th class="border-bottom text-justify" scope="col" colspan="1">Tempreture</th>
                                          <th class="border-bottom text-justify" scope="col" colspan="1">Wind</th>
                                          <th class="border-bottom text-justify" scope="col" colspan="1">Relative Tempreture</th>
                                          <th class="border-bottom text-justify" scope="col" colspan="1">Sun Shine</th>
                                          <th class="border-bottom text-justify" scope="col" colspan="1">Remarks</th>
                                          
                                      </tr>
                                
                                        </thead>
                                        <tbody>
                                            <?php
                                            require_once("./config.php");
                                            $stationid = $_SESSION['stationid'];
                                            $stationname = $_SESSION['stationname'];
                                                $sql = "SELECT * FROM daily_records WHERE stationid = '$stationid'";
                                                $statement = $conn->prepare($sql);
                                                $results = $statement->execute();
                                                $columns = $statement->fetchAll();
                                                $rows = $statement->rowCount();

                                                if($results){
                                                    foreach($columns as $column){
                                                        $id = $column['id'];  
                                                        $stationid = $column['stationid'];
                                                        $date = $column['date'];
                                                        $rainfall_mm = $column['rainfall_mm'];
                                                        $tempmax = $column['tempmax'];
                                                        $tempmin = $column['tempmin'];
                                                        $winrun = $column['winrun'];
                                                        $direction = $column['direction'];
                                                        $speed = $column['speed'];
                                                        $rel_humudity_0600 = $column['rel_humudity_0600'];
                                                        $rel_humudity_0200 = $column['rel_humudity_0200'];
                                                        $rel_humudity_1200 = $column['rel_humudity_1200'];
                                                        $rel_humudity_1500 = $column['rel_humudity_1500'];
                                                        $sunshine = $column['sunshine'];
                                                        $remark = $column['remark'];
                                                        $createdat = $column['createdat'];

                                                        echo "
                                                        <tr>
                                                        <td>{$stationid}</td>
                                                        <td>{$date}</td>
                                                        <td>{$rainfall_mm}</td>
                                                        <td>{$tempmax}</td>
                                                        <td>{$tempmin}</td>
                                                        <td>{$winrun}</td>
                                                        <td>{$direction}</td>
                                                        <td>{$speed}</td>
                                                        <td>{$rel_humudity_0600}</td>
                                                        <td>{$rel_humudity_0200}</td>
                                                        <td>{$rel_humudity_1200}</td>
                                                        <td>{$rel_humudity_1500}</td>
                                                        <td>{$sunshine}</td>
                                                        <td>{$remark}</td>
                                                        <td>{$createdat}</td>

                                                            <td>
                                                            <a href='edit-station.php?id={$id}' role='button' class='btn btn-primary'>Edit</a>
                                                            <a href='delete-station.php?id={$id}' role='button' class='btn btn-danger'>Delete</a>
                                                            </td>
                                                        </tr>
                                                        ";
                                                    }
                                                } else{
                                                    $_SESSION['message'] = "Something Went Wrong";
                                                    $_SESSION['alert'] = "alert alert-warning";
                                                }
                                            
                                            
                                            ;?>
                                       
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <!-- End of Form -->
                </div>
            </div>
        </div>
    </div>
</div>
           

                <?php require_once("./includes/dashboard-footer.php");?>