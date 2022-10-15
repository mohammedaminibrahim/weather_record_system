<?php 
session_start();
ob_start();
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

                        <?php
                        
                        require_once("./config.php");
                        require_once("./auxiliaries.php");

                        $stationid = $_SESSION['stationid'];
                        $stationname = $_SESSION['stationname'];

                        if(isset($_POST['submit'])){
                            $date = sterilize($_POST['date']);
                            $rainfall_mm = sterilize($_POST['rainfall_mm']);
                            $tempmax = sterilize($_POST['tempmax']);
                            $tempmin = sterilize($_POST['tempmin']);
                            $winrun = sterilize($_POST['winrun']);
                            $direction = sterilize($_POST['direction']);
                            $speed = sterilize($_POST['speed']);
                            $rel_humudity_0600 = sterilize($_POST['rel_humudity_0600']);
                            $rel_humudity_0200 = sterilize($_POST['rel_humudity_0200']);
                            $rel_humudity_1200 = sterilize($_POST['rel_humudity_1200']);
                            $rel_humudity_1500 = sterilize($_POST['rel_humudity_1500']);
                            $sunshine = sterilize($_POST['sunshine']);
                            $remark = sterilize($_POST['remark']);

                            if(!empty($date) && !empty($rainfall_mm) && !empty($tempmax) && !empty($tempmin)
                            && !empty($winrun) && !empty($direction) && !empty($speed) && !empty($rel_humudity_0600)
                            && !empty($rel_humudity_0200) && !empty($rel_humudity_1200) && !empty($rel_humudity_1500)
                            && !empty($sunshine) && !empty($remark)){
                                //check if record already exits
                                $sqlRecordAlreadyExist = "SELECT * FROM daily_records WHERE date = '$date'";
                                $statement = $conn->prepare($sqlRecordAlreadyExist);
                                $results = $statement->execute();
                                $rows = $statement->rowCount();
                                $columns = $statement->fetchAll();

                                if($results){
                                    if($rows > 0){
                                        $_SESSION['message'] = "Oooops Record Already Exist!!";
                                        $_SESSION['alert'] = "alert alert-warning";
                                    } else{
                                        //insert into database
                                        $sqlInsertdailyRecords = "INSERT INTO daily_records(stationid, date, rainfall_mm, tempmax, tempmin, winrun, direction, speed, rel_humudity_0600, rel_humudity_0200, rel_humudity_1200, rel_humudity_1500, sunshine, remark)
                                        VALUES('$stationid', '$date', '$rainfall_mm', '$tempmax', '$tempmin', '$winrun', '$direction', '$speed', '$rel_humudity_0600', '$rel_humudity_0200', '$rel_humudity_1200', '$rel_humudity_1500', '$sunshine', '$remark')";
                                        $statement = $conn->prepare($sqlInsertdailyRecords);
                                        $results = $statement->execute();
                                        if($results){
                                            $_SESSION['message'] = "Recoreds Recorded Successfully!!";
                                            $_SESSION['alert'] = "alert alert-success";
                                            header("location: view-daily-records.php");
                                            ob_end_flush();
                                        } else {
                                            $_SESSION['message'] = "Oooops Something Went Wrong!!";
                                                 $_SESSION['alert'] = "alert alert-warning";
                                        }
                                    }

                                } else {
                                    $_SESSION['message'] = "Oooops Something Went Wrong!!";
                                    $_SESSION['alert'] = "alert alert-warning";
                                }
                            } else {
                                $_SESSION['message'] = "ALL FIELDS ARE REQUIRED!!";
                                $_SESSION['alert'] = "alert alert-warning";
                            }

                        }

                       
                        ?>
                        
                        <div class="tab-content rounded-bottom">
                      <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1054">
                        <form action="" method="POST" class="row g-3">
                          <div class="col-md-3">
                            <label class="form-label disabled" for="validationServer01">Station ID</label>
                            <input name="stationid" disabled value="<?= $stationid;?>" class="form-control"  aria-disabled="true"  id="validationServer01" type="text" required="">
                          </div>

                          <div class="col-md-3">
                            <label class="form-label disabled" for="validationServer01">Date</label>
                            <input name="date" value="<?= date('d-m-y');?>" class="form-control"  aria-disabled="true"  id="validationServer01" type="date" required="">
                          </div>

                          <div class="col-md-3">
                            <label class="form-label disabled" for="validationServer01">Rainfall MM</label>
                            <input name="rainfall_mm" class="form-control"  aria-disabled="true"  id="validationServer01" type="text" required="">
                          </div>

                          <div class="col-md-3">
                            <label class="form-label disabled" for="validationServer01">Tempreture (Max)</label>
                            <input name="tempmax" class="form-control"  aria-disabled="true"  id="validationServer01" type="text" required="">
                          </div>

                          <div class="col-md-3">
                            <label class="form-label disabled" for="validationServer01">Tempreture (Min)</label>
                            <input name="tempmin" class="form-control"  aria-disabled="true"  id="validationServer01" type="text" required="">
                          </div>

                          <div class="col-md-3">
                            <label class="form-label disabled" for="validationServer01">Win (Run)</label>
                            <input name="winrun" class="form-control"  aria-disabled="true"  id="validationServer01" type="text" required="">
                          </div>

                          <div class="col-md-3">
                            <label class="form-label disabled" for="validationServer01">Direction </label>
                            <input name="direction" class="form-control"  aria-disabled="true"  id="validationServer01" type="text" required="">
                          </div>

                          <div class="col-md-3">
                            <label class="form-label disabled" for="validationServer01">Speed </label>
                            <input name="speed" class="form-control"  aria-disabled="true"  id="validationServer01" type="text" required="">
                          </div>
                       
                       
                          <hr>
                          <p class="text-primary h2">Relative Humudity</p>
                          <div class="col-md-3">
                            <label class="form-label disabled" for="validationServer01">0600 </label>
                            <input name="rel_humudity_0600" class="form-control"  aria-disabled="true"  id="validationServer01" type="number" required="">
                          </div>

                          <div class="col-md-3">
                            <label class="form-label disabled" for="validationServer01">0200 </label>
                            <input name="rel_humudity_0200" class="form-control"  aria-disabled="true"  id="validationServer01" type="number" required="">
                          </div>

                          <div class="col-md-3">
                            <label class="form-label disabled" for="validationServer01">1200 </label>
                            <input name="rel_humudity_1200" class="form-control"  aria-disabled="true"  id="validationServer01" type="number" required="">
                          </div>
                         
                          <div class="col-md-3">
                            <label class="form-label disabled" for="validationServer01">1500 </label>
                            <input name="rel_humudity_1500" class="form-control"  aria-disabled="true"  id="validationServer01" type="number" required="">
                          </div>

                          <hr>
                          <p class="text-primary h2">others</p>
                         
                          <div class="col-md-2">
                            <label class="form-label disabled" for="validationServer01">Sunshine </label>
                            <input name="sunshine" class="form-control"  aria-disabled="true"  id="validationServer01" type="number" required="">
                          </div>
                        
                          <div class="col-md-12">
                            <label class="form-label disabled" for="validationServer01">Remark </label>
                        
                            <textarea name="remark" class="form-control"  aria-disabled="true"  id="validationServer01" id="" required cols="30" rows="10"></textarea>
                          </div>
                          <div class="col-12">
                            <input name="submit" value="Submit" class="btn btn-primary" type="submit" role="button">
                          </div>
                        </form>
                      </div>
                    </div>




                        <!-- End of Form -->
                </div>
            </div>
        </div>
    </div>
</div>
           

                <?php require_once("./includes/dashboard-footer.php");?>