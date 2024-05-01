<!-- Included header sidebar & footer in layout -->
<?= $this->extend('layout/layout') ?>
<!-- Define the content section -->
<?= $this->section('content') ?>
<title>Get Reports</title>
<style>
    .drop-area {
        border: 2px dashed #ccc;
        padding: 40px;
        text-align: center;
        margin-bottom: 20px;
    }

    .drop-text {
        margin-top: 0;
    }

    .file-list {
        border: 1px solid #ccc;
        padding: 10px;
        max-height: 500px;
        overflow-y: auto;
    }

    .file-item {
        margin-bottom: 5px;
    }
    .sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 99999 ;
  top: 0;
  right: 0;
  background-color: #fff;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #111;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #11111150;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
<?php $session = session(); ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12">
            </div>
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body mt-2">
                                <h4 class="card-title"><i class="mdi mdi-account-multiple bg-primary h4 pt-1 px-2 text-white rounded"></i>
                                    Get All reports</h4>
                                <hr>

                                <div class="col-lg-12 my-5">
                                    <div class="row pr-5">
                                        <div class="col-md-5">
                                            <form action="<?= $baseURL."excell_report" ?>" method="post">
                                                <input  type="date" required id="start" name="start" class="form-control" placeholder="From date">
                                                <input type="hidden" name="ops" value="datewise">
                                        </div>
                                        <div class="col-md-5">
                                            <input  type="date" required id="end" name="end" class="form-control" placeholder="To date">
                                        </div>

                                        <div class="col-md-2">
                                            <button style=" margin-top: 1px;" type="submit" class="bg-primary pt-0 text-white px-4 py-2 rounded">ExportAll</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>

                                   <hr>
                                   <!-- status wise reports optiopns  starts-->
                                   <div class="col-lg-12 my-5">
                                        <form action="<?= $baseURL."excell_report" ?>" method="post">
                                            <div class="row">                   
                                                <div class="col-lg-6">
                                                    <label for="exampleFormControlSelect1">Please Select Status to Export Data</label>
                                                    <select class="form-control" name="status" required id="status">
                                                        <option value="All">All</option>
                                                        <option value="New Lead">New Lead</option>
                                                        <option value="Accepted">Accepted</option>
                                                        <option value="Rejected">Rejected</option>
                                                        <option value="DWP Submitted">DWP Submitted</option>
                                                        <option value="DWP Passed">DWP Passed</option>
                                                        <option value="Completed">Completed</option>
                                                        <option value="Paid">Paid</option>
                                                        <option value="Callback">Callback</option>
                                                        <option value="Retransfer">Retransfer</option>
                                                    </select>
                                                    <input type="hidden" name="ops" value="statuswise">
                                                </div>
                                                <div class="col-lg-6 mt-4">
                                                    <button style="height:50px" type="submit" class="btn-primary pt-0 text-white px-4 py-2 rounded">Export Report</button>
                                                </div>
                                            </div>
                                        </form>                                   
                                    </div>
                                    <!-- status wise reports optiopns  end-->
<hr>
    <?php 
    $session = session();
    $role = $session->get('role');
    if($role !== 1){
    ?>
                                    <div class="col-lg-12 my-5">
                                        <form action="<?= $baseURL."excell_report" ?>" method="post">
                                            <div class="row">                   
                                                <div class="col-lg-6">
                                                    <label for="exampleFormControlSelect1">Please Select Center Name to Export Data</label>
                                                    <select  class="form-control" name="center" id="center">
                                                    <option value="Select Center">Select Center</option>
                                                        <?php foreach ($users as $user): ?>
                                                            <option value="<?php echo $user['center_name']; ?>"><?= $user['center_name'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select> 
                                                    <input type="hidden" name="ops" value="centerwise">
                                                </div>
                                                <div class="col-lg-6 mt-4">
                                                    <button style="height:50px" type="submit" class="btn-primary pt-0 text-white px-4 py-2 rounded">Export Report</button>
                                                </div>
                                            </div>
                                        </form>                                   
                                    </div>
<?php } ?>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
              
        </div>
    </div>
           
    </div>
 </div>

   
    <!-- content-wrapper ends -->




    <?= $this->endSection() ?>