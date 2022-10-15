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

                        if(isset($_POST['submit'])){
                          $stationname = sterilize($_POST['stationname']);
                          $stationdistrict = sterilize($_POST['stationdistrict']);
                          $stationregion = sterilize($_POST['stationregion']);


                          $string = 'ABCDEFGHIJKMNOPQRSTUVWXYZ';
                          $stationid = substr(str_shuffle($string), 0, 10);
                          $stationpassword = "12345678";
                          if(!empty($stationname) && !empty($stationdistrict) && !empty($stationregion)){
                           //check if station already exist
                           $sqlStationExist = "SELECT * FROM stations WHERE stationdistrict = '$stationdistrict' AND stationregion = '$stationregion'";
                           $statement = $conn->prepare($sqlStationExist);
                           $results = $statement->execute();
                           $rows = $statement->rowCount();

                           if($rows > 0){
                            $_SESSION['message'] = "Station Already Exist!";
                            $_SESSION['alert'] = "alert alert-danger";
                           }else {
                         
                            $sqlInsertStation = "INSERT INTO stations(stationid, password, stationname, stationdistrict, stationregion)
                            VALUES('$stationid', '$stationpassword','$stationname', '$stationdistrict', '$stationregion')";
                            $statement = $conn->prepare($sqlInsertStation);
                            $results = $statement->execute();

                            if($results){
                             $_SESSION['message'] = "Station Created Successfully!!";
                             $_SESSION['alert'] = "alert alert-success";
                             header("location: view-stations.php");
                             ob_end_flush();
                            } else {
                             $_SESSION['message'] = "Ooops Something Went Wrong!!";
                             $_SESSION['alert'] = "alert alert-danger";
                            }
                           }
                          } else {
                            $_SESSION['message'] = "All Fields Are Required!!";
                            $_SESSION['alert'] = "alert alert-danger";
                          }


                        }
                      
                        ?>
                        
                        <div class="tab-content rounded-bottom">
                      <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1054">
                        <form action="" method="POST" class="row g-3">
                          <div class="col-md-3">
                            <label class="form-label disabled" for="validationServer01">Station Name</label>
                            <input name="stationname" class="form-control"  aria-disabled="true"  id="validationServer01" type="text" required="">
                          </div>

                          <div class="col-md-3">
                            <label class="form-label disabled" for="validationServer01">District Name</label>
                            <input name="stationdistrict" class="form-control"  aria-disabled="true"  id="validationServer01" type="text" required="">
                          </div>
                       
                          <div class="col-md-4">
                            <label class="form-label" for="validationServer02">Region</label>
                            <select class="form-control" name="stationregion" id="" required>
                              <option>Region</option>
                              <option value="AHAFO">AHAFO</option>
                              <option value="ASHANTI">ASHANTI</option>
                              <option value="BONO EAST">BONO EAST</option>
                              <option value="BRONG AHAFO">BRONG AHAFO</option>
                              <option value="CENTRAL">CENTRAL</option>
                              <option value="EASTERN">EASTERN</option>
                              <option value="GREATER ACCRA">GREATER ACCRA</option>
                              <option value="NORTH EAST">NORTH EAST</option>
                              <option value="NORTHERN">NORTHERN</option>
                              <option value="OTI">OTI</option>
                              <option value="SAVANNAH">SAVANNAH</option>
                              <option value="UPPER EAST">UPPER EAST</option>
                              <option value="UPPER WEST">UPPER WEST</option>
                              <option value="WESTERN">WESTERN</option>
                              <option value="WESTERN NORTH">WESTERN NORTH</option>
                              <option value="VOLTA">VOLTA</option>
                            </select>
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