<!-- Included header sidebar & footer in layout -->
<?= $this->extend('layout/layout') ?>
<!-- Define the content section -->
<?= $this->section('content') ?>
<title>View Introducers</title>
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
.mrgn{
    margin-left: 19rem;
}
#showcomment a{
    font-size: 16px !important;
    color: lightskyblue;
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
                                    View Introducers</h4>
                                
                                    <div class="col-lg-8 my-2 mt-5">
                                        <div class="row align-items-center pr-5">
                                         <div class="col-md-5 ">
                                           <form action="<?= $baseURL."callback/filter" ?>" method="post">
                                            <input style="height: 35px;" type="date" id="from" name="from" class="form-control" placeholder="From date">
                                        </div>
                                        <div class="col-md-5 ">
                                            <input style="height: 35px;" type="date" id="to" name="to" class="form-control" placeholder="From date">
                                        </div>
                                        <div class="col-md-2">
                                            <button style="height: 35px;" type="submit" class="bg-primary pt-0 text-white px-4 py-2 rounded">Filter</button>
                                        </div>
                                        </form>
                                    </div>
                                    </div>
                                  
                               <hr>

                             <!-- table code start -->
                                
                                <table class="table table-striped table-responsive">
                                    <thead>
                                        <tr>
                                            <th scope="col">Lead ID</th>
                                            <th scope="col">Source</th>
                                            <th scope="col">Lead Date</th>
                                            <th scope="col">user Name</th>
                                            <th scope="col">Mobile </th>
                                            <th scope="col">Status </th>
                                            <th scope="col">Callback date</th>
                                            <th scope="col">Callback Time</th>
                                                 
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if ($users && count($users) >= 1): ?>
                                        <?php foreach ($users as $user):    
                                        ?>
                                        <tr>
                                            <td>
                                            <?= $user['lead_id'] ?>
                                            </td>                                       
                                            <td>
                                                <?= $user['center_name'] ?>
                                            </td>
                                            <td>
                                                <?=  $user['lead_date'] ?>
                                            </td>                                          
                                            <td>
                                                <?= $user['fname'] ?>
                                            </td>
                                            <td>
                                                <?= $user['mobile'] ?>
                                            </td> 
                                            <td>
                                            <span class="bg-warning text-dark p-1 px-3 rounded font-weight-bold" style="font-size:13px"><?= $user['status'] ?></span>
                                            </td>                                           
                                            <td>
                                                <?= $user['calldate'] ?>
                                            </td>
                                            <td>
                                                <?= $user['calltime'] ?>    
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                        <tr>
                                            <td colspan="8" class="text-center">No Cutomer found.</td>
                                        </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                                
                         <!-- table code end -->
                            </div>
                        </div>
                       
                    </div>
                    
                </div>
            </div>
            <div class="col-lg-12">
                <?php echo $pager->links('default','full_pagination');?>
            </div>
                
            </div>
            </div>
           
        </div>
    </div>

    <script>
    function confirmDelete(link) {
        event.preventDefault(); // Prevent the default behavior of the link

        const deleteUrl = link.getAttribute('href'); // Get the URL to delete

        // Show Sweet Alert confirmation
        Swal.fire({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this user!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // If user confirms deletion, redirect to the delete URL
                window.location.href = deleteUrl;
            } else {
                // If user cancels deletion, do nothing
                Swal.fire("Cancelled", "Your user is safe!", "info");
            }
        });
    }
</script>
    <!-- content-wrapper ends -->




    <?= $this->endSection() ?>