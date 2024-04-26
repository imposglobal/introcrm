
<?php $session = session();?>

<!-- Included header sidebar & footer in layout -->
<?= $this->extend('layout/layout') ?>

<!-- Define the content section -->
<?= $this->section('content') ?>
<title>Dashboard</title>
<?php
     if ($callback && count($callback['customers']) >= 1){ ?>
     
       <!-- Modal -->
  <div class="modal show" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        <h4 style="float: inline-start;">Callback Today</h4>
        <button type="button" style="float: inline-end;" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
        
        <?php foreach ($callback['customers'] as $callbacks): ?>
         <p> <span class="h5 font-weight-bold">Customer: </span><span><?=$callbacks['fname']?></span></p>
         <p> <span class="h5 font-weight-bold">Email: </span><span><?=$callbacks['email']?></span></p>
         <p> <span class="h5 font-weight-bold">Phone: </span><span><?=$callbacks['mobile']." / ".$callbacks['telephone']?></span></p>
         <p> <span class="h5 font-weight-bold">Address: </span><span><?=$callbacks['address_1']."-".$callbacks['post_code']?></span></p>
        <?php endforeach; ?>
         
        </div>
        
      </div>
      
    </div>
  </div>
  
      <?php }else{
        $callback = null;
      } ?>
<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Welcome : <?php 
                         echo $session->get('fname');?></h3>
                  <h6 class="font-weight-normal mb-0">All systems are running smoothly! </span></h6>
                </div>
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <button class="btn btn-sm btn-light bg-white" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                     <i class="mdi mdi-calendar"></i> <?= date('l');?> <?= date('d M Y'); ?>
                    </button>
                  </div>
                 </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card-people mt-auto">
                  <img src="<?php echo $baseURL; ?>/assets/images/dashboard/people.svg" alt="people">
                  <div class="weather-info">
                    <div class="px-4">
                      <!-- <div>
                        <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>33<sup>C</sup></h2>
                      </div> -->
                      <div class="ml-2 pb-4" style="margin-top: -15px;">
                        <p id="quoteContainer" class="font-weight-bold"></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4">Working Days</p>
                      <p class="fs-30 mb-2"><?= $curworking_days; ?></p>
                      <p>Total working Days (<?= $total_working_days; ?>)</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4">Total Customers</p>
                      <p class="fs-30 mb-2"><?= $totalCustomer; ?></p>
                      <p>Total Customer Till Now</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="mb-4">Accepted</p>
                      <p class="fs-30 mb-2"><?= $countAccept; ?></p>
                      <p>From total <?= $totalCustomer; ?> customers</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="mb-4">Rejected</p>
                      <p class="fs-30 mb-2"><?=  $countRejected ;?></p>
                      <p>From total <?= $totalCustomer; ?> customers</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-lg-3 my-3">
              <div class="card card-light-blue">
                <div class="card-body">
                  <p class="mb-4">DWP Submitted</p>
                  <p class="fs-30 mb-2"><?= $countDWPSubmitted  ;?></p>
                  <p>From total <?= $totalCustomer; ?> customers</p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 my-3">
              <div class="card card-light-danger">
                <div class="card-body">
                  <p class="mb-4">DWP Passed</p>
                  <p class="fs-30 mb-2"><?= $countDWPPassed ;?></p>
                  <p>From total <?= $totalCustomer; ?> customers</p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 my-3">
              <div class="card card-dark-blue">
                <div class="card-body">
                  <p class="mb-4">Completed</p>
                  <p class="fs-30 mb-2"><?= $countCompleted ;?></p>
                  <p>From total <?= $totalCustomer; ?> customers</p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 my-3">
              <div class="card card-tale">
                <div class="card-body">
                  <p class="mb-4">Paid</p>
                  <p class="fs-30 mb-2"><?= $countPaid ;?></p>
                  <p>From total <?= $totalCustomer; ?> customers</p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3 my-3 my-3">
              <div class="card card-tale">
                <div class="card-body">
                  <p class="mb-4">Callback</p>
                  <p class="fs-30 mb-2"><?= $countCallback ;?></p>
                  <p>From total <?= $totalCustomer; ?> customers </p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 my-3 my-3">
              <div class="card card-dark-blue">
                <div class="card-body">
                  <p class="mb-4">Retransfer</p>
                  <p class="fs-30 mb-2"><?= $countRetransfer ;?></p>
                  <p>From total <?= $totalCustomer; ?> customers</p>
                </div>
              </div>
            </div>
          </div>
          <div class="my-5">
                <div class="card">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body mt-2">
                            <table class="table table-striped table-responsive">
                                    <thead>
                                        <tr>
                                            <th scope="col">Lead ID</th>
                                            <th scope="col">Source</th>
                                            <th scope="col">Lead Date</th>
                                            <th scope="col">Customer Name</th>
                                            <th scope="col">Mobile </th>
                                            <th scope="col">Status </th>
                                            <th scope="col">Callback Date</th>
                                            <th scope="col">Callback Time</th>
                                                 
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <?php if ($result && count($result['customers']) >= 1): ?>
                                        <?php foreach ($result['customers'] as $results):    
                                        ?>
                                          <tr>
                                            <td>
                                              <?= $results['lead_id'] ?>
                                            </td>                                       
                                            <td>
                                              <?= $results['center_name'] ?>
                                            </td>                                           
                                            <td>
                                              <?=  $results['lead_date'] ?>
                                            </td>                                          
                                            <td>
                                              <?= $results['fname'] ?>
                                            </td>
                                            <td>
                                              <?= $results['mobile'] ?>
                                            </td> 
                                            <td>
                                              <?= $results['status'] ?>
                                            </td>                                           
                                            <td>
                                            <?= $results['calldate'] ?>
                                            
                                            </td>
                                            <td>
                                              <?= $results['calltime'] ?>
                                            </td>
                                          </tr>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                              <td colspan="7">No agents found.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                                        </div>
                                        </div>
                                        </div>
                                        </div>
                                        </div>
      
  <script>
      // Function to fetch a random quote
      function fetchRandomQuote() {
        $.ajax({
          url: 'https://api.quotable.io/random',
          method: 'GET',
          success: function(data) {
            const quoteContainer = $('#quoteContainer');
            quoteContainer.html(`"${data.content}" - ${data.author}`);
          },
          error: function(xhr, status, error) {
            console.error('Error fetching quote:', error);
          }
        });
      }

        fetchRandomQuote();
  </script>

  <!-- Dashboard graphs script added below -->
 



        
<?= $this->endSection() ?>
