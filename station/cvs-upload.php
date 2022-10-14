<?php
   
   require_once("./config.php");
   require_once("./auxiliaries.php");
if(isset($_POST['import'])){
    $filename = $_FILES['file']['tmp_name'];

    if($_FILES['file']['size'] > 0){
        $file = fopen($filename, 'r');

        while(($column = fgetcsv($file, 100000, ",")) !== FALSE){
            $sqlInsertdailyRecords = "INSERT INTO daily_records(stationid, date, rainfall_mm, tempmax, tempmin, winrun, direction, speed, rel_humudity_0600, rel_humudity_0200, rel_humudity_1200, rel_humudity_1500, sunshine, remark)
                                        VALUES('$column[0]', '$column[1]', '$column[2]', '$column[3]', '$column[4]', '$column[5]', '$column[6]', '$column[7]', '$column[8]', '$column[9]', '$column[10]', '$$column[11]', '$column[12]', '$column[13]')";
               $statement = $conn->prepare($sqlInsertdailyRecords);
               $results = $statement->execute();
               if($results){
                   $_SESSION['message'] = "Recoreds Recorded Successfully!!";
                   $_SESSION['alert'] = "alert alert-success";
                   header("location: view-daily-records.php");
               } else {
                   $_SESSION['message'] = "Oooops Something Went Wrong!!";
                        $_SESSION['alert'] = "alert alert-warning";
               }
        }
    }
}



;?><?php 
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

                        
                        <div class="tab-content rounded-bottom">
                      <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1054">
                        <form action="" method="POST" class="row g-3"enctype="multipart/form-data">
                          <div class="col-md-3">
                            <label class="form-label disabled" for="validationServer01">Uplaod CSV</label>
                            <input name="file" class="form-control"  aria-disabled="true"  id="validationServer01" type="file" required="">
                          </div>
                       
                        
                          <div class="col-12">
                            <input name="import" value="Import" class="btn btn-primary" type="submit" role="button">
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